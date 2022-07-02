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
    function signup(SignupRequest $request){
        if($request->validated()){
            // TODO User Signup Mechanism
            return Response()->json(['message'=>'Successful'],200);
        }
        return Response()->json(['message'=>'Un-authorised'],401);
    }
    //  TODO : User Login
    //  TODO : User Delete
    //  TODO : User Update
}
