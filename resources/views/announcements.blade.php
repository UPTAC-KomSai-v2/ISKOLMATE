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
    <body class="bg-[#1e1e2f] text-white font-['Poppins'_,_sans-serif]">
        <div class="absolute top-10 left-8 z-20">
            <a href="/dashboard" title="Go Back" class="text-2xl p-2.5 rounded-full">&#9664;</a>
        </div>
        <div class="absolute flex-col justify-center m-8 rounded-3xl bg-[#1e1e2f] p-8 w-auto h-auto shadow-[10px_10px_5px_#181824_,-15px_-15px_30px_#242434]">
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
                <div class="relative w-full flex justify-center right-28">
                    <div onclick="location.href='announcements2'" class="bg-fuchsia-900 rounded-3xl flex border-2 hover:shadow-[inset_35px_35px_20px_#181824_,_inset_-35px_-35px_20px_#242434] hover:cursor-pointer border-white  p-2.5 h-16 justify-center items-center md:text-2xl md:mx-40 sm:text-xs font-bold">Make an announcement</div>
                </div>
            </div>
            <div class="flex-col p-[10pt] border-solid border-[black]rounded-lg m-2 grid gap-4 grid-cols-3 w-auto h-80 ">    
                <div class="overflow-hidden flex-col  bg-white text-black rounded-3xl flex border-2  border-white m-2 h-80 ml-0  md:text-2xl font-bold">
                    <div class="text-left bg-[blue] text-[white] p-[10pt]">Admin Announcements</div></a>
                    <div class="border-2 p-2">Announcement #1</div>
                    <div class="border-2 p-2">Announcement #2</div>
                    <div class="border-2 p-2">Announcement #3</div>
                    <div class="border-2 p-2">Announcement #4</div>
                </div>
                <div class="overflow-hidden flex-col bg-white text-black rounded-3xl flex border-2  border-white m-3 h-80 ml-0 md:text-2xl font-bold">
                    <div class= "text-left bg-[blue] text-[white] p-[10pt]">Student Announcements</div></a>
                    <div class="border-2 p-2">Announcement #1</div>
                    <div class="border-2 p-2">Announcement #2</div>
                    <div class="border-2 p-2">Announcement #3</div>
                    <div class="border-2 p-2">Announcement #4</div>
                </div>
                <div class="overflow-hidden flex-col bg-white text-black rounded-3xl flex border-2  border-white m-3 h-80 ml-0 md:text-2xl font-bold">
                    <div class= "text-left bg-[blue] text-[white] p-[10pt]">Course Specific Announcements</div></a>
                    <div class="border-2 p-2">Announcement #1</div>
                    <div class="border-2 p-2">Announcement #2</div>
                    <div class="border-2 p-2">Announcement #3</div>
                    <div class="border-2 p-2">Announcement #4</div>
                </div>
            </div>
        </div>
    </body>
</html>