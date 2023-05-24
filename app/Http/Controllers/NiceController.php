<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;
use App\Models\Nice;
use Illuminate\Support\Facades\Auth;

class NiceController extends Controller
{
    public function nice(Article $article, Request $request,$id){
        $article->where('article_id',$id)->increment('like_count');//articleテーブルのlike_countに+1

        $nice=New Nice();
        $nice->article_id=$id;
        $nice->user_id=Auth::id();
        $nice->save();
        
        return back();
    }
    public function unnice(Article $article, Request $request,$id){
        $article->where('article_id',$id)->decrement('like_count');//articleテーブルのlike_countに-1

        $user=Auth::id();
        $nice=Nice::where('article_id', $id)->where('user_id', $user)->first();
        $nice->delete();
        return back();
    }
}
