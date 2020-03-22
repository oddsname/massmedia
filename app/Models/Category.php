<?php

namespace App\Models;

use App\Models\Parent\BaseModel;

class Category extends BaseModel
{
    protected $guarded = [];
    protected $table = 'categories';

    public $timestamps = false;
}
