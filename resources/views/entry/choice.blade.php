<x-entry-layout>
    <!-- Buttons -->
    <div class="flex justify-around gap-4">
        <a
            class="w-[45%] max-w-[300px] px-4 py-2 rounded-lg font-bold text-lg bg-slate-900 text-white border-2 border-white from-slate-800 to-slate-950 hover:bg-gradient-to-tr cursor-pointer hover:text-hover hover:border-hover hover:duration-500"
            href="{{ route('login') }}">
            Login
        </a>
        <a
            class="w-[45%] max-w-[300px] px-4 py-2 rounded-lg font-bold text-lg bg-slate-900 text-white border-2 border-white from-slate-800 to-slate-950 hover:bg-gradient-to-tr cursor-pointer hover:text-hover hover:border-hover hover:duration-500"
            href="{{ route('signup.choice') }}">
            Sign Up
        </a>
    </div>
</x-entry-layout>