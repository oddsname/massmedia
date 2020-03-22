<?php

namespace App\Helper;

use Carbon\Carbon;
use Intervention\Image\Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\FileBag;

class Uploader
{
    private static $defaultFolder = '/files/uploaded/';
    private static $folderToLoad = '/files/uploaded/';

    public static function upload($files, $folder = null) : array
    {
        self::$folderToLoad = $folder ?? self::$defaultFolder;

        if ($files instanceof UploadedFile) {
            return [ self::uploadSingle($files) ];
        }

        if ($files instanceof FileBag) {
            return self::uploadGroup($files);
        }

        throw new \Exception('File type should be only ' . FileBag::class . ' or ' . UploadedFile::class);
    }

    private static function uploadGroup(FileBag $files): array
    {
        $array = [];

        foreach ($files as $file) {
            $array[] = self::uploadSingle($file);
        }

        return $array;
    }

    private static function uploadSingle(UploadedFile $file): string
    {
        $new_name = self::getNewFileName($file);
        $file->move(public_path().self::$folderToLoad, $new_name);

        return self::$folderToLoad . '/' . $new_name;
    }

    private static function getNewFileName(UploadedFile $file): string
    {
//        return md5($file->getClientOriginalName() . Carbon::now()->toString()) . '.' . $file->getClientOriginalExtension();

        $filename = str_replace('.'.$file->getClientOriginalExtension(), '', $file->getClientOriginalName());
        $path = public_path().self::$folderToLoad.$filename;

        $counter = 0;
        while(true){
            $counter_string = $counter ? '_'.$counter : '';
            if(file_exists($path.$counter_string.'.'.$file->getClientOriginalExtension())){
                $counter++;
            }else {
                return $filename.$counter_string.'.'.$file->getClientOriginalExtension();
            }
        }
    }

}
