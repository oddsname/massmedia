<?php

namespace App\Models;

use App\Models\Parent\BaseModel;

class Comment extends BaseModel
{
    protected $guarded = [];
    protected $table = 'comments';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = null;

    public function model(){
        return $this->morphTo();
    }
}
