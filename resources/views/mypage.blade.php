@extends('layouts.app')
@section('main')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/image.css') }}" rel="stylesheet">

<p class="pl-3 border-l-4 border-green-400  text-lg font-semibold mb-3">マイページ</p>

<div class="flex">
    <div class="w-11 h-11 rounded-full overflow-hidden mr-2">
    <img src="{{'/storage/'.$user['image_path']}}" class="w-full h-full object-cover border">
    </div>
    <div class="mr-[15px] w-[590px]">
        {{$user['name']}}
        <br>{{$user['profile']}}
    </div>
    <a href="/edit/profile" class="botton px-8 py-1 my-[16px] bg-green-400  text-white font-semibold rounded-full" >プロフィール編集</a>
</div>

<div class="border-t-[3px] mt-4">

    <div class="mt-4">
        @foreach ($items as $item)
        <a href="{{'/mypage/'.$item['article_id']}}"><img src="{{'/storage/'.$item['image_path']}}"class="img item"></a>
          @endforeach
          {{$items->links()}}
    </div>
@endsection