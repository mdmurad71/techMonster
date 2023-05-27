<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ThreadController extends Controller
{
    function addThread(Request $request){
        $validator= Validator::make($request->all(),[
            'title'=> 'required',
            'desc'=> 'required',
            'user_id'=> 'required',

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

    function threadList(Request $request){
        $data= Thread::orderBy('id', 'desc')->get();
        return response()->json([
            'status'=>200,
            'thread_list'=> $data,
            'message'=> 'success'
        ]);
    }

    function threadDetails($id){
        $detail= Thread::with('user')->where('id', $id)->get();
        // $userName = DB::table('users')
        // ->join('threads', 'users.id', '=', 'threads.user_id')
        // ->select('users.*')
        // ->groupBy('threads.user_id')
        // ->get();
        return response()->json([
            'status'=> 200,
            'message'=> 'success',
            'details'=> $detail,
            // 'userName'=>$userName

        ]);
    }
}
