<x-dashboard-layout :name="$name" :position="$position" :back="'/dashboard'">
    <div class="overflow-hidden flex-col  bg-white text-black rounded-3xl flex border-2  border-white m-2 h-80 ml-0  md:text-2xl font-bold">
        <div class="text-left bg-[#8D1436] text-[white] p-[10pt]">Admin Announcements</div></a>
        @foreach($announcements as $announcement)
            <div class="border-2 p-2">{{$announcement->title}}}</div>
        @endforeach
    </div>
    <div class="overflow-hidden flex-col  bg-white text-black rounded-3xl flex border-2  border-white m-2 h-80 ml-0  md:text-2xl font-bold">
        <div class="text-left bg-[#8D1436] text-[white] p-[10pt]">Student Announcements</div></a>
        @foreach($announcements as $announcement)
            <div class="border-2 p-2">{{$announcement->title}}}</div>
        @endforeach
    </div>
    <div class="overflow-hidden flex-col  bg-white text-black rounded-3xl flex border-2  border-white m-2 h-80 ml-0  md:text-2xl font-bold">
        <div class="text-left bg-[#8D1436] text-[white] p-[10pt]">Course Specific Announcements</div></a>
        @foreach($announcements as $announcement)
            <div class="border-2 p-2">{{$announcement->title}}}</div>
        @endforeach
    </div>
</x-dashboard-layout>
