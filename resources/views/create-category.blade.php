@extends('layouts.app')
@section('main')

<p class="pl-3 border-l-4 border-green-400  text-lg font-semibold mb-3">カテゴリ作成</p>

<form action="/store/category" method="post">
    @csrf
    カテゴリを入力:<input type="text" name="category" class="border" maxlength="20"><br>
    <input type="submit"value="カテゴリを作成" class="mt-[12px] px-8 py-1 m-3 bg-green-400 text-white font-semibold rounded-full">
</form>
@isset($message)
<p class="text-red-600" >{{$message}}</p>
<p class="text-red-600" >{{$errors->first('category')}}</p>
@endisset
@endsection