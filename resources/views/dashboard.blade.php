<x-dashboard-layout :first_name="$first_name" :last_name="$last_name" :position="$position">
    <a href="{{ route('announcements.view') }}" class="relative col-span-3 bg-slate-900 text-white rounded-3xl flex border-2 hover:bg-gradient-to-tr from-slate-800 to-slate-950 hover:cursor-pointer hover:text-[#FEB71C] hover:border-[#FEB71C] hover:duration-500 border-white h-80 justify-center items-center md:text-2xl font-bold">
        <div class="absolute bg-red-400 w-10 h-10 rounded-full right-[-10px] top-[-10px]" id="checkAnnouncements" hidden></div>
        ANNOUNCEMENTS
    </a>
    <a href="{{ route('tasks.list') }}" class="col-span-3 bg-slate-900 text-white rounded-3xl flex border-2 hover:bg-gradient-to-tr from-slate-800 to-slate-950 hover:cursor-pointer hover:text-[#FEB71C] hover:border-[#FEB71C] hover:duration-500 border-white h-80 justify-center items-center md:text-2xl font-bold">
        TASKS
    </a>
    <a href="{{ route('availability') }}" class="col-span-3 bg-slate-900 text-white rounded-3xl flex border-2 hover:bg-gradient-to-tr from-slate-800 to-slate-950 hover:cursor-pointer hover:text-[#FEB71C] hover:border-[#FEB71C] hover:duration-500 border-white h-80 justify-center items-center md:text-2xl font-bold">
        AVAILABILITY
    </a>
    <a href="{{ route('group.view') }}" class="col-span-3 bg-slate-900 text-white rounded-3xl flex border-2 hover:bg-gradient-to-tr from-slate-800 to-slate-950 hover:cursor-pointer hover:text-[#FEB71C] hover:border-[#FEB71C] hover:duration-500 border-whitex h-80 justify-center items-center md:text-2xl font-bold">
        GROUPS
    </a>
</x-dashboard-layout>