<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    function addComment(Request $request){
        $validator= Validator::make($request->all(),[
            'comments'=> 'required',
            'user_id'=> 'required',
            'threads_id'=> 'required',

        ]);

        if($validator->fails()){
            return response()->json([
                'validation_error'=> 'something went wrong'
            ]);
        }else{

                $comments= Comment::create([
                    'comments'=> $request->comments,
                    'threads_id'=> $request->threads_id,
                    'user_id'=> $request->user_id
                ]);
            

            return response()->json([
                'status' => 200,
                'userName' => $comments,
                'message' => 'add successfully',
            ]);
        }
    }
}
