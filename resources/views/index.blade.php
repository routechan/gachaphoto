@extends('layouts.app')
@section('main')
<link href="{{ asset('css/image.css') }}" rel="stylesheet">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

@section('head-image')
<div id="head-image">
@endsection

  @section('main')
  <div class="font-semibold mb-2">
<p class="pl-3 border-l-4 border-green-400  text-lg mb-3">ふぉとギャラリ</p>

  <a href="/index?sort=created_at">新着順</a>
    <a href="/index?sort=like_count">いいね順</a>
      <a href="/index?sort=view_count">閲覧数順</a>
  </div>

  <div class="image-container">
  @foreach ($items as $item)
      <a href="{{'/article/'.$item['article_id']}}"><img src="{{'/storage/'.$item['image_path']}}"class="img item"></a>
        @endforeach
  </div>
@isset($sort)
{{$items->appends(['sort'=>$sort])->links()}}
@endisset
@if($sort = "")
{{$items->links()}}
@endif
@endsection