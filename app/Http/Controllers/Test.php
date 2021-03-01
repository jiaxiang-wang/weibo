<?php
namespace App\Http\Controllers;

class Test extends controller
{
    public function index(){
        echo phpinfo();
    }
}