@php use App\Models\AnnouncementCreator; @endphp
<x-dashboard-layout :name="$name" :position="$position" :back="'/dashboard'">
    <div
        class="overflow-hidden flex-col  bg-white text-black rounded-3xl flex border-2  border-white m-2 h-80 ml-0  md:text-2xl font-bold">
        <div class="text-left bg-[#8D1436] text-[white] p-[10pt]">Admin Announcements</div>
        </a>
        @foreach($announcements as $announcement)
            <div class="border-2 p-2">{{$announcement->title}}}</div>

            @php
                $isCreator = AnnouncementCreator::where('anc_id', $announcement->id)->where('u_id', Auth::id())->exists();
            @endphp
            @if
                <form action="{{route('$announcement.destroy', '$announcement->id') }}" method="POST" onsubmit="return confirm('Are you sure you wish to delete this announcement?');">
                @csrf@method('DELETE')
                    <button type="submit" class="px-4 py-2 rounded-md bg-[#1e1e2f] text-white shadow-[10px_10px_20px_#141418,-10px_-10px_20px_#282838]"> DELETE </button>
            @endif
        @endforeach
    </div>
    <div
        class="overflow-hidden flex-col  bg-white text-black rounded-3xl flex border-2  border-white m-2 h-80 ml-0  md:text-2xl font-bold">
        <div class="text-left bg-[#8D1436] text-[white] p-[10pt]">Student Announcements</div>
        </a>
        @foreach($announcements as $announcement)
            <div class="border-2 p-2">{{$announcement->title}}}</div>

            @php
                $isCreator = AnnouncementCreator::where('anc_id', $announcement->id)->where('u_id', Auth::id())->exists();
            @endphp
            @if
                <form action="{{route('$announcement.destroy', '$announcement->id') }}" method="POST" onsubmit="return confirm('Are you sure you wish to delete this announcement?');">
                    @csrf@method('DELETE')
                    <button type="submit" class="px-4 py-2 rounded-md bg-[#1e1e2f] text-white shadow-[10px_10px_20px_#141418,-10px_-10px_20px_#282838]"> DELETE </button>
            @endif
        @endforeach
    </div>
    <div
        class="overflow-hidden flex-col  bg-white text-black rounded-3xl flex border-2  border-white m-2 h-80 ml-0  md:text-2xl font-bold">
        <div class="text-left bg-[#8D1436] text-[white] p-[10pt]">Course Specific Announcements</div>
        </a>
        @foreach($announcements as $announcement)
            <div class="border-2 p-2">{{$announcement->title}}}</div>

            @php
                $isCreator = AnnouncementCreator::where('anc_id', $announcement->id)->where('u_id', Auth::id())->exists();
            @endphp
            @if
                <form action="{{route('$announcement.destroy', '$announcement->id') }}" method="POST" onsubmit="return confirm('Are you sure you wish to delete this announcement?');">
                    @csrf@method('DELETE')
                    <button type="submit" class="px-4 py-2 rounded-md bg-[#1e1e2f] text-white shadow-[10px_10px_20px_#141418,-10px_-10px_20px_#282838]"> DELETE </button>
            @endif
        @endforeach
    </div>
</x-dashboard-layout>
