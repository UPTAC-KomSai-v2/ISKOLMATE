@props(['name' => '', 'position' => '', 'back' => ''])

<x-dashboard-no-time-layout :back="$back">
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
                <span class="sm:text-xs">{{ $name }}</span> <br/>
                <span class="sm:text-xs">{{ $position }}</span>
            </p>
            <a href="{{ route('user.profile') }}">
                <img src="{{asset('no-picture.png')}}" alt="Picture" class="float-right rounded-full ml-5 w-20 cursor-pointer">
            </a>
        </div>
    </div>
    <div class="rounded-lg m-2 mt-4 grid gap-4 grid-cols-6 w-auto">
        {{ $slot }}
    </div>
</x-dashboard-no-time-layout>