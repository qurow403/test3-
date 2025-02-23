<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', '商品管理システム')</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
    @yield('styles')  {{-- 各ページ固有のCSSを読み込む  --}}
</head>


<body>
    <header class="header">
        <div class="header__inner">mogitate</div>
    </header>

    <main>
        <div class="container">
            @yield('content')
        </div>
        <!-- <main> を container でラップ  Bootstrap の container クラスを適用して、ページ全体のレイアウトを整える-->
    </main>
</body>

</html>