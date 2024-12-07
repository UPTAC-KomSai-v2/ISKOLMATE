<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ISKOLMATE</title>
        <!-- Fonts -->
        <!-- <link rel="preconnect" href="https://fonts.bunny.net"> -->
        <!-- <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> -->

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/script.js'])
        @endif
    </head>
<body class="bg-[#1e1e2f]">
  <div class="flex-col justify-center m-8 rounded-3xl bg-[#1e1e2f] p-8 w-auto h-auto shadow-[10px_10px_5px_#181824_,-15px_-15px_30px_#242434]">
    <div class="relative flex items-center bg-[#1e1e2f] text-white md:text-2xl p-10 m-2 border-2 border-white rounded-2xl w-auto h-1/2">
      <h1 class="lg:text-8xl pr-5 cursor-pointer" id="currentTime"></h1>
      <div class="">
        <h2 class="lg:text-4xl cursor-pointer" id="currentDate"></h2>
        <h2 class="lg:text-4xl cursor-pointer" id="checkTime"></h2>
      </div>
      <div class="absolute flex items-center right-[2.5rem] top-[2rem] clear-left">
        <p class="text-right leading-4">
          <span class="sm:text-xs" id="profileNameDashboardDisplay">PROFILE NAME</span> <br/>
          <span class="sm:text-xs" id="designationDashboardDisplay">DESIGNATION</span>
        </p>
        <img src="{{asset('no-picture.png')}}" alt="Picture" class="float-right rounded-full ml-5 w-20 cursor-pointer" onclick="location.href='#'">
      </div>
      
    </div>
    <div class="rounded-lg m-2 m-2 flex w-auto h-80 ">
      <textarea class="overflow-y-scroll resize-none" cols="150" rows="15"></textarea>
      <div class="flex flex-col content-center">

        <div onclick="location.href='announcements3'" class="bg-fuchsia-900 w-80 text-white rounded-3xl flex border-2 hover:shadow-[inset_35px_35px_20px_#181824_,_inset_-35px_-35px_20px_#242434] hover:cursor-pointer border-white m-2 h-20 justify-center items-center md:text-2xl font-bold">Post</div>
        <div onclick="location.href='announcements'" class="bg-fuchsia-900 w-80 text-white rounded-3xl flex border-2 hover:shadow-[inset_35px_35px_20px_#181824_,_inset_-35px_-35px_20px_#242434] hover:cursor-pointer border-white m-2 h-20 justify-center items-center md:text-2xl font-bold">Cancel</div>
      </div>
    </div>
  </div>
</body>
</html>