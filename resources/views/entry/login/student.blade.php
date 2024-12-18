<x-entry-layout :back="route('login')">
    <!-- Form Container -->
    <div>
        <h2 class="text-xl font-semibold">Login as a Student</h2>
        <form action="{{ route('login.student') }}" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="role" value="Student">

            <input type="text" name="uid" placeholder="Student Number" required value="{{ old('uid') }}"
                class="w-full p-2 rounded-md border border-solid border-[#ccc] text-[#505050] focus:outline-none focus:ring-2 focus:ring-green-500">

            @if ($errors->has('uid'))
                <div class="text-red-500 text-sm">{{ $errors->first('uid') }}</div>
            @endif

            <!-- Password -->
            <div class="relative w-full">
                <input type="password" name="password" placeholder="Password" required id="passInput"
                    class="w-full p-2 pr-12 rounded-md border border-solid border-[#ccc] text-[#505050] focus:outline-none focus:ring-2 focus:ring-green-500">
                <span class="absolute h-full flex items-center top-0 right-3 text-black cursor-pointer" id="togglePass">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 opacity-50" id="passHide">
                        <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                        <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z" clip-rule="evenodd" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 opacity-50" id="passShow" style="display: none;">
                        <path d="M3.53 2.47a.75.75 0 0 0-1.06 1.06l18 18a.75.75 0 1 0 1.06-1.06l-18-18ZM22.676 12.553a11.249 11.249 0 0 1-2.631 4.31l-3.099-3.099a5.25 5.25 0 0 0-6.71-6.71L7.759 4.577a11.217 11.217 0 0 1 4.242-.827c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113Z" />
                        <path d="M15.75 12c0 .18-.013.357-.037.53l-4.244-4.243A3.75 3.75 0 0 1 15.75 12ZM12.53 15.713l-4.243-4.244a3.75 3.75 0 0 0 4.244 4.243Z" />
                        <path d="M6.75 12c0-.619.107-1.213.304-1.764l-3.1-3.1a11.25 11.25 0 0 0-2.63 4.31c-.12.362-.12.752 0 1.114 1.489 4.467 5.704 7.69 10.675 7.69 1.5 0 2.933-.294 4.242-.827l-2.477-2.477A5.25 5.25 0 0 1 6.75 12Z" />
                    </svg>
                </span>
            </div>

            @if ($errors->has('password'))
                <div class="text-red-500 text-sm">{{ $errors->first('password') }}</div>
            @endif

            <button type="submit"
                class="w-[45%] max-w-[300px] px-4 py-2 rounded-lg font-bold text-lg bg-slate-900 text-white border-2 border-white from-slate-800 to-slate-950 hover:bg-gradient-to-tr cursor-pointer hover:text-hover hover:border-hover hover:duration-500">
                Login
            </button>
        </form>
    </div>
</x-entry-layout>