<?php

namespace App\Services;

class Messages
{
    public static function success($message = '',$data = null,$code = 200)
    {
        return response()->json(['message'=>$message,'data'=>$data],$code);
    }

    public static function error($message = '',$code = 401)
    {
        return response()->json(['errors'=>$message],$code);
    }
}
