<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;


class UserController extends Controller
{
	public function index(Request $request)
	{
		return view('supporter.index');
	}

	public function show_login(Request $request)
	{
		return view('athlete.login');
	}
	
	public function login(Request $request)
	{
		$credentials = $request->only('email', 'password');
		$result = User::auth($credentials);
		if($result){
			// put session variable $user_id
			Session::put("login", "loged_in");
			return redirect()->route('user.mypage');
		}

		return back()->withErrors([
			'email' => 'The provided credentials do not match our records.',
		]);
	}

	public function show_mypage(Request $request)
	{
		if($request->session()->exists('login')){
			Session::forget('login');
			return view('user.mypage');
		}
		return redirect()->route('user.login');
	}
}
