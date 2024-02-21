<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:6',
            'grant_type' => 'required',
        ]);

        $grantType = $data['grant_type'];
        $authAttr = $request->only('email', 'password');

        if ($grantType == "authorization_token") {

            $authSuccess = Auth::attempt($authAttr);

            if (!$authSuccess) {
                return response()->json([
                    'success'       => false,
                    'status_code'   => 401,
                    'data'          => [],
                    'message'       => "Authentication failure"
                ], 401);
            } else {

                $user = Auth::user();

                $user->tokens()->delete();

                $access_token = $user->createToken($deviceName)->plainTextToken;

                //track login
                $user->trackLogin($request);

                return response()->json([
                    'success'       => true,
                    'status_code'   => 200,
                    'message'       => "Success",
                    'errors'        => [],
                    'data'          => [
                        'token_type' => "Bearer",
                        'access_token' => $access_token,
                        'expires_in' => config('sanctum.expiration', 60) * 60
                    ]
                ], 200);
            }
        }

        return response()->json([
            'success'       => false,
            'status_code'   => 400,
            'message'       => "Bad request",
            'errors'        => [],
            'data'          => []
        ], 400);
    }

}
