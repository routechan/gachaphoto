@extends('layouts.app')

@section('main')
<link href="{{ asset('css/image.css') }}" rel="stylesheet">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="{{ asset('/js/preview.js') }}"></script>


<div class="container">

<!-- 画像を表示 -->
<img src="{{'/storage/'.$article['image_path']}}"class="article_image">
<!-- -->

<!-- 投稿者の情報を表示 -->
<div class="flex"><span class="pt-2">投稿者： </span><div class="w-10 h-10 rounded-full overflow-hidden mr-1"><img src="{{'/storage/'.$article->user->getImage()}}"class="w-full h-full object-cover border"></div>
    <a href="/user/{{$article->user->getId()}}" class="pt-2">
    {{$article->user->getName()}}</a>
</div>
<!-- -->

<!-- Views,Likes数を表示 -->
<div class="mt-1">Views: {{ $article->view_count }} 回
    Likes:  {{ $article->like_count }}回</div>
<!-- -->

<!-- いいねボタンを表示する -->
<span class="flex mb-[10px]">
   
     
    <!-- もし$niceがあれば＝ユーザーが「いいね」をしていたら -->
    @if($nice)
    <!-- 「いいね」取消用ボタンを表示 -->
    <a href="/article/unnice/{{$article['article_id']}}" class="inline-flex items-center justify-center px-3 py-1 border border-gray-500 text-base font-medium rounded-md text-gray-500 bg-white hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
        <img src="{{asset('image/ハートのマーク (3).png')}}" class="">いいね
        <!-- 「いいね」の数を表示 -->
        <span class="badge">
          
        </span>
    </a>
    @else
    <!-- まだユーザーが「いいね」をしていなければ、「いいね」ボタンを表示 -->
    <a href="/article/nice/{{$article['article_id']}}" class="inline-flex items-center justify-center px-3 py-1 border border-gray-500 text-base font-medium rounded-md text-gray-500 bg-white hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
        <img src="{{asset('image/ハートのマーク (3).png')}}" class=""> いいね
            <!-- 「いいね」の数を表示 -->
            <span class="badge">
               
            </span>
        </a>
    @endif
    </span>
<!-- -->

<!-- テキストを表示 -->
<p class="mb-[50px] break-all">{{$article['text']}}</p>
<!-- -->

<!-- コメント欄 -->
    <div class="catch">
        コメント
      </div>

    @foreach($comments as $comment)

   <div class="flex mb-1"> 
    <p>
    <div class="w-10 h-10 rounded-full overflow-hidden mr-1">
    <img src="{{'/storage/'.$comment->user->getImage()}}"class="w-full h-full object-cover border">
    </div>
    <span class="pt-2">{{$comment->user->getName()}}</span>
</p>
</div>
    <span class="pt-2 break-all">{{ $comment['comment'] }}</span>

@endforeach

<form method="POST"action="{{$article['article_id']}}/store">
    @csrf
    <input type="hidden"value="{{$article['article_id']}}"name="id">
    <textarea name="comment" rows="3" cols="60" class="mt-2 border textbox-001" placeholder="コメントを書きこんでね(140字以内)" maxlength="140" ></textarea>
    <input type="submit" class="botton mr-2 mt-[12px] px-8 py-1 m-3 bg-green-400 text-white font-semibold rounded-full">{{$errors->first('comment')}}
</div>
<!-- -->

@endsection
</div>