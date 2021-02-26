<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Index extends Controller{
    public function index(){
        return view('/index/index');
    }
    public function login(){
        return view('/index/login');
    }
    public function test(){
        return view('/index/test');
    }
}
