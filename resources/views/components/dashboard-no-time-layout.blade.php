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
        <div class="justify-center m-8 rounded-3xl bg-slate-900 p-8 w-auto h-auto border-2 border-white shadow-[5px_5px_30px_#181824_,-15px_-15px_30px_#242434] relative">
            @if (isset($back) && $back != '')
                <div class="absolute top-0 left-0">
                    <a href="{{ $back }}" class="w-12 h-12 flex text-2xl justify-center items-center text-white font-bold cursor-pointer hover:text-hover hover:duration-500">
                        &#9664;
                    </a>
                </div>
            @endif

            {{ $slot }}
        </div>
    </body>
</html>