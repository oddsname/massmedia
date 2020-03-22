<?php

namespace App\Models;

use App\Helper\Uploader;
use App\Models\Parent\BaseModel;

class FileModel extends BaseModel
{
    protected $guarded = [];
    protected $table = 'files';

    protected static $imageTypes = ['jpg', 'jpeg', 'png', 'svg'];

    public static function deleteByModel(BaseModel $model)
    {
        $data = self::where('model_type', get_class($model))->where('model_id', $model->id)->get();

        foreach($data as $item){
            $path = public_path().$item->path;
            if(file_exists($path) && strpos($item->path, '/files/factory') === false){
               unlink($path);
            }

            $item->delete();
        }
    }

    public static function saveByModel($files, BaseModel $model)
    {
        $paths = Uploader::upload($files);

        foreach ($paths as $path) {
            $path_to_array = explode('/', $path);

            self::create([
                'name' => end($path_to_array),
                'path' => $path,
                'type' => self::getTypeByName(end($path_to_array)),
                'model_id' => $model->id,
                'model_type' => get_class($model)
            ]);
        }
    }

    public static function getTypeByName($name): string
    {
        $array = explode('.', $name);
        return in_array(end($array), self::$imageTypes) ? 'img' : 'file';
    }
}
