<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\SignupRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    /**
     * Sign-Up new User
     * 
     * @param SignupRequest with email, password, name
     * @return Response with token
     */
    function signup(SignupRequest $request)
    {
        if ($request->validated()) {
            $credentials = $request->only('name', 'email');
            $credentials['password'] = bcrypt($request['password']);
            $user = User::create($credentials);
            $token = $user->createToken('access_token');
            return Response()->json(['message' => 'Successful', 'user' => $user, 'token' => $token->plainTextToken], 201);
        }
        return Response()->json(['message' => 'Un-authorised'], 401);
    }

    /**
     * Login exisiting User
     * 
     * @param LoginRequest with email and password
     * @return Response with token
     */

    function login(LoginRequest $request)
    {
        if (Auth::attempt(['email'=>$request['email'],'password'=>$request['password']])) {
            $token = Auth::user()->createToken('access_token');
            return Response()->json(['message' => 'Successful', 'token' => $token->plainTextToken], 200);
        } else {
            return Response()->json(['message' => 'Un-authorised'], 401);
        }
    }
    //  TODO : User Delete
    //  TODO : User Update
}
