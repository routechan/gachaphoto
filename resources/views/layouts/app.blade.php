<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="background-color: #F6F6F6">

   <header class="max-w-[1450px] sticky top-0 z-50 shadow bg-green-400 items-center">
   <div class="flex place-content-between  max-w-[1240px] mx-auto mb-[1px] ">
    
   <div class="flex"> <a href="/index"><img class="w-[150px] h-11 mt-[5px] mr-4" src="{{ asset('image/gatyalogo.png') }}" alt=""></a>
    <form method="get" class="flex items-center" action="/search">
        @csrf
        <div class="rounded-full items-center">
        <input name="search" type="text" placeholder="検索語句を入力" class="px-4 py-1 border rounded-l-md w-full" />
        </div>
      </form>
   </div>
    @guest
    <nav>
        <ul class="flex text-base">
            <li class="botton ml-[20px]  py-1 my-3 bg-green-400  text-white font-semibold"><a href="/login">ログイン</a></li>
            <li class="botton ml-[20px]  py-1 my-3 bg-green-400  text-white font-semibold"><a href="/register">新規会員登録</a></li>
            <li class="ml-[20px] w-9 my-3"><a href="/login"><img src="{{ asset('image/人物ボタン.png') }}"></a>
            </ul>
            </nav>
            @endguest

            @auth
                <nav>
                    <ul class="flex text-base ">
                        <li class="botton ml-[20px]  py-1 my-3 bg-green-400  text-white font-semibold"><a href="/logout">ログアウト</a></li>
                        <li class=" ml-[20px]  py-1 my-3 bg-green-400  text-white font-semibold">ログイン中</li>
                        <li class="ml-[20px] w-9 h-9 rounded-full overflow-hidden my-3"><a href="/mypage"><img src="{{ '/storage/'.Auth::user()->image_path }}" class="w-full h-full object-cover border"></a></li>
                        </ul>
                        <nav>
                        
            @endauth

        </header>
        <div>
@yield('head-image')
        </div>

<div class="main flex  mt-[30px] w-max mx-auto">

    <aside class="w-[260px] px-[40px] py-[15px] border mr-5 h-max font-semibold" id="aside-bg" style="background-color: #ffff">
        <p class="pl-3 border-l-4 border-green-400  text-lg">メニュー</p>
        <p class="mt-10 pl-3">ガチャふぉとの<br>使い方</p>
        <P class="mt-10 pl-3"><a href="/create">写真を投稿</a></P>
        <p class="mt-10 pl-3"><a href="/index">ふぉとギャラリ</a></p>
        <p class="mt-10 pl-3"><a href="/category">カテゴリ</a></p>
    </aside>

<div id="article-bg">

   <article class="w-[970px]  px-[45px] py-[15px] border" style="background-color: #ffff">
    @yield('main')
   </article>

    </div>

</div>


   <footer>
   </footer>
</body>
</html>