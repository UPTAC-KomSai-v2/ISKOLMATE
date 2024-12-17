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
    <body class="bg-[#1e1e2f] text-white font-sans min-h-screen flex items-center justify-center">
        <div
            class="container mx-auto w-[90%] max-w-md p-8 bg-[#1e1e2f] rounded-2xl shadow-[15px_15px_30px_#141418,-15px_-15px_30px_#282838]">
            <div class="back-button mb-6">
                <a href="{{ route('start2') }}" title="Go Back"
                    class="block w-10 h-10 bg-[#1e1e2f] rounded-full text-center text-2xl leading-10 text-white shadow-[5px_5px_10px_#141418,-5px_-5px_10px_#282838] hover:shadow-[inset_5px_5px_10px_#141418,inset_-5px_-5px_10px_#282838] transition">
                    ◁
                </a>
            </div>

            <div class="logo flex justify-center items-center mb-6">
                <img src="up.png" alt="UP Logo"
                    class="w-[100px] rounded-full p-2.5 bg-[#1e1e2f] shadow-[inset_10px_10px_20px_#181824,inset_-10px_-10px_20px_#242434]" />
            </div>
            <div class="title text-3xl font-bold mb-2 text-center">Iskolmate</div>
            <div class="tagline text-gray-400 text-center mb-6">your partner in suffering</div>

            <!-- Role Selection -->
            <div class="role-selection text-center mb-8">
                <h2 class="text-xl font-semibold mb-4">Which one are you logging in to?</h2>
                <button
                    class="px-4 py-2 rounded-md bg-[#1e1e2f] text-white shadow-[10px_10px_20px_#141418,-10px_-10px_20px_#282838] hover:shadow-[inset_10px_10px_20px_#141418,inset_-10px_-10px_20px_#282838] transition hover:duration-300 hover:text-[#FEB71C]"
                    onclick="toggleForm('student')">I am a Student</button>
                <button
                    class="px-4 py-2 rounded-md bg-[#1e1e2f] text-white shadow-[10px_10px_20px_#141418,-10px_-10px_20px_#282838] hover:shadow-[inset_10px_10px_20px_#141418,inset_-10px_-10px_20px_#282838] transition ml-4 hover:duration-300 hover:text-[#FEB71C]"
                    onclick="toggleForm('teacher')">I am a Teacher</button>
            </div>

            @if ($errors->any()) 
                @foreach ($errors->all() as $error) 
                    <div class="text-red-500 text-sm mb-2">{{ $error }}</div>
                @endforeach
            @endif

            <!-- Student Form -->
            <div id="student-form" class="form-container hidden">
                <h2 class="text-xl font-semibold mb-4 text-center">Login as a Student</h2>
                <form action="{{route('login')}}" method="POST" class="space-y-4">
                    @csrf
                    <input type="hidden" name="role" value="Student">
                    <input type="text" name="uid" placeholder="Student Number" required
                        class="w-full p-3 bg-[#1e1e2f] rounded-md shadow-[inset_5px_5px_10px_#141418,inset_-5px_-5px_10px_#282838] focus:outline-none focus:ring-2 focus:ring-green-500">

                    <input type="password" name="password" placeholder="Password" required
                        class="w-full p-3 bg-[#1e1e2f] rounded-md shadow-[inset_5px_5px_10px_#141418,inset_-5px_-5px_10px_#282838] focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button type="submit"
                        class="w-full p-4 text-lg font-bold bg-[#1e1e2f] text-white rounded-lg shadow-[5px_5px_10px_#141418,-5px_-5px_10px_#282838] hover:bg-[#252538] hover:shadow-[inset_5px_5px_10px_#141418,inset_-5px_-5px_10px_#282838] transition hover:duration-300 hover:text-[#FEB71C]">
                        Submit
                    </button>
                </form>
            </div>

            <!-- Teacher Form -->
            <div id="teacher-form" class="form-container hidden">
                <h2 class="text-xl font-semibold mb-4 text-center">Login as a Teacher</h2>
                <form action="{{route('login')}}" method="POST" class="space-y-4">
                    @csrf
                    <input type="hidden" name="role" value="Teacher">
                    <input type="text" name="uid" placeholder="Instructor ID" required
                        class="w-full p-3 bg-[#1e1e2f] rounded-md shadow-[inset_5px_5px_10px_#141418,inset_-5px_-5px_10px_#282838] focus:outline-none focus:ring-2 focus:ring-green-500">

                    <input type="password" name="password" placeholder="Password" required
                        class="w-full p-3 bg-[#1e1e2f] rounded-md shadow-[inset_5px_5px_10px_#141418,inset_-5px_-5px_10px_#282838] focus:outline-none focus:ring-2 focus:ring-green-500">
                    <button type="submit"
                        class="w-full p-4 text-lg font-bold bg-[#1e1e2f] text-white rounded-lg shadow-[5px_5px_10px_#141418,-5px_-5px_10px_#282838] hover:bg-[#252538] hover:shadow-[inset_5px_5px_10px_#141418,inset_-5px_-5px_10px_#282838] transition">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </body>
</html>