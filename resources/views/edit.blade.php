@extends('layouts.app')
@section('main')
<link href="{{ asset('css/image.css') }}" rel="stylesheet">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<div class="container">
<img src="{{'/storage/'.$article['image_path']}}"class="article_image">
<a href="{{'/delete/'.$article['article_id']}}">削除</a>
<p>{{$article['text']}}</p>

</div>

<div class="">
    <p class="comment font-bold">コメント</p>
    @foreach($comments as $comment)
    <img src="{{ asset('image/人物ボタン.png') }}">
    <p>{{ $comment['comment'] }}</p>
@endforeach
@endsection