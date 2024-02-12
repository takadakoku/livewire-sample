<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supporter;
use App\Models\AthleteInfo;
use App\Models\AthleteLogin;
use Illuminate\Support\Facades\Session;
use App\Models\Posts;

class SupporterController extends Controller
{
	public function index(Request $request)
    {
        $posts = self::json_response(Posts::all());
        return view('supporter.index' , ['posts' => $posts]);
    }
}
