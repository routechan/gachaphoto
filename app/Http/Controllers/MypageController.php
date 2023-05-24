<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{

    
    public function index(){
    $user = Auth::user();
   $items = Article::where('user_id',$user['id'])->orderBy('created_at','desc')->paginate(16);
        return view('mypage',['user'=>$user,'items'=>$items]);

    }
    public function edit($id){
        $article = Article::where('article_id',$id)->first();
        $comments = Comment::where('article_id',$id)->get();
        return view('edit',['article'=>$article,'comments'=>$comments]);
    }
    public function delete($id){
Article::where('article_id',$id)->delete();
Comment::where('article_id',$id)->delete();
return redirect('/mypage');
    }
public function edit_profile(){
    $user_id = Auth::id();
    $user = User::find($user_id);
 return view('edit-profile',['user'=>$user]);
}//プロフィール編集画面へ移動

public function update(Request $request){

    $validate_rule = [
        'image' => 'image|max:10240',
        'profile' => 'max:100',
        'name'=>'required|max:15'
    ];
    $error_message = [
        'image.image'=>'画像ファイルをアップロードしてください。',
        'image.max'=>'ファイルのサイズは10Mまでです。',
        'profile.max'=>'プロフィール文は100文字以内で入力してください。',
        'name.required'=>'ユーザー名は必ず入力してください。',
        'name.max'=>'ユーザー名は15文字以内で入力してください。',


    ];
    $this->validate($request,$validate_rule,$error_message);

 $user_id = Auth::id();
 $user = User::find($user_id);
 $data = $request->all();
 $image = $request->file('image');
 if($request->hasFile('image')){
    $path = \Storage::put('/public',$image);
    $path = explode('/',$path);

    $user->image_path = $path[1];
 }
 unset($data['_token']);
 $user->name = $data['name'];
 $user->profile = $data['profile'];


$user->save();
 return redirect('/mypage');
}

public function likes(Request $request){
    $user = Auth::user();
    
    
    return view('likes',['user'=>$user,]);
}
}
