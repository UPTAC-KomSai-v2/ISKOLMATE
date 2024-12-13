@php use App\Models\AnnouncementCreator; @endphp
<x-dashboard-layout :name="$name" :position="$position" :back="'/dashboard'">
    <div
        class="overflow-hidden flex-col  bg-white text-black rounded-3xl flex border-2  border-white m-2 h-80 ml-0  md:text-2xl font-bold">
        <div class="text-left bg-[#8D1436] text-[white] p-[10pt]">Admin Announcements</div>
        @foreach($announcements as $announcement)
            <div class="border-2 p-2">{{$announcement->title}}}</div>
            @php
                $isCreator = AnnouncementCreator::where('annc_id', $announcement->id)->where('u_id', Auth::id())->exists();
            @endphp
            @if($isCreator)
                <form action="{{route('announcement.destroy', [$isCreator => $announcement->id]) }}" method="POST" onsubmit="return confirm('Are you sure you wish to delete this announcement?');">
                    @csrf @method('DELETE')
                    <button type="submit" class="px-4 py-2 rounded-md bg-[#1e1e2f] text-white shadow-[10px_10px_20px_#141418,-10px_-10px_20px_#282838]"> DELETE </button>
            @endif
        @endforeach
    </div>
    <div
        class="overflow-hidden flex-col  bg-white text-black rounded-3xl flex border-2  border-white m-2 h-80 ml-0  md:text-2xl font-bold">
        <div class="text-left bg-[#8D1436] text-[white] p-[10pt]">Student Announcements</div>
        @foreach($announcements as $announcement)
            <div class="border-2 p-2">{{$announcement->title}}}</div>

            @php
                $isCreator = AnnouncementCreator::where('annc_id', $announcement->id)->where('u_id', Auth::id())->exists();
            @endphp
        @endforeach
    </div>
    <div
        class="overflow-hidden flex-col  bg-white text-black rounded-3xl flex border-2  border-white m-2 h-80 ml-0  md:text-2xl font-bold">
        <div class="text-left bg-[#8D1436] text-[white] p-[10pt]">Course Specific Announcements</div>
        @foreach($announcements as $announcement)
            <div class="border-2 p-2">{{$announcement->title}}}</div>

            @php
                $isCreator = AnnouncementCreator::where('annc_id', $announcement->id)->where('u_id', Auth::id())->exists();
            @endphp
        @endforeach
    </div>
    <div
        class="flex">
        <a href="/announcements2" class="bg-[#8D1436] w-80 text-white rounded-3xl flex border-2 hover:shadow-lg m-2 h-16 justify-center items-center md:text-2xl font-bold">
            Create Announcement
        </a>
    </div>
</x-dashboard-layout>
