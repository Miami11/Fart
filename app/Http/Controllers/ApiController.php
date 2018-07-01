<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function __construct()
    {
        $this->user = new User;
    }
    public function register(Request $request)
    {
        $credentials = $request->only('name', 'email', 'password','tel','img');

        $rules = [
            'name' => 'required|max:10',
            'email' => 'required|email|max:100|unique:users',
            'password' => 'required|alphaNum|min:5|max:10',
            'tel' => 'required|numeric|min:10|max:10',
        ];
        $messages = [
            'name'    => '請務必填寫,最大10個字數',
            'email'    => '最大字數100且只能註冊一次',
            'password' => '5~10個密碼需含英文數字',
            'tel'      => '10位數字',
        ];
        $validator = Validator::make($credentials, $rules,$messages);
        if ($validator->fails()) {
            return response()->json(['status' => 'fail', 'error' => $validator->messages()]);
        }
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

       $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'tel'=> $request->tel,
            'img' => 'images/default/rabbit.jpg',
        ]);
        return response([
            'status' => 'success',
            'data' => $user
        ], 200);
    }

    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        $token = null;
        $rules = [
            'email' => 'required|email|max:100',
            'password' => 'required|alphaNum|min:5|max:10',
        ];
        $messages = [
            'email'    => '請輸入eamil格式',
            'password' => '5~10個密碼需含英文數字',
        ];
        $validator = Validator::make($credentials, $rules,$messages);
        if ($validator->fails()) {
            return response()->json(['status' => 'fail', 'error' => $validator->messages()]);
        }
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'response' => 'error',
                    'message' => 'invalid_email_or_password',
                ]);
            }
        } catch (JWTException $e) {
            return response()->json([
                'response' => 'error',
                'message' => 'failed_to_create_token',
            ]);
        }
        return response()->json([
            'status' => 'success',
            'result' => [
                'token' => $token,
            ],
        ]);
    }

    public function logout()
    {
        JWTAuth::invalidate();
        return response([
            'status' => 'success',
            'message' => 'Logged out Successfully.'
        ], 200);
    }

    public function getAuthUser(Request $request){
        
        $user = JWTAuth::toUser($request->token);
        return response()->json(['status' => 'success','result' => $user]);
    }

    public function refresh()
    {
        return response([
            'status' => 'success'
        ]);
    }
}