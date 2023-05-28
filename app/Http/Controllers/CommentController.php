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

    function commentList($id){
      $commentData= Comment::with('user', 'threads')->where('threads_id', $id)->orderBy('id', 'desc')->get();
      return response()->json([
        'status'=>200,
        'message'=> 'success',
        'comment_list'=> $commentData
        
    ]);

    }


    public function update(Request $request, $id)
{
    $comment = Comment::findOrFail($id);
    $comment->comments = $request->input('comments');
    // Set other updated fields as needed
    $comment->save();
    return response()->json([
        'status'=>200,
        'message'=> 'update success',
        'comment_update'=> $comment
        
    ]);
}


public function delete($id)
{
    $DeleteComment = Comment::where('id', $id)->delete();

    return response()->json([
        'status'=>200,
        'message'=> 'delete success',
        'comment_delete'=> $DeleteComment
        
    ]);
}




}
