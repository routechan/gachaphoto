@extends('layouts.app')

<link href="{{ asset('css/image.css') }}" rel="stylesheet">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('/js/preview.js') }}"></script>

@section('main')

<p class="pl-3 border-l-4 border-green-400  text-lg font-semibold mb-3">プロフィール編集</p>

<form method="post" action="/edit/profile" enctype="multipart/form-data">
@csrf
<p>アカウント名:<input type="text" name="name" class="border" value="{{$user->name}}" maxlength="15">{{$errors->first('name')}}</p>
<p>プロフィール文：<textarea name="profile" rows="5" cols="60" class="border" maxlength="100">{{$user->profile}}</textarea></p>
<p class="flex">アカウント画像：<div class="w-11 h-11 rounded-full overflow-hidden mb-3"><img id="image-preview"  src="#"  class="w-full h-full object-cover border"/></div></p>

<p><input type="file" name="image" id="image-input">  {{$errors->first('image')}}</p>
<input type="submit" value="変更する" class="botton mt-[12px] px-8 py-1 m-3 bg-green-400 text-white font-semibold rounded-full">
</form>
@endsection