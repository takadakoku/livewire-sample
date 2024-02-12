<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class TestController extends Controller
{
    public $count = 1;
    public function index():View
    {
        return view('test.index');
    }

    public function hoge():View
    {
        return view('test.index2');
    }

}
