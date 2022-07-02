<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\SignupRequest;

class UserController extends Controller
{
    //  TODO : User SignUp

    /**
     * Sign-Up new User
     * 
     * @param SignupRequest with email, password, name
     * @return Response with token
     */
    function signup(SignupRequest $request)
    {
        if ($request->validated()) {
            $user = User::create($request->only('name', 'email', 'password'));
            $token = $user->createToken('access_token');
            return Response()->json(['message' => 'Successful', 'user' => $user, 'token' => $token->plainTextToken], 200);
        }
        return Response()->json(['message' => 'Un-authorised'], 401);
    }
    //  TODO : User Login
    //  TODO : User Delete
    //  TODO : User Update
}
