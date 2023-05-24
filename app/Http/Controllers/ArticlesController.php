<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use App\Models\Category;
use App\Models\Nice;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
public function index(Request $request){
   
    $sort = $request->sort;
    if(isset($sort)){
       
 $items = Article::orderBy($sort,'desc')->paginate(16);
 $param = ['items'=>$items,'sort'=>$sort,];
 return view('index',$param);
    }
    else{
        $sort = "";
        $items = Article::orderBy('created_at','desc')->paginate(16);
        return view('index',['items'=>$items,'sort'=>$sort]);

    }

    
}

    public function create(Request $request)
    {
        
        $categories = Category::all();
        $user = Auth::user();
         return view('create',['user'=>$user,'categories'=>$categories]);
    }
    public function store(Request $request)
    {
        
        $validate_rule = [
            'image' => 'image|required|max:10240',
            'text' => 'required'
        ];
        $error_message = [
            'image.image'=>'画像ファイルをアップロードしてください。',
            'image.required'=>'画像ファイルを入れてください。',
            'image.max'=>'ファイルのサイズは10Mまでです。',
            'text.required'=>'テキストを入れてください。'

        ];
        $this->validate($request,$validate_rule,$error_message);

        $data = $request->all();
        $image = $request->file('image');

        if($request->hasFile('image')){
            $path = \Storage::put('/public',$image);
            $path = explode('/',$path);
        
            //データベースに保存
            $article = new Article;
            unset($data['_token']);
            $article->user_id = $data['user_id'];
            $article->category_id = $data['category'];
            $article->text = $data['text'];
            $article->image_path = $path[1];
            $article->save();

            
            return redirect('/index');
        }else{
            $message = "画像を入れてください";
            return back()->withErrors($message);
        }
    }
    public function article(Article $article,$id){
        $article->where('article_id',$id)->increment('view_count');
        $article = Article::where('article_id',$id)->first();
        $comments = Comment::where('article_id',$id)->get();

        $nice=Nice::where('article_id', $article->article_id)->where('user_id', Auth::user())->first();
   


        return view('article',['article'=>$article,'comments'=>$comments,'nice'=>$nice]);

    }
}
