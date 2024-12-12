<x-dashboard-layout :name="$name" :position="$position">
    <div class="rounded-lg m-5 flex flex-col w-auto h-80 text-white justify-between items-center md:text-5xl font-bold col-span-6">
        <div class="flex-grow flex justify-center flex-col">
            <h1>Announcement has been posted successfully!</h1>
        </div>
        <div onclick="location.href='announcements'" class="bg-fuchsia-900 w-80 text-white rounded-3xl flex border-2 hover:shadow-[inset_35px_35px_20px_#181824_,_inset_-35px_-35px_20px_#242434] hover:cursor-pointer border-white m-2 h-20 items-center text-center p-2.5 md:text-2xl font-bold">Go Back to Announcements Page</div>
    </div>
</x-dashboard-layout>