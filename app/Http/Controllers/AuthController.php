<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Your custom registration logic here
    }

    public function login(Request $request)
    {
        // Your custom login logic here
    }

    public function logout()
    {
        Auth::logout();
        // Redirect or perform other actions after logout.
    }



}
