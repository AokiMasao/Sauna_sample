<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StuffController extends Controller
{
 
    public function __construct()
    {
        # 追加したmiddlewareを追加。
        $this->middleware(1);
    }
 
     public function index(){
       dd('admin画面です。');
    }
}
