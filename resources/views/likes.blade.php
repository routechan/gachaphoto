@extends('layouts.app')
@section('main')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/image.css') }}" rel="stylesheet">
<div class="flex">
    <div class="w-16 h-16 rounded-full overflow-hidden mr-3">
    <img src="{{'/storage/'.$user['image_path']}}"class="w-full h-full object-cover border">
    </div>
    <p>
        {{$user['name']}}
        <br>{{$user['profile']}}
    </p>
    <a href="/edit/profile" class="botton ml-[400px]  px-8 py-1 my-[16px] bg-green-400  text-white font-semibold rounded-full">プロフィール編集</a>
</div>

<div class="border-t-[3px] mt-4"></div>




@endsection