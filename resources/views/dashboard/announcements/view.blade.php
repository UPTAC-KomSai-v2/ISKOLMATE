@php
use App\Models\AnnouncementCreator;
use App\Models\AnnouncementVisibility;
use App\Models\User;
use App\Models\Group;

$user_courses = Auth::user()->get_all_courses();
@endphp

<x-dashboard-layout :first_name="$first_name" :last_name="$last_name" :position="$position" :back="route('dashboard')">
    <div
        class="col-span-6 overflow-auto flex-col  bg-white text-black rounded-3xl flex border-2  border-white m-2 h-80 ml-0  md:text-2xl">
        <div class="text-left bg-[#8D1436] text-[white] p-[10pt]">All Announcements</div>

        @foreach($announcements as $announcement)
            @php
                $creator = User::find($announcement->get_owner_id());
                $visibility = AnnouncementVisibility::find($announcement->id);
                
                if ($visibility && !Auth::user()->in_course($visibility->g_id)) {
                    continue;
                }
            @endphp

            <div class="border-2 p-2 font-bold flex justify-between">
                <span>
                    @if ($visibility)
                    [{{ Group::find($visibility->g_id)->group_name }}] {{ $announcement->title }}
                    @else
                    {{ $announcement->title }}
                    @endif
                </span>
                <a href="{{ route('user.profile.other', $creator->id) }}">
                    {{ $creator->role }} : {{ $creator->first_name }} {{ $creator->last_name }} 
                </a>
            </div>
            <div class="border-2 p-3">{{ $announcement->text }}</div>
            @php
                $is_creator = AnnouncementCreator::find($announcement->id)->u_id == Auth::id();
            @endphp
            @if($is_creator)
                <form class="relative" action="{{ route('announcement.destroy', [$announcement->id]) }}" method="POST" onsubmit="return confirm('Are you sure you wish to delete this announcement?');">
                    @csrf @method('DELETE')
                    <button type="submit" class="absolute right-2.5 top-[-3.5rem] px-4 py-2 rounded-md bg-[#1e1e2f] text-white
                    hover:shadow-lg m-2 h-10 flex justify-center items-center font-bold hover:bg-gradient-to-tr from-slate-800 to-slate-950 transition duration-500 hover:text-hover hover:border-hover"> DELETE </button>
                </form>
            @endif
        @endforeach
    </div>
    <div
        class="flex">
        <a href="{{ route('announcements.create') }}" class="bg-[#8D1436] w-80 text-center p-10 text text-white rounded-3xl flex border-2 hover:shadow-lg m-2 h-16 justify-center items-center md:text-2xl font-bold
        hover:bg-gradient-to-tr from-slate-800 to-slate-950 transition duration-500 hover:text-hover hover:border-hover">
            Create Announcement
        </a>
    </div>
</x-dashboard-layout>
