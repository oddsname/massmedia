<?php

namespace App\Helper\Uploader;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\FileBag;

class FileUploader implements UploaderInterface
{
    private string $folderToLoad = '/files/uploaded/';

    public function upload($files, $folder = null) : array
    {
        $this->folderToLoad .= $folder ?? '';

        if ($files instanceof UploadedFile) {
            return [ $this->uploadSingle($files) ];
        }

        if ($files instanceof FileBag) {
            return $this->uploadGroup($files);
        }

        throw new \Exception('File type should be only ' . FileBag::class . ' or ' . UploadedFile::class);
    }

    private function uploadGroup(FileBag $files): array
    {
        $array = [];

        foreach ($files as $file) {
            $array[] = $this->uploadSingle($file);
        }

        return $array;
    }

    private function uploadSingle(UploadedFile $file): string
    {
        $new_name = self::getNewFileName($file);
        $file->move(public_path().$this->folderToLoad, $new_name);

        return $this->folderToLoad . '/' . $new_name;
    }

    private function getNewFileName(UploadedFile $file): string
    {
        $filename = str_replace(
            '.'.$file->getClientOriginalExtension(),
            '',
            $file->getClientOriginalName()
        );

        $path = public_path().$this->folderToLoad.$filename;
        $counter = 0;

        while (true) {
            $counter_string = $counter ? '_'.$counter : '';
            if (file_exists($path.$counter_string.'.'.$file->getClientOriginalExtension())) {
                $counter++;
            } else {
                return $filename.$counter_string.'.'.$file->getClientOriginalExtension();
            }
        }
    }

}
