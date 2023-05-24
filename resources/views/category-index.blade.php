@extends('layouts.app')
<link href="{{ asset('css/image.css') }}" rel="stylesheet">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@section('main')

<p>ふぉとギャラリ/{{$category_name->name}}</p>
<div class="image-container">
    @foreach ($items as $item)
        <a href="{{'/article/'.$item['article_id']}}"><img src="{{'/storage/'.$item['image_path']}}"class="img item"></a>
          @endforeach
    </div>

@endsection