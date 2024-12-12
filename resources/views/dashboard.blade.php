<x-dashboard-layout :name="$name" :position="$position">
    <a href="announcements" class="col-span-3 relative bg-slate-900 text-white rounded-3xl flex border-2 hover:bg-gradient-to-tr from-slate-800 to-slate-950 hover:cursor-pointer border-white m-2 h-80 ml-0 justify-center items-center md:text-2xl font-bold">
        <div class="absolute bg-red-400 w-10 h-10 rounded-full right-[-10px] top-[-10px]" id="checkAnnouncements" hidden></div>
        ANNOUNCEMENTS
    </a>
    <a href="tasks" class="col-span-3 bg-slate-900 text-white rounded-3xl flex border-2 hover:bg-gradient-to-tr from-slate-800 to-slate-950 hover:cursor-pointer border-white m-2 h-80 justify-center items-center md:text-2xl font-bold">
        TASKS
    </a>
    <a href="availability" class="col-span-3 bg-slate-900 text-white rounded-3xl flex border-2 hover:bg-gradient-to-tr from-slate-800 to-slate-950 hover:cursor-pointer border-white m-2 h-80 mr-0 justify-center items-center md:text-2xl font-bold">
        AVAILABILITY
    </a>
    <a href="{{ route('group.view') }}" class="col-span-3 bg-slate-900 text-white rounded-3xl flex border-2 hover:bg-gradient-to-tr from-slate-800 to-slate-950 hover:cursor-pointer border-white m-2 h-80 mr-0 justify-center items-center md:text-2xl font-bold">
        GROUPS
    </a>
</x-dashboard-layout>