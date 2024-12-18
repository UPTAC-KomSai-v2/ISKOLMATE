<x-dashboard-no-time-layout :back="route('dashboard')">
    <div class="flex justify-start rounded-3xl bg-slate-900 w-auto h-auto sm:max-h-max">
        <div class="bg-slate-900 text-white p-10 m-2 border-2 border-white rounded-2xl lg:w-4/12 lg:h-[500px]">
            <img src="{{asset('no-picture.png')}}" alt="Photo" class="rounded-lg mx-auto my-10 lg:w-[200px] lg:h-[200px]">
            <h1 class="lg:text-4xl font-bold mt-2">{{ $first_name }} {{ $last_name }}</h1>
            <p class="mt-8 lg:text-base sm:text-xs">
                {{ $position }} <br>
                {{ $program }}
            </p>
        </div>
        <div class="flex-flex-col justify-items-start bg-slate-900 text-white md:text-2xl lg:p-20 sm:p-10 m-2 border-2 border-white rounded-2xl w-8/12 h-[500px]">
            <div class="lg:text-base sm:text-xs w-9/12">
                <p class="p-2.5">
                    @if ($is_teacher)
                        Teaches
                    @else
                        Courses
                    @endif
                </p>
                @foreach ($courses as $course)
                    <hr><p class="p-2.5">{{ $course->group_name }}</p>
                @endforeach
            </div>
            <div class="flex lg:space-x-32 lg:text-base sm:text-xs sm:space-x-8 lg:my-20 sm:my-10 mx-auto w-auto justify-center text-center ">
                <a href="{{ route('availability') }}" class="lg:px-20 sm:px-10 lg:py-5 sm:py-2 border-white border rounded-md hover:bg-gradient-to-tr from-slate-800 to-slate-950 hover:cursor-pointer">Set Availability</a>
                <a href="" class="lg:px-20 sm:px-10 lg:py-5 sm:py-2 border-white border rounded-md hover:bg-gradient-to-tr from-slate-800 to-slate-950 hover:cursor-pointer">Show Schedule</a>
            </div>
        </div>
    </div>
</x-dashboard-no-time-layout>