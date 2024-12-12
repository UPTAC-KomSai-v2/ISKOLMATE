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
    <body class="m-0 p-0 bg-slate-900 text-white flex justify-center items-center h-dvh font-['Poppins'_,_sans-serif]">
        <div class="relative bg-slate-900 w-[90%] max-w-[400px] text-center p-[30px] rounded-[20px] shadow-[5px_5px_30px_#181824_,-15px_-15px_30px_#242434]">
            <!-- Back -->
            <div class="absolute top-[20px] left-[20px]">
                <a href="/start2" title="Go Back" class="text-2xl bg-slate-900 p-[10px] rounded-full shadow-[10px_10px_20px_#181824_,_-10px_-10px_20px_#242434] hover:shadow-[inset_10px_10px_20px_#181824_,_inset_-10px_-10px_20px_#242434] hover:bg-gradient-to-tr from-slate-800 to-slate-900">&#9664;</a>
            </div>

            <!-- Title -->
            <div class="text-4xl m-[20px_0] text-white drop-shadow-[1px_1px_5px_rgba(0,0,0,0.4)]">Iskolmate</div>

            <!-- Question -->
            <div class="text-xl mb-[30px]">Which one are you signing up for?</div>

            <!-- Buttons -->
            <div class="flex justify-around gap-4 mt-[20px]">            
                <a href="/teacher_signup" class="w-[45%] max-w-[300px] p-4 text-base font-bold text-white border-2 rounded-xl cursor-pointer bg-slate-900 hover:shadow-[inset_10px_10px_20px_#181824_,_inset_-10px_-10px_20px_#242434] hover:bg-gradient-to-tr from-slate-800 to-slate-900">Teacher</a>
                <a href="/student_signup" class="w-[45%] max-w-[300px] p-4 text-base font-bold text-white border-2 rounded-xl cursor-pointer bg-slate-900 hover:shadow-[inset_10px_10px_20px_#181824_,_inset_-10px_-10px_20px_#242434] hover:bg-gradient-to-tr from-slate-800 to-slate-900">Student</a>
            </div>
        </div>
    </body>
</html>