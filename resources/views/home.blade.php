<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>

    </style>
</head>
<body>
    <div class="wrapper">
        <div class="content">Hidden content</div>
        <div class="toggle">Click</div>
    </div>

    <div class="wrapper">
        <div class="content">Hidden content</div>
        <div class="toggle">Click</div>
    </div>

    <div class="wrapper">
        <div class="content">Hidden content</div>
        <div class="toggle">Click</div>
    </div>

    <div class="wrapper">
        <div class="content">Hidden content</div>
        <div class="toggle">Click</div>
    </div>

    <div class="wrapper">
        <div class="content">Hidden content</div>
        <div class="toggle">Click</div>
    </div>

    <div class="wrapper">
        <div class="content">Hidden content</div>
        <div class="toggle">Click</div>
    </div>

    <script>
        document.querySelectorAll('.wrapper').forEach(el => {
            el.addEventListener('click', e => {
                if(e.target.classList.contains('toggle')) el.querySelector('.content').classList.toggle('toggled');
            });
        })
    </script>

</body>
