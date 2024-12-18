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
    <body class="bg-[#1e1e2f] text-white font-sans min-h-screen flex items-center justify-center">
        <div class="mx-auto w-[90%] max-w-md p-6 bg-[#1e1e2f] rounded-[20px] shadow-[15px_15px_30px_#181824,-15px_-15px_30px_#242434] relative text-center">
            <!-- Back Button -->
            <div class="absolute top-5 left-5">
                <a href="{{ route('choice') }}"
                    class="w-12 h-12 bg-[#1e1e2f] rounded-full shadow-[8px_8px_15px_#141418,-8px_-8px_15px_#282838] flex justify-center items-center text-white text-lg font-bold transition hover:shadow-[inset_8px_8px_15px_#141418,inset_-8px_-8px_15px_#282838]">
                    ◁
                </a>
            </div>

            <!-- Logo -->
            <div class="flex justify-center items-center mb-6">
                <img src="asset('images/up.png')" alt="UP Logo" class="w-32 rounded-full p-2.5" />
            </div>

            <!-- Title and Tagline -->
            <div class="text-2xl font-bold text-white mb-2">Iskolmate</div>
            <div class="text-sm text-gray-400 mb-8">your partner in suffering</div>

            <!-- Question -->
            <div class="text-lg text-gray-300 mb-6">Which one are you signing up for?</div>

            <!-- Role Selection -->
            <div class="flex gap-4 justify-center">
                <a href="{{ route('signup.teacher') }}" class="w-[45%] max-w-[300px] px-6 py-3 bg-[#1e1e2f] text-white font-bold rounded-[10px] border-2 border-white shadow-[10px_10px_20px_#181824,-10px_-10px_20px_#242434] transition hover:bg-gradient-to-br hover:from-[#2c2c3f] hover:to-[#1b1b2d] hover:shadow-[inset_10px_10px_20px_#181824,inset_-10px_-10px_20px_#242434]">
                    Teacher
                </a>
                <a href="{{ route('signup.student') }}" class="w-[45%] max-w-[300px] px-6 py-3 bg-[#1e1e2f] text-white font-bold rounded-[10px] border-2 border-white shadow-[10px_10px_20px_#181824,-10px_-10px_20px_#242434] transition hover:bg-gradient-to-br hover:from-[#2c2c3f] hover:to-[#1b1b2d] hover:shadow-[inset_10px_10px_20px_#181824,inset_-10px_-10px_20px_#242434]">
                    Student
                </a>
            </div>
        </div>
    </body>
</html>