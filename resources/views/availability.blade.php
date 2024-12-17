@props(['first_name' => '', 'last_name' => '', 'position' => '', 'back' => ''])

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
    <body class="bg-slate-900 font-['Poppins'_,_sans-serif] text-white">
        <!-- @if (isset($back) && $back != '') -->
        <!-- @endif -->
        <div class="flex-col justify-center m-8 rounded-3xl bg-slate-900 p-8 w-auto h-auto border-2 border-white shadow-[5px_5px_30px_#181824_,-15px_-15px_30px_#242434]">
            <div class="absolute top-10 left-8 z-20">
                <a href="/dashboard" title="Go Back" class="text-2xl p-2.5 rounded-full">&#9664;</a>
            </div>
        <div class="relative flex items-center bg-slate-900 text-white md:text-2xl p-10 m-2 border-2 border-white rounded-2xl w-auto h-1/2">
        <h1 class="lg:text-8xl pr-5 cursor-pointer" id="currentTime">
            00:00:00 <!-- Prevent content shifting -->
        </h1>
        <div class="">
            <h2 class="lg:text-4xl cursor-pointer" id="currentDate"></h2>
            <h2 class="lg:text-4xl cursor-pointer" id="checkTime"></h2>
        </div>
        <div class="absolute flex items-center right-10 top-8 clear-left">
            <p class="text-right leading-4">
                <span class="sm:text-xs">{{ $first_name }}</span> 
                <span class="sm:text-xs">{{ $last_name }}</span> <br/>
                <span class="sm:text-xs">{{ $position }}</span>
            </p>
            <a href="{{ route('user.profile') }}">
                <img src="{{asset('no-picture.png')}}" alt="Picture" class="float-right rounded-full ml-5 w-20 cursor-pointer">
            </a>
            <a href="{{ route('logout' ) }}" class="text-base float-right bottom-[-10px] hover:duration-300 hover:text-[#8D1436]">Logout</a>
        </div>
    </div>
    <div class="rounded-lg m-2 mt-4 grid gap-4 grid-cols-3 w-auto">
    <div class="flex justify-between items-center">
        <div class="w-3/4" >
            <form action="{{ route('availability.store') }}" method="POST" class="flex flex-col">
                @csrf
                <label for="description" class="form-label font-bold">Select Date:</label>
                <input type="date" id="availability_date" name="availability_date" class = "bg-[#83173C] text-[#FEB71B]">
                <label for="description" class="form-label font-bold">Select Start Time:</label>
                <input type="time" id="start_time" name="start_time" class = "bg-[#83173C] text-[#FEB71B]">
                <label for="description" class="form-label font-bold">Select End Time:</label>
                <input type="time" id="end_time" name="end_time" class = "bg-[#83173C] text-[#FEB71B]">
                <button type="submit" class="bg-[#83173C] text-[#fff] border cursor-pointer px-4 py-2 w-48 rounded border-solid border-[#ccc] mb-4 hover:bg-gradient-to-tr from-slate-800 to-slate-950 transition duration-500 hover:text-[#FEB71C] hover:border-[#FEB71C] mt-5">
                    Set Availability
                </button>
            </form>
            @if ($errors->any()) 
                @foreach ($errors->all() as $error) 
                    <div class="text-red-500 text-sm mb-2">{{ $error }}</div>
                @endforeach
            @endif
        </div>

    </div>
    <div class="text-center h-60 text-black bg-white border-2 rounded-lg grid gap-4 grid-rows-2 grid-rows-[24px_auto]">
        <div class="bg-[#8D1436] rounded text-center grid grid-cols-3 h-10">
            <p class="text-white p-2.5">DATE</p>
            <p class="text-white p-2.5">TIME START</p>
            <p class="text-white p-2.5">TIME END</p>
        </div>
        <div class="grid grid-cols-3 overflow-auto">
            <h2 class="h-10">DATE</h2>
            <h2 class="h-10">TIME START</h2>
            <h2 class="h-10">TIME END</h2>
            <h2 class="h-10">DATE</h2>
            <h2 class="h-10">TIME START</h2>
            <h2 class="h-10">TIME END</h2>
            <h2 class="h-10">DATE</h2>
            <h2 class="h-10">TIME START</h2>
            <h2 class="h-10">TIME END</h2>
            <h2 class="h-10">DATE</h2>
            <h2 class="h-10">TIME START</h2>
            <h2 class="h-10">TIME END</h2>
            <h2 class="h-10">DATE</h2>
            <h2 class="h-10">TIME START</h2>
            <h2 class="h-10">TIME END</h2>            
        </div>
        
    </div>
    <div class="text-center h-60 text-black bg-white border-2 rounded-lg grid gap-4 grid-rows-2 grid-rows-[46px_auto]">
        <div class="bg-[#83173C] text-black border-2 rounded-lg grid gap-4 grid-cols-1">
            <form action="" class="w-auto grid h-1/5 grid-cols-4 bg-[#83173C] gap-1 items-center">
                <input type="date" id="availability_date" name="availability_date" class = "p-1 bg-[#83173C] text-[#FEB71B]">
                <input type="time" id="start_time" name="start_time" class = "p-1 bg-[#83173C] text-[#FEB71B]">
                <input type="time" id="end_time" name="end_time" class = "p-1 bg-[#83173C] text-[#FEB71B]">
                <button type="text-submit" class="text-[#fff] border cursor-pointer px-2 py-2 w-full h-full hover:bg-gradient-to-tr from-slate-800 to-slate-950 transition duration-500 hover:text-[#FEB71C] hover:border-[#FEB71C]">
                    Search
                </button>
            </form>
        </div>
        <div class="grid grid-cols-3 overflow-auto">
            <h2 class="h-10">DATE</h2>
            <h2 class="h-10">TIME START</h2>
            <h2 class="h-10">TIME END</h2>
            <h2 class="h-10">DATE</h2>
            <h2 class="h-10">TIME START</h2>
            <h2 class="h-10">TIME END</h2>
            <h2 class="h-10">DATE</h2>
            <h2 class="h-10">TIME START</h2>
            <h2 class="h-10">TIME END</h2>
            <h2 class="h-10">DATE</h2>
            <h2 class="h-10">TIME START</h2>
            <h2 class="h-10">TIME END</h2>
            <h2 class="h-10">DATE</h2>
            <h2 class="h-10">TIME START</h2>
            <h2 class="h-10">TIME END</h2>            
        </div>
    </div>
    
    </div>
        </div>
    </body>
</html>
    