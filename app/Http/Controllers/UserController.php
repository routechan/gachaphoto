<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Article;

class UserController extends Controller
{
    public function index(Request $request,$id){
        $user = User::where('id',$id)->first();
   $items = Article::where('user_id',$user['id'])->get();

        return view('user',['user'=>$user,'items'=>$items]);
    }
}
