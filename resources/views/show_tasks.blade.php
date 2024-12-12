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
    <body class="bg-slate-900 text-white font-['Poppins'_,_sans-serif]">
        <div class="absolute top-10 left-8 z-20">
            <a href="/tasks" title="Go Back" class="text-2xl p-2.5 rounded-full">&#9664;</a>
        </div>
        <div class="justify-center m-8 rounded-3xl bg-slate-900 p-8 w-auto h-auto border-2 border-white shadow-[5px_5px_30px_#181824_,-15px_-15px_30px_#242434]">
            <!-- Header Section -->
            <div class="relative flex items-center bg-slate-900 text-white md:text-2xl p-10 m-2 border-2 border-white rounded-2xl w-auto h-1/2 ml-40"> <!-- Added "ml-40" -->
                <div class="lg:text-8xl">Tasks</div>
                <div class="overflow-hidden absolute flex items-center right-10 top-8 clear-left">
                    <p class="text-right leading-4">
                        <span class="sm:text-xs">PROFILE NAME</span> <br/>
                        <span class="sm:text-xs">DESIGNATION</span>
                    </p>
                    <img src="{{asset('no-picture.png')}}" alt="Picture" class="float-right rounded-full ml-5 w-20 cursor-pointer" onclick="location.href='#'">
                </div>
            </div>

            <!-- Main Section -->
            <div class="flex items-start">
                <!-- Icons Section -->
                <div class="flex flex-col items-center justify-start mr-12">
                    <img src="{{asset('no-picture.png')}}" alt="Icon 1" class="rounded-full ml-5 w-20 cursor-pointer m-5" onclick="location.href='tasks'">
                    <img src="{{asset('no-picture.png')}}" alt="Icon 2" class="rounded-full ml-5 w-20 cursor-pointer m-5" onclick="location.href='dashboard'">
                </div>

                <!-- Tasks Column -->
                <div class="overflow-hidden flex-col bg-white text-black rounded-3xl flex border-2 hover:cursor-pointer border-white m-2 h-80 ml-0 md:text-2xl font-bold w-full">
                    <div class="border-2 p-2">Task 1</div>
                    <div class="border-2 p-2">Task 2</div>
                    <div class="border-2 p-2">Task 3</div>
                    <div class="border-2 p-2">Task 4</div>
                    <div class="border-2 p-2">Task 5</div>
                    <div class="border-2 p-2">Task 6</div>
                </div>
            </div>
        </div>
    </body>
</html>
