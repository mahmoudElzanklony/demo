<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use Illuminate\Http\Request;

class LoginControllerInvokable extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginFormRequest $request)
    {
        $data = $request->validated();

        if(auth()->attempt($data)){
            $user = auth()->user();
            $user->token  = $user->createToken($data['email'])->plainTextToken;
            return $user;
        }else{
            return response()->json(['error' => 'Unauthorized'], 401);
        }

    }
}
