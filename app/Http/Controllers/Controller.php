<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function jsonResponse($data, $code = 200)
    {
        return response()->json(
            $data,
            $code,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE
        );
    }
    public function json_response($data)
    {
        $data = response()->json($data, 200, [], JSON_UNESCAPED_UNICODE);
		$data = $data->content();
		return json_decode($data, true);
    }

    // mainly use for inital password
    function random_str($length = 15)
    {
        return substr(base_convert(md5(uniqid()), 16, 36), 0, $length);
    }
}
