<x-dashboard-no-time-layout :back="route('tasks.list')">
    <!-- Header Section -->
    <div class="relative flex items-center bg-slate-900 text-white md:text-2xl p-10 m-2 border-2 border-white rounded-2xl w-auto h-1/2 ml-40"> <!-- Added "ml-40" -->
        <div class="lg:text-8xl">Tasks</div>
        <div class="overflow-hidden absolute flex items-center right-10 top-8 clear-left">
            <p class="text-right leading-4">
                <span class="sm:text-xs">PROFILE NAME</span> <br/>
                <span class="sm:text-xs">DESIGNATION</span>
            </p>
            <img src="{{asset('no-picture.png')}}" alt="Picture" class="float-right rounded-full ml-5 w-20 cursor-pointer" onclick="location.href='#'">
        </div>
    </div>

    <!-- Main Section -->
    <div class="flex items-start">
        <!-- Icons Section -->
        <!-- <div class="flex flex-col items-center justify-start mr-12"> -->
            <!-- <img src="{{asset('no-picture.png')}}" alt="Icon 1" class="rounded-full ml-5 w-20 cursor-pointer m-5" onclick="location.href='tasks'"> -->
            <!-- <img src="{{asset('no-picture.png')}}" alt="Icon 2" class="rounded-full ml-5 w-20 cursor-pointer m-5" onclick="location.href='dashboard'"> -->
        <!-- </div> -->

        <!-- Tasks Column -->
        <div class="overflow-auto flex-col bg-white text-black rounded-3xl flex border-2 hover:cursor-pointer border-white m-2 h-80 ml-0 md:text-2xl font-bold w-full">
            <div class="border-2 p-2">{{ $task->description }}</div>
        </div>
    </div>
</x-dashboard-no-time-layout>
