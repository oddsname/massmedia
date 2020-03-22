<?php

namespace App\Models\Traits;

use App\Models\FileModel;

trait HaveFile{

    public function file(){
        return $this->morphOne(FileModel::class, 'model');
    }
}
