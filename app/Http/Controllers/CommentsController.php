<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function store(Request $request,$id){
       
        $validate_rule = [
            'comment' => 'required|max:140'
        ];
        $error_message = [
            'comment.required'=>'コメントを入れてください',
'comment.max'=>'140字以内で入力してください'

        ];
        $this->validate($request,$validate_rule,$error_message);

        $data = $request->all();
        $user = Auth::user();
        $user_id = $user['id'];
     $comment = new Comment;  
     $comment->comment = $data['comment'];
     $comment->article_id = $id;
     $comment->user_id = $user_id;
     $comment->save();

     return redirect('/article/'.$data["id"]);
     
    }
}
