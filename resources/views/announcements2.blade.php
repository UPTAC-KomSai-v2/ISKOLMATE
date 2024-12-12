<x-dashboard-layout :name="$name" :position="$position">
    <div class="flex flex-col col-span-4 h-full">
        <textarea class="overflow-y-scroll resize-none border-2 black m-2 table-cell align-middle text-[#505050] md:text-2xl" cols="15" rows="3" name="" id="" placeholder="TITLE"></textarea>
        <textarea class="overflow-y-scroll resize-none m-2 text-[#505050]" cols="50" rows="15" placeholder="BODY"></textarea>
    </div>
    <div class="flex flex-col content-center">
        <a href='announcements3' class="bg-[#83173C] w-80 text-white rounded-3xl flex border-2 hover:bg-gradient-to-tr from-slate-800 to-slate-950 transition duration-500 hover:cursor-pointer
        hover:text-[#FEB71C] hover:border-[#FEB71C] hover:duration-500 border-white m-2 h-20 justify-center items-center md:text-2xl font-bold">Post</a>
        <a href='announcements' class="bg-[#83173C] w-80 text-white rounded-3xl flex border-2 hover:bg-gradient-to-tr from-slate-800 to-slate-950 transition duration-500 hover:cursor-pointer
        hover:text-[#FEB71C] hover:border-[#FEB71C] hover:duration-500 border-white m-2 h-20 justify-center items-center md:text-2xl font-bold">Cancel</a>
    </div>
</x-dashboard-layout>