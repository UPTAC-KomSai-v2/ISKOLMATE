<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ISKOLMATE</title>
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/script.js, resources/js/startJS.js'])
        @endif
    </head>

<body class="flex justify-center items-center h-dvh bg-slate-900 font-['Poppins'_,_sans-serif] text-white"></body>
    <div class="text-center w-[90%] max-w-[300px] p-8 rounded-lg relative shadow-[5px_5px_30px_#181824_,-15px_-15px_30px_#242434]">
        <div><img src="up.png" class="mb-2.5 rounded-full w-24 inline-block"></div>
        <div class="text-4xl mx-5">Iskolmate</div>
        <div class="text-base mb-8">your partner in suffering</div>
        <div class="w-full h-3.5 rounded-lg overflow-hidden m-[20px_auto]">
            <div class="w-0 h-full bg rounded-lg bg-gradient-to-r from-[#00ff9d] to-[#00e08c] animate-[loading_3s_forwards]"></div>
        </div>
        <div class="mt-2.5 text-base">Loading...</div>
    </div>

    <script>
        setInterval(() => {
            location.href = "/start2";
        }, 3000);
    </script>
</body>

</html>