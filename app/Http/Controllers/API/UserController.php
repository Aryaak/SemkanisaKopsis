<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;


class UserController extends Controller
{

    public $successStatus = 200;

    public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $user['token'] =  $user->createToken('nApp')->accessToken;
            return ResponseFormatter::success('Login Successfull!', $user);
        } else {
            return ResponseFormatter::failed('Login Failed!', ['Unathorised'], 401);
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        $checkEmail = User::where('email', $request->email)->first();

        if ($checkEmail) {
            return ResponseFormatter::failed('Email Already Use!', ['Use antoher email'], 401);
        }

        if ($validator->fails()) {
            return ResponseFormatter::failed('Register Failed!', $validator->errors(), 401);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $user['token'] =  $user->createToken('nApp')->accessToken;

        return ResponseFormatter::success('Register Successfull!', $user);
    }

    public function details()
    {
        $user = Auth::user();
        return ResponseFormatter::success('Get User Details Successfull', $user);
    }
}
