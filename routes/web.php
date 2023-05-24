<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\NiceController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('index',[ArticlesController::class,'index']);
Route::get('/create',[ArticlesController::class,'create'])
->middleware('auth');
Route::post('/store',[ArticlesController::class,'store'])
->middleware('auth');
Route::get('/article/{id}',[ArticlesController::class,'article']);
Auth::routes();

Route::get('/mypage',[MypageController::class,'index'])
->middleware('auth');
Route::get('/mypage/{id}',[MypageController::class,'edit'])
->middleware('auth');
Route::get('delete/{id}',[MypageController::class,'delete'])
->middleware('auth');
Route::get('/edit/profile',[MypageController::class,'edit_profile'])
->middleware('auth');//プロフィール編集
Route::post('/edit/profile',[MypageController::class,'update'])
->middleware('auth');//プロフィール編集の変更を保存
Route::get('/likes',[MypageController::class,'likes'])
->middleware('auth');//じぶんのいいねした投稿を表示

Route::post('/article/{id}/store',[CommentsController::class,'store'])
->middleware('auth');//コメントをつける

Route::get('/logout',[AuthController::class,'logout'])
->middleware('auth');

Route::get('/category',[CategoriesController::class,'index']);
Route::get('/category/{id}',[CategoriesController::class,'category']);
Route::get('/create/category',[CategoriesController::class,'create'])
->middleware('auth');//カテゴリー作成
Route::post('/store/category',[CategoriesController::class,'store'])
->middleware('auth');//カテゴリー保存

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/user/{id}',[UserController::class,'index']);//他のユーザーのプロフィール画面を表示

Route::get('/article/nice/{id}', [NiceController::class,'nice'])->name('nice');
Route::get('/article/unnice/{id}', [NiceController::class,'unnice'])->name('unnice');

Route::get('/search', [SearchController::class, 'search'])->name('search');//検索機能