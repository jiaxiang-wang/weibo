<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Users extends Controller
{
    //注册功能
    public function create()
    {
        return view('/users/signup');
    }
}
