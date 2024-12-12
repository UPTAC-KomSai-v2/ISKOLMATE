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

<body class="bg-slate-900">
    <div>
        <img src="{{asset('no-picture.png')}}" alt="Picture" class="float-left rounded-full ml-5 w-10 cursor-pointer mr-12" onclick="location.href='tasks'">
    </div>
    <div class="justify-center m-8 rounded-3xl bg-slate-900 p-8 w-auto h-auto border-2 border-white shadow-[5px_5px_30px_#181824_,-15px_-15px_30px_#242434]">
    <div class="relative flex items-center bg-slate-900 text-white md:text-5xl w-auto h-1/2">
            <div class="lg:text-2xl font-bold mb-4">INPUT TASKS</div>
        </div>

        <!-- Success Message Box -->
        <div id="successMessage" class="rounded-lg m-5 p-5 border-2 border-white bg-white w-full max-w-[500px] mx-auto flex justify-center items-center">
            <h1 class="text-center text-[#181824] font-bold md:text-4xl">The task has been successfully created!</h1>
        </div>
    </div>
</body>
</html>
