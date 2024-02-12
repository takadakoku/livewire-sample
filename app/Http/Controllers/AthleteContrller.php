<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AthleteInfo;
use App\Models\AthleteLogin;
use Illuminate\Support\Facades\Session;
use App\Models\Posts;

class AthleteContrller extends Controller
{
    public function show_login()
    {
        return view('athlete.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $login_info = self::json_response(AthleteLogin::auth($credentials));

        if($login_info){
            Session::put('athlete_id', $login_info);

            return redirect()->route('athlete.mypage');
        }else{
            return redirect()->route('athlete.show_login');
        }

    }

    public function show_mypage(Request $request)
    {

        if(SESSION::has('athlete_id')){
            $athlete_id = Session::get('athlete_id');
            $athlete_info = self::json_response(AthleteInfo::where('athlete_id', $athlete_id['athlete_id'])->first());
            return view('athlete.mypage', ['athlete_info' => $athlete_info]);
        }

        return back()->withErrors([
            'email' => 'メールアドレスまたはパスワードが正しくありません。',
        ]);
    }

    public function show_add_post(Request $request)
    {
        return view('athlete.add_post');
    }

    public function add_post(Request $request)
    {
        $params = $request->all();
        // get flyer image
        $image = $request->file("image1");
        $params['athlete_id'] = Session::get('athlete_id')['athlete_id'];
        // get flyer image's extension
        $extension = $image->getClientOriginalExtension();
        $posts_image = uniqid() . "." . $extension;
        $image->storeAs("public/images/posts/", $posts_image);
        $params["image1"] = $posts_image;
        unset($params["_token"]);
        Posts::insert($params);
        return redirect()->route('athlete.mypage');
    }

}
