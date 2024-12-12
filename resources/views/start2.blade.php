<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iskolmate</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/script.js'])
    @endif
</head>

<body class="m-0 p-0 bg-slate-900 text-white flex justify-center items-center h-dvh font-['Poppins'_,_sans-serif]">
    <div class="relative bg-slate-900 w-11/12 max-w-sm text-center p-8 rounded-2xl shadow-[5px_5px_30px_#181824_,-15px_-15px_30px_#242434]">
        <!-- Logo -->
        <div>
            <img src="up.png" alt="UP Logo" class="inline-block mb-2.5 p-2.5 rounded-full w-24 shadow-[inset_10px_10px_20px_#181824_,_inset_-10px_-10px_20px_#242434]">
        </div>

        <!-- Title and Tagline -->
        <div class="text-4xl my-5 text-white drop-shadow-[1px_1px_5px_rgba(0,0,0,0.4)]">Iskolmate</div>
        <div class="text-base mb-8 text-neutral-300">your partner in suffering</div>

        <!-- Buttons -->
        <div class="flex justify-around gap-4 mt-5">
            <a href="/login" class="w-1/2 max-w-72 p-4 text-base font-bold text-white border-2 rounded-xl cursor-pointer bg-slate-900 shadow-inner hover:shadow-slate-800 hover:bg-gradient-to-t from-slate-800 to-slate-900">Login</a>
            <a href="/signup" class="w-1/2 max-w-72 p-4 text-base font-bold text-white border-2 rounded-xl cursor-pointer bg-slate-900 hover:bg-gradient-to-t from-slate-800 to-slate-900">Signup</a>
        </div>
    </div>
</body>

</html>