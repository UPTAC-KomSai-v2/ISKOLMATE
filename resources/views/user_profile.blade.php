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
        <a href="/dashboard" title="Go Back" class="text-2x1 p-2.5 rounded-full">&#9664</a>
    </div>
  <div class="flex justify-start m-8 rounded-3xl bg-slate-900 p-8 w-auto h-auto border-2 border-white shadow-[5px_5px_30px_#181824_,-15px_-15px_30px_#242434] sm:max-h-max">
    <div class="bg-slate-900 text-white p-10 m-2 border-2 border-white rounded-2xl lg:w-4/12 lg:h-[500px]">
        <img src="{{asset('no-picture.png')}}" alt="Photo" class="rounded-lg mx-auto my-10 lg:w-[200px] lg:h-[200px]">
        <h1 class="lg:text-4xl font-bold mt-2">Name</h1>
      <p class="mt-8 lg:text-base sm:text-xs">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <div class="flex-flex-col justify-items-start bg-slate-900 text-white md:text-2xl lg:p-20 sm:p-10 m-2 border-2 border-white rounded-2xl w-8/12 h-[500px]">
        <div class="lg:text-base sm:text-xs w-9/12">
            <p class="p-2.5">Course</p><hr>
            <p class="p-2.5">Detail 1</p><hr>
            <p class="p-2.5">Detail 2</p><hr>
            <p class="p-2.5">Detail 3</p><hr>
            <p class="p-2.5">Detail 4</p>
        </div>
        <div class="flex lg:space-x-32 lg:text-base sm:text-xs sm:space-x-8 lg:my-20 sm:my-10 mx-auto w-auto justify-center text-center ">
            <a href="/availability" class="lg:px-20 sm:px-10 lg:py-5 sm:py-2 border-white border rounded-md hover:bg-gradient-to-tr from-slate-800 to-slate-950 hover:cursor-pointer">Set Availability</a>
            <a href="" class="lg:px-20 sm:px-10 lg:py-5 sm:py-2 border-white border rounded-md hover:bg-gradient-to-tr from-slate-800 to-slate-950 hover:cursor-pointer">Show Schedule</a>
        </div>
    </div>
  </div>
</body>
</html>