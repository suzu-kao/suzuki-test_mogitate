<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <title>Document</title>
    @yield('css')
</head>

<body>
    <header class="header">
        <h1 class="header-logo"><a href="">mogitate</a></h1>
        @yield('header')
    </header>

    <main class="main">
        @yield('content')
    </main>
</body>

</html>