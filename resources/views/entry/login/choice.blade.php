<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ISKOLMATE</title>
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/script.js'])
        @endif

        <script>
            function toggleForm(role) {
                document.getElementById('student-form').style.display = 'none';
                document.getElementById('teacher-form').style.display = 'none';
            
                if (role === 'student') {
                    document.getElementById('student-form').style.display = 'block';
                } else if (role === 'teacher') {
                    document.getElementById('teacher-form').style.display = 'block';
                }
            }
        </script>
    </head>
    <body class="bg-slate-900 font-['Poppins'_,_sans-serif] text-white flex items-center justify-center min-h-screen m-0">
        <div class="text-center w-[90%] max-w-[400px] p-8 bg-slate-900 text-white md:text-2xl border-2 border-white rounded-2xl shadow-[5px_5px_30px_#181824_,-15px_-15px_30px_#242434] relative">
            <!-- Back Button -->
            <div class="absolute top-5 left-5">
                <a href="{{ route('choice') }}" class="w-10 h-10 flex justify-center items-center text-white text-lg font-bold border-2 border-white rounded-full from-slate-800 to-slate-950 hover:bg-gradient-to-tr cursor-pointer hover:text-hover hover:border-hover hover:duration-500">
                    <span>◁</span>
                </a>
            </div>

            <!-- Logo -->
            <div class="flex justify-center items-center mb-6">
                <img src="asset('images/up.png')" alt="UP Logo" class="w-32 rounded-full p-2.5" />
            </div>

            <!-- Title and Tagline -->
            <div class="text-2xl font-bold text-white mb-2">Iskolmate</div>
            <div class="text-sm text-gray-400 mb-8">your partner in suffering</div>

            <!-- Question -->
            <div class="text-lg text-gray-300 mb-6">Which one are you logging in to?</div>

            <!-- Role Selection -->
            <div class="flex gap-4 justify-center">
                <button
                    class="w-[45%] max-w-[300px] px-4 py-2 rounded-lg font-bold text-lg bg-slate-900 text-white border-2 border-white from-slate-800 to-slate-950 hover:bg-gradient-to-tr cursor-pointer hover:text-hover hover:border-hover hover:duration-500"
                    onclick="toggleForm('teacher')"
                >
                    Teacher
                </button>
                <button
                    class="w-[45%] max-w-[300px] px-4 py-2 rounded-lg font-bold text-lg bg-slate-900 text-white border-2 border-white from-slate-800 to-slate-950 hover:bg-gradient-to-tr cursor-pointer hover:text-hover hover:border-hover hover:duration-500"
                    onclick="toggleForm('student')"
                >
                    Student
                </button>
            </div>

            @if ($errors->any()) 
                @foreach ($errors->all() as $error) 
                    <div class="text-red-500 text-sm mb-2">{{ $error }}</div>
                @endforeach
            @endif

            <!-- Student Form -->
            <div id="student-form" class="hidden">
                <form action="{{route('login')}}" method="POST" class="space-y-4">
                    @csrf
                    <input type="hidden" name="role" value="Student">
                    <input type="text" name="uid" placeholder="Student Number" required
                        class="w-full p-3 bg-[#1e1e2f] rounded-md shadow-[inset_5px_5px_10px_#141418,inset_-5px_-5px_10px_#282838] focus:outline-none focus:ring-2 focus:ring-green-500">

                    <input type="password" name="password" placeholder="Password" required
                        class="w-full p-3 bg-[#1e1e2f] rounded-md shadow-[inset_5px_5px_10px_#141418,inset_-5px_-5px_10px_#282838] focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button type="submit"
                        class="w-[45%] max-w-[300px] px-4 py-2 rounded-lg font-bold text-lg bg-slate-900 text-white border-2 border-white from-slate-800 to-slate-950 hover:bg-gradient-to-tr cursor-pointer hover:text-hover hover:border-hover hover:duration-500">
                        Submit
                    </button>
                </form>
            </div>

            <!-- Teacher Form -->
            <div id="teacher-form" class="hidden">
                <form action="{{route('login')}}" method="POST" class="space-y-4">
                    @csrf
                    <input type="hidden" name="role" value="Teacher">
                    <input type="text" name="uid" placeholder="Instructor ID" required
                        class="w-full p-3 bg-[#1e1e2f] rounded-md shadow-[inset_5px_5px_10px_#141418,inset_-5px_-5px_10px_#282838] focus:outline-none focus:ring-2 focus:ring-green-500">

                    <input type="password" name="password" placeholder="Password" required
                        class="w-full p-3 bg-[#1e1e2f] rounded-md shadow-[inset_5px_5px_10px_#141418,inset_-5px_-5px_10px_#282838] focus:outline-none focus:ring-2 focus:ring-green-500">
                    <button type="submit"
                        class="w-[45%] max-w-[300px] px-4 py-2 rounded-lg font-bold text-lg bg-slate-900 text-white border-2 border-white from-slate-800 to-slate-950 hover:bg-gradient-to-tr cursor-pointer hover:text-hover hover:border-hover hover:duration-500">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </body>
</html>