<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;

class AdminController extends Controller
{

    private $user_id = "takadakouki@gmail.com";
    private $password = "hoge";

    public function index(Request $request)
    {
        $user_id = $request->email;
        $password = $request->password;

        if($user_id != $this->user_id || $password != $this->password){
            return view("admin.login");
        }

        return view("admin.index");
    }

    public function inde(){

		$from = date("Y-m-d");
		$to = date("Y-m-d", strtotime("20 days"));

		$schedule = Schedule::whereBetween("date", [$from, $to])->get();
		
		return view("", ["schedule" => $schedule]);
    }
}
