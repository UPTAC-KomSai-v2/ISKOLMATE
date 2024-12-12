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
  <div class="flex-col justify-center m-8 rounded-3xl bg-slate-900 p-8 w-auto h-auto border-2 border-white shadow-[5px_5px_30px_#181824_,-15px_-15px_30px_#242434]">
    <div class="relative flex items-center bg-slate-900 text-white md:text-2xl p-10 m-2 border-2 border-white rounded-2xl w-auto h-1/2">
      <div class="lg:text-4xl mr-10">Tasks</div>  
      <h1 class="lg:text-8xl pr-5 cursor-pointer" id="currentTime"></h1>
      <div class="flex-row">
        <h2 class="lg:text-4xl cursor-pointer" id="currentDate"></h2>
        <h2 class="lg:text-4xl cursor-pointer" id="checkTime"></h2>
      </div>
          
      <div class="absolute flex items-center right-10 top-8 clear-left">
        <p class="text-right leading-4">
          <span class="sm:text-xs">PROFILE NAME</span> <br/>
          <span class="sm:text-xs">DESIGNATION</span>
        </p>
        <img src="{{asset('no-picture.png')}}" alt="Picture" class="float-right rounded-full ml-5 w-20 cursor-pointer" onclick="location.href='#'">
      </div>
    </div>
    <div class="flex-col p-[10pt] border-solid border-[black]rounded-lg m-2 grid gap-4 grid-cols-3 w-auto h-80 ">    
       <div  class="overflow-hidden flex-col  bg-white text-black rounded-3xl flex border-2 hover:cursor-pointer border-white m-2 h-80 ml-0  md:text-2xl font-bold">
            <a href="input_tasks"><div class="text-left bg-[blue] text-[white] p-[10pt]">Input Tasks</div></a>
            <div class="border-2 p-2">Task 1</div>
            <div class="border-2 p-2">Task 2</div>
            <div class="border-2 p-2">Task 3</div>
            <div class="border-2 p-2">Task 4</div>
      </div>
      <div class="overflow-hidden flex-col bg-white text-black rounded-3xl flex border-2 hover:cursor-pointer border-white m-3 h-80 ml-0 md:text-2xl font-bold">
            <a href="show_tasks"> <div class= "text-left bg-[blue] text-[white] p-[10pt]">Show Tasks</div></a>
            <div class="border-2 p-2">Task 1</div>
            <div class="border-2 p-2">Task 2</div>
            <div class="border-2 p-2">Task 3</div>
            <div class="border-2 p-2">Task 4</div>
      </div>
       
    </div>
  </div>
</body>
</html>