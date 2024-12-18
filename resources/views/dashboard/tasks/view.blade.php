<x-dashboard-layout :first_name="$first_name" :last_name="$last_name" :position="$position" :back="route('dashboard')">
    {{-- Display Error Message --}}
    @if (session('error'))
        <div class="text-red-500 text-sm mb-2">
            {{ session('error') }}
        </div>
    @endif

    {{-- Display Success Message --}}
    @if (session('message'))
        <div class="text-green-500 text-sm mb-2">
            {{ session('message') }}
        </div>
    @endif

    <div class="col-span-6 overflow-auto flex-col bg-white text-black rounded-3xl flex border-2 cursor-pointer border-white m-2 h-80 ml-0  md:text-2xl font-bold hover:duration-500 hover:border-hover">
        @foreach($tasks as $task)
            <a href="{{ route('tasks.show', $task->id) }}" class="border-2 p-2">{{ $task->title }}</a>
            <form class="relative" action="{{route('tasks.destroy', [$task->id]) }}" method="POST" onsubmit="return confirm('Are you sure you wish to delete this task?');">
                @csrf @method('DELETE')
                <button type="submit" class="absolute right-2.5 top-[-3.5rem] px-4 py-2 rounded-md bg-[#1e1e2f] text-white"> DELETE </button>
            </form>
        @endforeach

    </div>
    <a href="{{ route('tasks.create') }}"><div class="rounded-lg text-center bg-[#8D1436] text-[white] p-[10pt] hover:text-hover hover:duration-500 hover:bg-gradient-to-tr from-slate-800 to-slate-950">Input Tasks</div></a>
    <!-- <div class="col-span-3 overflow-hidden flex-col bg-white text-black rounded-3xl flex border-2 cursor-pointer border-white m-3 h-80 ml-0 md:text-2xl font-bold hover:duration-500 hover:border-hover">
        <a href="show_tasks"> <div class= "text-left bg-[#8D1436] text-[white] p-[10pt] hover:text-hover hover:duration-500 hover:bg-gradient-to-tr from-slate-800 to-slate-950">Show Tasks</div></a>
        <div class="border-2 p-2 hover:bg-[#d8879e] hover:duration-500">Task 1</div>
        <div class="border-2 p-2 hover:duration-500">Task 2</div>
        <div class="border-2 p-2 hover:duration-500">Task 3</div>
        <div class="border-2 p-2 hover:duration-500">Task 4</div>
    </div> -->
</x-dashboard-layout>
