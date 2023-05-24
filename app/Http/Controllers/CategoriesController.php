<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;
use App\Models\Category;
use App\Models\Article;


class CategoriesController extends Controller
{
    public function index(Request $request){
        $categories = Category::all();
        return view('category',['categories'=>$categories]);
    }
    public function category($id){
    $items = Article::where('category_id',$id)->get();

    $category_name = Category::where('id',$id)->first();
        return view('category-index',['items'=>$items,'category_name'=>$category_name]);
    }
    public function create(Request $request){
        $message = session('message');
        return view('create-category',['message'=>$message]);
    }
    
    public function store(Request $request){

        $validate_rule = [
            'category'=>'required'
        ];
        $error_message = [
            'category.required'=>'カテゴリーを入力してください。'

        ];
        $this->validate($request,$validate_rule,$error_message);

        $data = $request->all();
        $category = Category::where('name', $data['category'])->first();
        if (!$category) {
            $category = new Category;
            $category->name = $data['category'];
            $category->save();
            $message = '新たにカテゴリを追加しました';
            return redirect('create/category')->with(['message' => $message]);
        } else {
            $message = '既に同じ名前のカテゴリが存在します';
            return redirect('create/category')->with(['message'=> $message]);
        }
    }
}

