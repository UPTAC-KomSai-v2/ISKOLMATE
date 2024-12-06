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
  <div class="justify-center m-8 rounded-3xl bg-slate-900 p-8 w-auto h-auto border-2 border-white shadow-[5px_5px_30px_#181824_,-15px_-15px_30px_#242434]">
    <div class="absolute bg-red-400 w-10 h-10 rounded-full right-[-10px] top-[-10px]"  hidden></div>
    <div class="relative flex items-center bg-slate-900 text-white md:text-2xl p-10 m-2 border-2 border-white rounded-2xl w-auto h-1/2">
      <div class="lg:text-8xl">INPUT TASKS</div>
      <div class="absolute bg-red-400 w-10 h-10 rounded-full right-[-10px] top-[-10px]" id="checkAnnouncements" hidden></div> 
      <div class="overflow-hidden absolute flex items-center right-10 top-8 clear-left">
        <p class="text-right leading-4"> 
          <span class="sm:text-xs">PROFILE NAME</span> <br/>
          <span class="sm:text-xs">DESIGNATION</span>
        </p>
        <img src="{{asset('no-picture.png')}}" alt="Picture" class="float-right rounded-full ml-5 w-20 cursor-pointer" onclick="location.href='#'">
      </div>
    </div>
    
    
    <div class="flex-col border-solid border-[#f3e7e7] items-center p-10 rounded-lg">
      <div class="flex mb-10">
        <form name="form" action="" method="post">
          <input name="subject" id="subject" type="text" class="w-300 p-4 " value="Subject"/>
        </form>
      </div>
      <div class="flex">
        <label for="fileInput" class="p-[5px] bg-[#f0f0f0] border-solid border-[#ccc] hover:cursor-pointer">Upload</label>
        <span class="grow text-center text-[#888] bg-[#f0f0f0] p-[5px] border-x-[none] border-solid border-[#ccc] cursor-pointer">Choose file</span>
        <button class="bg-[#f0f0f0] border cursor-pointer px-2.5 py-[5px] rounded-[0_5px_5px_0] border-solid border-[#ccc]">Browse</button>
      </div>
      
    </div>
    
  </div>
</body>
</html>