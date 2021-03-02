<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use Auth;

//构建三个静态页面分别是主页、帮助页、关于页
class StaticPages extends Controller
{
    //主页
    public function home(){
        // return '主页';
        if(Auth::check()){
            $feed_items = Auth::user()->feed()->paginate(30);
        }
        return view('/static_pages/home',compact('feed_items'));
    }
    //帮助页
    public function help(){
        return view('/static_pages/help');
        //return view('/static_pages/help');
    }
    //关于页
    public function about(){
        //return '关于页';
        return view('/static_pages/about');
    }
}
