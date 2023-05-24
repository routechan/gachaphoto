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
    
</div>

<div class="border-t-[3px] mt-4">

    <div class="mt-4">
        @foreach ($items as $item)
        <a href="{{'/article/'.$item['article_id']}}"><img src="{{'/storage/'.$item['image_path']}}"class="img item"></a>
          @endforeach
    </div>
@endsection