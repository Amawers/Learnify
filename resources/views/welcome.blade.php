<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="flex justify-center items-center h-screen">
    <div class="flex flex-col justify-between h-80 w-96 ">
        <div class="flex flex-col items-center justify-around h-28">
            <div class="flex flex-row w-full justify-around">
                <span class="text-3xl text-black font-bold">
                    Welcome to
                </span>
                <img class="h-10" src="{{url('/images/logo.png')}}" alt="">
                <x-learnify-header-name />
            </div>
            <span class="text-sm text-black">
                Unlock the limitless IT learning environment.
            </span>
        </div>
        <div class="flex flex-col justify-between h-28 ">
            @if (Route::has('login'))
                <button class="btn btn-primary text-white" onclick="window.location='{{ url('/login') }}'">Log In</button>
            @endif
            @if (Route::has('register'))
                <button class="btn btn-outline" onclick="window.location='{{ url('/register') }}'">Create Account</button>
            @endif
        </div>
    </div>
</body>
</html>
