<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ISKOLMATE</title>
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/script.js'])
        @endif
    </head>
    <body class="bg-[#1e1e2f] text-white font-sans min-h-screen flex items-center justify-center">
        <div
            class="mx-auto w-[90%] max-w-md p-10 bg-[#1e1e2f] rounded-[20px] shadow-[10px_10px_20px_#141418,-10px_-10px_20px_#282838] text-center relative">
            <!-- Back Button -->
            <div class="absolute top-3 left-3">
                <a href="{{ route('signup.choice') }}" title="Go Back"
                    class="block w-10 h-10 bg-[#1e1e2f] text-white text-center leading-[40px] text-2xl rounded-full shadow-[5px_5px_10px_#141418,-5px_-5px_10px_#282838] transition hover:shadow-[inset_5px_5px_10px_#141418,inset_-5px_-5px_10px_#282838]">
                    ◁
                </a>
            </div>

            <!-- Logo -->
            <div class="flex justify-center items-center mb-6">
                <img src="/asset('images/up.png')" alt="UP Logo"
                    class="w-32 rounded-full p-2.5" />
            </div>

            <!-- Title and Tagline -->
            <div class="text-2xl font-bold mb-2">Iskolmate</div>
            <div class="text-gray-400 mb-8">your partner in suffering</div>

            <!-- Form Container -->
            <div>
                <h2 class="text-xl font-semibold mb-6">Sign-up as a Student</h2>
                <form action="{{route('signup.student')}}" method="POST" class="space-y-4">
                    @csrf
                    
                    <!-- First Name -->
                    <input type="text" name="first_name" placeholder="First Name" required value="{{ old('name') }}"
                        class="w-full p-4 bg-[#1e1e2f] rounded-lg shadow-[inset_5px_5px_10px_#141418,inset_-5px_-5px_10px_#282838] text-white text-lg focus:outline-none focus:ring-2 focus:ring-green-500">

                    @if ($errors->has('first_name'))
                        <div class="text-red-500 text-sm">{{ $errors->first('first_name') }}</div>
                    @endif

                    <!-- Last Name -->
                    <input type="text" name="last_name" placeholder="Last Name" required value="{{ old('name') }}"
                        class="w-full p-4 bg-[#1e1e2f] rounded-lg shadow-[inset_5px_5px_10px_#141418,inset_-5px_-5px_10px_#282838] text-white text-lg focus:outline-none focus:ring-2 focus:ring-green-500">

                    @if ($errors->has('last_name'))
                        <div class="text-red-500 text-sm">{{ $errors->first('last_name') }}</div>
                    @endif

                    <!-- Student Number -->
                    <input type="text" name="student_id" placeholder="Student Number" required value="{{ old('student_number') }}"
                        class="w-full p-4 bg-[#1e1e2f] rounded-lg shadow-[inset_5px_5px_10px_#141418,inset_-5px_-5px_10px_#282838] text-white text-lg focus:outline-none focus:ring-2 focus:ring-green-500">

                    @if ($errors->has('student_id'))
                        <div class="text-red-500 text-sm">{{ $errors->first('student_id') }}</div>
                    @endif

                    <!-- Dropdown for Degree Program -->
                    <select name="affiliation" value="{{ old('affiliation') }}"
                        class="w-full p-4 bg-[#1e1e2f] rounded-md shadow-[inset_5px_5px_10px_#141418,inset_-5px_-5px_10px_#282838] focus:outline-none focus:ring-2 focus:ring-green-500"
                        required>
                        <option value="" disabled selected>Select your program</option>
                        <option value="BS Computer Science">BS Computer Science</option>
                        <option value="BS Biology">BS Biology</option>
                        <option value="BS Applied Mathematics">BS Applied Mathematics</option>
                        <option value="BS Accountancy">BS Accountancy</option>
                        <option value="BA Literature">BA Literature</option>
                        <option value="BA Political Science">BA Political Science</option>
                        <option value="BA Political Science">BA Multimedia Arts</option>
                        <option value="BA Political Science">BA Economics</option>
                        <option value="BA Political Science">BA Psychology</option>
                    </select>

                    @if ($errors->has('affiliation'))
                        <div class="text-red-500 text-sm">{{ $errors->first('affiliation') }}</div>
                    @endif

                    <!-- Password -->
                    <div>
                        <input type="password" name="password" placeholder="Password" required id="passwordEl"
                        class="w-full p-4 bg-[#1e1e2f] rounded-lg shadow-[inset_5px_5px_10px_#141418,inset_-5px_-5px_10px_#282838] text-white text-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                        <span class="cursor-pointer hover:text-orange-400 w-full" onclick="togglePassword()" id="togglePass">Show Password</span>
                    </div>

                    <script>
                        function togglePassword(){
                            var togglePassEl = document.getElementById("togglePass");
                            var passwordEl = document.getElementById("passwordEl");
                            if (passwordEl.type === "password") {
                                passwordEl.type = "text";
                                togglePassEl.innerHTML = "Hide Password";

                            } else {
                                passwordEl.type = "password";
                                togglePassEl.innerHTML = "Show Password";
                            }
                        }
                    </script>

                    @if ($errors->has('password'))
                        <div class="text-red-500 text-sm">{{ $errors->first('password') }}</div>
                    @endif

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full p-4 text-lg font-bold bg-[#1e1e2f] text-white rounded-lg shadow-[5px_5px_10px_#141418,-5px_-5px_10px_#282838] hover:bg-[#252538] hover:shadow-[inset_5px_5px_10px_#141418,inset_-5px_-5px_10px_#282838] transition">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </body>
</html>