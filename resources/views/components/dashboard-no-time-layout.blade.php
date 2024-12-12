<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ISKOLMATE</title>
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/script.js'])
        @endif
    </head>
    <body class="bg-slate-900 font-['Poppins'_,_sans-serif] text-white">
        @if (isset($back) && $back != '')
        <div class="absolute top-10 left-8 z-20">
            <a href={{$back}} title="Go Back" class="text-2xl p-2.5 rounded-full">&#9664;</a>
        </div>
        @endif
        <div class="flex-col justify-center m-8 rounded-3xl bg-slate-900 p-8 w-auto h-auto border-2 border-white shadow-[5px_5px_30px_#181824_,-15px_-15px_30px_#242434]">
            {{ $slot }}
        </div>
    </body>
</html>