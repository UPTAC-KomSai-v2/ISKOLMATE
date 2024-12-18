<x-dashboard-no-time-layout :back="route('tasks.list')">
    <!-- Header Section -->
    <div class="relative flex items-center bg-slate-900 text-white md:text-2xl p-10 m-2 border-2 border-white rounded-2xl w-auto h-1/2 ml-40"> <!-- Added "ml-40" -->
        <div class="lg:text-8xl">Tasks</div>
    </div>

    <!-- Main Section -->
    <div class="flex items-start">
        <!-- Tasks Column -->
        <div class="overflow-auto flex-col bg-white text-black rounded-3xl flex border-2 cursor-pointer border-white m-2 h-80 ml-0 md:text-2xl font-bold w-full">
            <div class="border-2 p-2">{{ $task->description }}</div>
        </div>
    </div>
</x-dashboard-no-time-layout>
