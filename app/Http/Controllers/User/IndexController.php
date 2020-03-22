<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

class IndexController extends UserController
{
    public function index(){

        return $this->viewer('user.pages.index');
    }
}

