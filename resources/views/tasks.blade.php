<x-dashboard-layout :name="$name" :position="$position" :back="'/dashboard'">
    <div class="col-span-6 overflow-auto flex-col bg-white text-black rounded-3xl flex border-2 hover:cursor-pointer border-white m-2 h-80 ml-0  md:text-2xl font-bold hover:duration-500 hover:border-[#FEB71C]">
        <a href="show_tasks" class="border-2 p-2">Task 1</a>
        <a href="show_tasks" class="border-2 p-2">Task 2</a>
        <a href="show_tasks" class="border-2 p-2">Task 3</a>
        <a href="show_tasks" class="border-2 p-2">Task 4</a>
    </div>
    <a href="input_tasks"><div class="rounded-lg text-center bg-[#8D1436] text-[white] p-[10pt] hover:text-[#FEB71C] hover:duration-500 hover:bg-gradient-to-tr from-slate-800 to-slate-950">Input Tasks</div></a>
    <!-- <div class="col-span-3 overflow-hidden flex-col bg-white text-black rounded-3xl flex border-2 hover:cursor-pointer border-white m-3 h-80 ml-0 md:text-2xl font-bold hover:duration-500 hover:border-[#FEB71C]">
        <a href="show_tasks"> <div class= "text-left bg-[#8D1436] text-[white] p-[10pt] hover:text-[#FEB71C] hover:duration-500 hover:bg-gradient-to-tr from-slate-800 to-slate-950">Show Tasks</div></a>
        <div class="border-2 p-2 hover:bg-[#d8879e] hover:duration-500">Task 1</div>
        <div class="border-2 p-2 hover:duration-500">Task 2</div>
        <div class="border-2 p-2 hover:duration-500">Task 3</div>
        <div class="border-2 p-2 hover:duration-500">Task 4</div>
    </div> -->
</x-dashboard-layout>