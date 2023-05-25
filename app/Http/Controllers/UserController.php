<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191',
            'email' => 'required|email|max:191|unique:users,email',
            'password' => 'required|min:8'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'validation_errors' => "something went wrong",
            ]);
        } else {
            $users = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
    }
    return response()->json([
        'status' => 200,
        'userName' => $users->name,
        'message' => 'resgister successfully',
    ]);
}


function Login(Request $request){
    $validator = Validator::make($request->all(), [
        'email' => 'required',
        'password' => 'required'
    ]);

    if ($validator->fails()) {
        return response()->json([
            'validator_errors' => "something went wrong",
        ]);
    } else {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => '401',
                'message' => 'invalid credentials'
            ]);
        } else {



            return response()->json([
                'status' => 200,
                'userName' => $user->name,
                'message' => 'Loged in successfully',
            ]);
        }
    }
}


}