<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class ThreadController extends Controller
{
    function addThread(Request $request){
        $validator= Validator::make($request->all(),[
            'title'=> 'required',
            // 'desc'=> 'required',
            // 'user_id'=> 'required',

        ]);

        if($validator->fails()){
            return response()->json([
                'validation_error'=> 'something went wrong'
            ]);
        }else{

                $treads= Thread::create([
                    'title'=> $request->title,
                    'desc'=> $request->desc,
                    'user_id'=> $request->user_id
                ]);
            

            return response()->json([
                'status' => 200,
                'userName' => $treads,
                'message' => 'add successfully',
            ]);
        }
    }
}
