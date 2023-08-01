<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\UserResource;
use App\Services\RegisterService;



class AuthController extends Controller
{
    use RegisterService;
    public function register()
    {
        return view('Auth.register');
    }

    public function registerPost(RegisterRequest  $request)
    {
        $data = $request->validated();
        $this->createUser($data);
        $response['message'] = 'Successfully Registered! Now, Login!';
        return new SuccessResource($response);
    }


    public function login()
    {
        return view('Auth.login');
    }
    
    public function loginPost(LoginRequest  $request)
    {
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 401]);
        }
    }
    public function logout()
    {
        Auth::logout();
    }



}
