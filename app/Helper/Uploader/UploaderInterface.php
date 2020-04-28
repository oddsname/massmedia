<?php

namespace App\Helper\Uploader;

interface UploaderInterface
{
    public function upload($data, $folder = null) : array;
}
