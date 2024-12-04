<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @auth
            Admin |
        @endauth
        {{ $title }}
    </title>
    <link rel="icon" href="images/lambang-tala.png" type="image/png" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<style>
    [x-cloak] {
        display: none !important;
    }
</style>

<body class="font-inter">
    @yield('content')
</body>

</html>
