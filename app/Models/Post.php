<?php

namespace App\Models;

use App\Helper\Uploader\UploaderInterface;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\FileBag;

class Post extends Model
{
    protected $guarded = [];
    protected $table = 'posts';

    public function createByAdmin(array $data, $files, UploaderInterface $uploader): void
    {
        $model = self::create($data);

        if (isset($files)) {
            FileModel::saveByModel($files, $model, $uploader);
        }
    }

    public function updateByAdmin(array $data, $files, UploaderInterface $uploader): void
    {
        $this->update($data);

        if (isset($files) && count($files)) {
            FileModel::deleteByModel($this);
            FileModel::saveByModel($files, $this, $uploader);
        }
    }

    public function deleteByAdmin()
    {
        FileModel::deleteByModel($this);
        Comment::deleteByModel($this);

        $this->delete();
    }

    public function scopeCategory($query, $category)
    {
        if (isset($category)) {
            return $query->where('category_id', $category);
        }

        return $query;
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'model');
    }

    public function file()
    {
        return $this->morphOne(FileModel::class, 'model');
    }
}
