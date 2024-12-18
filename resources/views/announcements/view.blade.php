@php use App\Models\AnnouncementCreator; @endphp
@php use App\Models\User; @endphp
<x-dashboard-layout :first_name="$first_name" :last_name="$last_name" :position="$position" :back="route('dashboard')">
    <div
        class="col-span-6 overflow-auto flex-col  bg-white text-black rounded-3xl flex border-2  border-white m-2 h-80 ml-0  md:text-2xl">
        <div class="text-left bg-[#8D1436] text-[white] p-[10pt]">All Announcements</div>

        @foreach($announcements as $announcement)
            <div class="border-2 p-2 font-bold flex justify-between">
                <span>
                    {{$announcement->title}}
                </span>
                @php
                    $creator = User::find($announcement->get_owner_id());
                @endphp
                <span>
                    {{ $creator->role }} : {{ $creator->first_name }} {{ $creator->last_name }} 
                </span>
            </div>
            <div class="border-2 p-3">{{$announcement->text}}</div>
            @php
                $isCreator = AnnouncementCreator::where('annc_id', $announcement->id)->where('u_id', Auth::id())->exists();
            @endphp
            @if($isCreator)
                <form class="relative" action="{{route('announcement.destroy', [$announcement->id]) }}" method="POST" onsubmit="return confirm('Are you sure you wish to delete this announcement?');">
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
