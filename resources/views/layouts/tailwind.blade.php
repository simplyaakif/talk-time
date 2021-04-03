<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @if (app()->environment('local'))
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />
    @endif
    <link rel="stylesheet" href="{{asset('css/gilroy.css')}}">
    <link rel="stylesheet" href="{{asset('css/app-tw.css')}}">
    @livewireStyles
    @livewireScripts

    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.3.0/alpine.js" integrity="sha512-nIwdJlD5/vHj23CbO2iHCXtsqzdTTx3e3uAmpTm4x2Y8xCIFyWu4cSIV8GaGe2UNVq86/1h9EgUZy7tn243qdA==" crossorigin="anonymous"></script>
    <title>Document</title>
    @yield('styles')
</head>
<body class="font-display font-normal">

@yield('content')

<x-footer></x-footer>
@yield('scripts')
</body>
</html>
