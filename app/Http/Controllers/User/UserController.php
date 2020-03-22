<?php

namespace App\Http\Controllers;

abstract class UserController extends Controller
{
    public function viewer($view, $args=[]){

        return view($view, $args);
    }
}
