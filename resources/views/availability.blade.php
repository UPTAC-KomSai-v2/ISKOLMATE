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
    <body class="bg-[#1e1e2f]">
        <div class="flex-col justify-center m-8 rounded-3xl bg-white p-8 w-auto h-auto shadow-[10px_10px_5px_#181824_,-15px_-15px_30px_#242434]">
            <div class="relative flex items-center bg-[#1e1e2f] text-white md:text-2xl p-10 m-2 border-2 border-white rounded-2xl w-auto h-1/2">
                <h1 class="lg:text-8xl pr-5 cursor-pointer" id="currentTime"></h1>
                <div class="">
                    <h2 class="lg:text-4xl cursor-pointer" id="currentDate"></h2>
                    <h2 class="lg:text-4xl cursor-pointer" id="checkTime"></h2>
                </div>
                <div class="absolute flex items-center right-[2.5rem] top-[2rem] clear-left">
                    <p class="text-right leading-4 ">
                    <span class="sm:text-xs" id="profileNameDashboardDisplay">PROFILE NAME</span> <br/>
                    <span class="sm:text-xs" id="designationDashboardDisplay">DESIGNATION</span>
                    </p>
                    <img src="{{asset('no-picture.png')}}" alt="Picture" class="float-right rounded-full ml-5 w-20 cursor-pointer" onclick="location.href='#'">
                </div>
            </div>
            <div class="rounded-lg m-2 grid gap-4 grid-cols-2 w-auto h-80 "> 
                <div class="flex justify-between items-center">
                    <div class="w-3/4" >
                        <label for="description" class="form-label">Description</label>
                        <input type="datetime-local" id="birthday" name="birthday" class = "bg-[#83173C] text-[#FEB71B]">
                    </div>
                </div>
                <div class="flex flex-col justify-center items-end w-1/4 font-bold">
                    <button class="bg-[#83173C] text-[#FEB71B] border cursor-pointer px-4 py-2 w-48 rounded border-solid border-[#ccc] mb-4" onclick="location.href='input_tasks1'">
                        Set Availability
                    </button>
                    <button class="bg-[#83173C] text-[#FEB71B] border cursor-pointer px-4 py-2 w-48 rounded border-solid border-[#ccc]" onclick="location.href='tasks'">
                        Remove Availability
                    </button>
                </div>
            </div>
        </div>
    </body>
</html>