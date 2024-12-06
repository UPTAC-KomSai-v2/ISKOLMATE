<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ISKOLMATE</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/script.js', 'resources/js/startJS.js'])
    @endif
</head>

<body class="m-0 p-0 bg-slate-900 text-white flex justify-center items-center h-dvh font-['Poppins'_,_sans-serif]">
    <div class="relative bg-slate-900 w-11/12 max-w-sm text-center p-8 rounded-2xl shadow-[5px_5px_30px_#181824_,-15px_-15px_30px_#242434]">
        <div class="logo">
            <img src="up.png" class="inline-block mb-2.5 p-2.5 rounded-full w-24 shadow-[inset_10px_10px_20px_#181824_,_inset_-10px_-10px_20px_#242434]">
        </div>
        <div class="text-4xl my-5 text-white drop-shadow-[1px_1px_5px_rgba(0,0,0,0.4)]">Iskolmate</div>
        <div class="text-base mb-8 text-neutral-300">your partner in suffering</div>
        <div class="relative w-full h-4 rounded-lg my-5 mx-auto overflow-hidden shadow-[inset_10px_10px_20px_#181824_,_inset_-10px_-10px_20px_#242434]">
            <div class="w-0 h-full bg-gradient-to-r from-green-500 to-green-400 animate-[loading_3s_forwards]"></div>
        </div>
        <div class="mt-2.5 text-base text-neutral-300">Loading...</div>
    </div>
    
    <script src="startJS.js">
        
    </script>
</body>

</html>