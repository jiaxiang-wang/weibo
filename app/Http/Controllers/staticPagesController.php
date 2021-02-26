<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//构建三个静态页面分别是主页、帮助页、关于页
class staticPagesController extends Controller
{
    //主页
    public function home(){
        // return '主页';
        return view('static_pages/home');
    }
    //帮助页
    public function help(){
        //return '帮助页';
        return view('static_pages/help');
    }
    //关于页
    public function about(){
        //return '关于页';
        return view('static_pages/about');
    }
}
