<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        
        $search = $request->input('search');
        $items = Article::where('text', 'LIKE', "%$search%")->get();
        return view('index', compact('items', 'search'));
    }
    //検索機能
}
