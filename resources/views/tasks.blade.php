<x-dashboard-layout :name="$name" :position="$position" :back="'/dashboard'">
    <div class="overflow-hidden flex-col  bg-white text-black rounded-3xl flex border-2 hover:cursor-pointer border-white m-2 h-80 ml-0  md:text-2xl font-bold">
        <a href="input_tasks"><div class="text-left bg-[blue] text-[white] p-[10pt]">Input Tasks</div></a>
        <div class="border-2 p-2">Task 1</div>
        <div class="border-2 p-2">Task 2</div>
        <div class="border-2 p-2">Task 3</div>
        <div class="border-2 p-2">Task 4</div>
    </div>
    <div class="overflow-hidden flex-col bg-white text-black rounded-3xl flex border-2 hover:cursor-pointer border-white m-3 h-80 ml-0 md:text-2xl font-bold">
        <a href="show_tasks"> <div class= "text-left bg-[blue] text-[white] p-[10pt]">Show Tasks</div></a>
        <div class="border-2 p-2">Task 1</div>
        <div class="border-2 p-2">Task 2</div>
        <div class="border-2 p-2">Task 3</div>
        <div class="border-2 p-2">Task 4</div>
    </div>
</x-dashboard-layout>