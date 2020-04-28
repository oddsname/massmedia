<?php

namespace App\Models;

use App\Models\Parent\BaseModel;
use App\Models\Traits\HaveComments;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];
    protected $table = 'categories';

    public $timestamps = false;

    public function comments()
    {
        return $this->morphMany(Comment::class, 'model');
    }
}
