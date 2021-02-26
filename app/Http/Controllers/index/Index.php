<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Index extends Controller{
    public function index(){
        echo 'Index';
    }
    public function login(){
        echo '登录';
    }
    public function test(){
        echo '测试';
    }
}
