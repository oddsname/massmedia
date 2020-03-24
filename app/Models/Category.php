<?php

namespace App\Models;

use App\Models\Parent\BaseModel;
use App\Models\Traits\HaveComments;

class Category extends BaseModel
{
    use HaveComments;

    protected $guarded = [];
    protected $table = 'categories';

    public $timestamps = false;
}
