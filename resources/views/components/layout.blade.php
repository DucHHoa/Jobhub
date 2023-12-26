<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Job Hub</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
    </head>
    <body {{$attributes->class(["mx-auto bg-slate-200 text-slate-950"])}}>
        <x-navbar/>  
            {{-- Thong bao action --}}
            @if (session('success'))
                <div role="alert" class="my-8 max-w-5xl mx-auto rounded-md border-l-4 border-green-300 bg-green-100 p-4 text-green-700 opacity-75">
                     <p>{{session('success')}}</p>
                </div>
            @endif
           
            @if (session('error'))
                <div role="alert" class="my-8 max-w-lg mx-auto rounded-md border-l-4 border-red-300 bg-red-100 p-4 text-red-700 opacity-75">
                     <p>{{session('error')}}</p>
                </div>
            @endif
            {{$slot}}   
    </body>
</html>