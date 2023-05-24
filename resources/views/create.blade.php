@extends('layouts.app')
@section('main')


<link href="{{ asset('css/image.css') }}" rel="stylesheet">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('/js/preview.js') }}"></script>

<p class="pl-3 border-l-4 border-green-400  text-lg font-semibold mb-3">写真を投稿</p>

<div class="image-container">
    <img id="image-preview" class="img" src="#" alt="Image Preview" />
</div>

<form method="post" action="/store" enctype="multipart/form-data">
  @csrf
  <input type="hidden"name="user_id"value="{{$user['id']}}">
  <input type="file" name="image" id="image-input">
  {{$errors->first('image')}}
  <br>


  <select name="category" >
    <option value="">選択してください</option>
    @foreach($categories as $category)
    <option value="{{$category['id']}}">{{$category['name']}}</option>
    @endforeach
    </select>
    <a href="/create/category"class="border">カテゴリーを新しく作る</a>

  <p><textarea name="text" rows="5" cols="60" class="border mt-2 textbox-001" maxlength="140" placeholder="テキスト(140字以内)">{{old('text')}}</textarea>{{$errors->first('text')}}</p>
  <p><input type="submit" value="投稿する" class="mt-[12px] px-8 py-1 m-3 bg-green-400 text-white font-semibold rounded-full"></p>
</form>


<script>


@endsection
