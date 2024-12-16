<x-dashboard-no-time-layout :back="route('tasks.list')">
    <div class="absolute bg-red-400 w-10 h-10 right-[-10px] top-[-10px]" hidden></div>
    <div class="relative flex items-center bg-slate-900 text-white md:text-5xl w-auto h-1/2">
        <div class="lg:text-2xl font-bold">INPUT TASKS</div>
        <div class="absolute bg-red-400 w-10 h-10 right-[-10px] top-[-10px]" id="checkAnnouncements" hidden></div>
    </div>
    <!-- Success Message Box -->
    <div id="successMessage" class="rounded-lg m-5 p-5 border-2 border-white bg-white w-full max-w-[500px] mx-auto flex justify-center items-center">
        <h1 class="text-center text-[#181824] font-bold md:text-4xl">The task has been successfully created!</h1>
    </div>
</x-dashboard-no-time-layout>
