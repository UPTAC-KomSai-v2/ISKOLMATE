<x-entry-layout :back="route('choice')">
    <!-- Question -->
    <div class="text-lg text-gray-300 mb-6">Which one are you logging in to?</div>

    <!-- Role Selection -->
    <div class="flex gap-4 justify-center">
        <a href="{{ route('login.teacher') }}" class="w-[45%] max-w-[300px] px-4 py-2 rounded-lg font-bold text-lg bg-slate-900 text-white border-2 border-white from-slate-800 to-slate-950 hover:bg-gradient-to-tr cursor-pointer hover:text-hover hover:border-hover hover:duration-500">
            Teacher
        </a>
        <a href="{{ route('login.student') }}" class="w-[45%] max-w-[300px] px-4 py-2 rounded-lg font-bold text-lg bg-slate-900 text-white border-2 border-white from-slate-800 to-slate-950 hover:bg-gradient-to-tr cursor-pointer hover:text-hover hover:border-hover hover:duration-500">
            Student
        </a>
    </div>
</x-entry-layout>