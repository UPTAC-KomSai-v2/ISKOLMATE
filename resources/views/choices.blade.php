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
            class="container mx-auto w-[90%] max-w-md p-6 bg-[#1e1e2f] rounded-[20px] shadow-[15px_15px_30px_#181824,-15px_-15px_30px_#242434] relative text-center">
            <!-- Back Button -->
            <div class="absolute top-5 left-5">
                <a href="{{ route('start2') }}"
                    class="w-12 h-12 bg-[#1e1e2f] rounded-full shadow-[8px_8px_15px_#141418,-8px_-8px_15px_#282838] flex justify-center items-center text-white text-lg font-bold transition hover:shadow-[inset_8px_8px_15px_#141418,inset_-8px_-8px_15px_#282838]">
                    ◁
                </a>
            </div>

            <!-- Title -->
            <div class="title text-2xl font-bold text-white mb-4">Iskolmate</div>

            <!-- Tagline -->
            <div class="tagline text-gray-400 mb-6">your partner in suffering</div>

            <!-- Question -->
            <div class="question text-lg text-gray-300 mb-6">Which one are you signing up for?</div>

            <!-- Buttons -->
            <div class="button-container flex gap-4 justify-center">
                <button onclick="location.href='teacher_signup'"
                    class="btn w-[45%] max-w-[300px] px-6 py-3 bg-[#1e1e2f] text-white font-bold rounded-[10px] border-2 border-white shadow-[10px_10px_20px_#181824,-10px_-10px_20px_#242434] transition hover:bg-gradient-to-br hover:from-[#2c2c3f] hover:to-[#1b1b2d] hover:shadow-[inset_10px_10px_20px_#181824,inset_-10px_-10px_20px_#242434]">
                    Teacher
                </button>
                <button onclick="location.href='student_signup'"
                    class="btn w-[45%] max-w-[300px] px-6 py-3 bg-[#1e1e2f] text-white font-bold rounded-[10px] border-2 border-white shadow-[10px_10px_20px_#181824,-10px_-10px_20px_#242434] transition hover:bg-gradient-to-br hover:from-[#2c2c3f] hover:to-[#1b1b2d] hover:shadow-[inset_10px_10px_20px_#181824,inset_-10px_-10px_20px_#242434]">
                    Student
                </button>
            </div>
        </div>
    </body>
</html>