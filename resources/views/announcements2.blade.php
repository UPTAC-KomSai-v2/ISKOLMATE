<x-dashboard-no-time-layout :back="route('announcements.view')">
    <form action="{{ route('announcements.store') }}" method="POST">
        @csrf
        <div class="flex flex-col col-span-6 h-full">
            <textarea class="col-span-6 overflow-auto resize-none border-2 border-black m-2 p-2 rounded-lg w-full h-12 text-black placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-fuchsia-900"
                name="title"
                id="title"
                placeholder="Enter the title"></textarea>
            <textarea class="overflow-auto resize-none border-2 border-black m-2 p-2 rounded-lg w-full h-40 text-black placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-fuchsia-900"
                name="content"
                id="content"
                placeholder="Enter the content"></textarea>

            <button type="submit" class="bg-fuchsia-900 w-80 text-white rounded-3xl flex border-2 hover:shadow-[inset_35px_35px_20px_#181824_,_inset_-35px_-35px_20px_#242434] hover:cursor-pointer border-white m-2 h-20 justify-center items-center md:text-2xl font-bold">
                Post
            </button>
            <a href="{{ route('announcements.view') }}" class="bg-fuchsia-900 w-80 text-white rounded-3xl flex border-2 hover:shadow-[inset_35px_35px_20px_#181824_,_inset_-35px_-35px_20px_#242434] hover:cursor-pointer border-white m-2 h-20 justify-center items-center md:text-2xl font-bold">Cancel</a>
        </div>
        
    </form>
</x-dashboard-layout>
