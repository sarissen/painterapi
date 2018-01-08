<?php

namespace App\Http\Controllers;



use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController
{

    public function createUser(Request $request){
        $user = User::create($request->all());
        $user['password'] = Hash::make($request->get('password'));

        $user->save();

        return response()->json($user);
    }

    public function getCurrentUser(Request $request){
        if($request->user()) {
            return response()->json($request->user());
        }else{
            return response()->json(null);
        }
    }
}