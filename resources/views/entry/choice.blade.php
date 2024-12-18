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
    <body class="bg-slate-900 font-['Poppins'_,_sans-serif] text-white flex items-center justify-center min-h-screen m-0">
        <div class="text-center w-[90%] max-w-[400px] p-8 bg-slate-900 text-white md:text-2xl border-2 border-white rounded-2xl shadow-[5px_5px_30px_#181824_,-15px_-15px_30px_#242434]">
            <!-- Logo -->
            <div class="flex justify-center items-center mb-6">
                <img src="asset('images/up.png')" alt="UP Logo" class="w-32 rounded-full p-2.5" />
            </div>

            <!-- Title and Tagline -->
            <div class="text-2xl font-bold text-white mb-2">Iskolmate</div>
            <div class="text-sm text-gray-400 mb-8">your partner in suffering</div>

            <!-- Buttons -->
            <div class="flex justify-around gap-4">
                <a
                    class="w-[45%] max-w-[300px] px-4 py-2 rounded-lg font-bold text-lg bg-slate-900 text-white border-2 border-white from-slate-800 to-slate-950 hover:bg-gradient-to-tr cursor-pointer hover:text-hover hover:border-hover hover:duration-500"
                    href="{{ route('login') }}">
                    Login
                </a>
                <a
                    class="w-[45%] max-w-[300px] px-4 py-2 rounded-lg font-bold text-lg bg-slate-900 text-white border-2 border-white from-slate-800 to-slate-950 hover:bg-gradient-to-tr cursor-pointer hover:text-hover hover:border-hover hover:duration-500"
                    href="{{ route('signup.choice') }}">
                    Sign Up
                </a>
            </div>
        </div>
    </body>
</html>