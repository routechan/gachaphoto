@extends('layouts.app')
@section('main')

<link href="{{ asset('css/image.css') }}" rel="stylesheet">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<p class="pl-3 border-l-4 border-green-400  text-lg font-semibold mb-3">カテゴリ</p>

@foreach($categories as $category)
<a href="{{'/category/'.$category['id']}}">{{$category->name}}</a>
@endforeach
@endsection