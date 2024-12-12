<x-dashboard-layout :name="$name" :position="$position">
    <form action="{{ route('announcement.store') }}" method="POST">
        @crsf
        <div class="flex flex-col col-span-2 h-full">
            <textarea class="overflow-y-scroll resize-none border-2 black m-2 table-cell align-middle" cols="15" rows="3" name="" id="" placeholder="TITLE"></textarea>
            <textarea class="overflow-y-scroll resize-none m-2" cols="50" rows="15"></textarea>
        </div>
        <div class="flex flex-col content-center">
            <a href='announcements3' class="bg-fuchsia-900 w-80 text-white rounded-3xl flex border-2 hover:shadow-[inset_35px_35px_20px_#181824_,_inset_-35px_-35px_20px_#242434] hover:cursor-pointer border-white m-2 h-20 justify-center items-center md:text-2xl font-bold">Post</a>
            <a href='announcements' class="bg-fuchsia-900 w-80 text-white rounded-3xl flex border-2 hover:shadow-[inset_35px_35px_20px_#181824_,_inset_-35px_-35px_20px_#242434] hover:cursor-pointer border-white m-2 h-20 justify-center items-center md:text-2xl font-bold">Cancel</a>
        </div>
    </form>
</x-dashboard-layout>
