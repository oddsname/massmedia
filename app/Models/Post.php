<?php

namespace App\Models;

use App\Helper\Uploader;
use App\Models\Parent\BaseModel;
use App\Models\Traits\HaveComments;
use App\Models\Traits\HaveFile;
use GuzzleHttp\Psr7\UploadedFile;
use Symfony\Component\HttpFoundation\FileBag;

class Post extends BaseModel
{
    use HaveComments, HaveFile;

    protected $guarded = [];
    protected $table = 'posts';

    public function createByAdmin(array $data, $files = null) : void
    {
        $model = self::create($data);

        if (isset($files)) {
            FileModel::saveByModel($files, $model);
        }
    }

    public function updateByAdmin(array $data, $files = null) : void
    {
        $this->update($data);

        if(isset($files) && count($files)){
            FileModel::deleteByModel($this);
            FileModel::saveByModel($files, $this);
        }
    }

    public function deleteByAdmin(){
        FileModel::deleteByModel($this);
        $this->delete();
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
