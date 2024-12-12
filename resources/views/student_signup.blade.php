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
            class="container mx-auto w-[90%] max-w-md p-10 bg-[#1e1e2f] rounded-[20px] shadow-[10px_10px_20px_#141418,-10px_-10px_20px_#282838] text-center relative">
            <!-- Back Button -->
            <div class="absolute top-3 left-3">
                <a href="javascript:history.back();" title="Go Back"
                    class="block w-10 h-10 bg-[#1e1e2f] text-white text-center leading-[40px] text-2xl rounded-full shadow-[5px_5px_10px_#141418,-5px_-5px_10px_#282838] transition hover:shadow-[inset_5px_5px_10px_#141418,inset_-5px_-5px_10px_#282838]">
                    ◁
                </a>
            </div>

            <!-- Logo -->
            <div class="logo flex justify-center items-center mb-6">
                <img src="up.png" alt="UP Logo"
                    class="w-[100px] rounded-full p-2.5 bg-[#1e1e2f] shadow-[inset_10px_10px_20px_#181824,inset_-10px_-10px_20px_#242434]" />
            </div>

            <!-- Title and Tagline -->
            <div class="title text-2xl font-bold mb-2">Iskolmate</div>
            <div class="tagline text-gray-400 mb-8">your partner in suffering</div>

            <!-- Form Container -->
            <div class="form-container">
                <h2 class="text-xl font-semibold mb-6">Sign-up as a Student</h2>
                <form action="{{route('student_signup')}}" method="POST" class="space-y-4">
                    @csrf
                    
                    <!-- Name -->
                    <input type="text" name="name" placeholder="Name" required
                        class="w-full p-4 bg-[#1e1e2f] rounded-lg shadow-[inset_5px_5px_10px_#141418,inset_-5px_-5px_10px_#282838] text-white text-lg focus:outline-none focus:ring-2 focus:ring-green-500">

                    @if ($errors->has('name'))
                        <div class="text-red-500 text-sm">{{ $errors->first('name') }}</div>
                    @endif

                    <!-- Student Number -->
                    <input type="text" name="student_number" placeholder="Student Number" required
                        class="w-full p-4 bg-[#1e1e2f] rounded-lg shadow-[inset_5px_5px_10px_#141418,inset_-5px_-5px_10px_#282838] text-white text-lg focus:outline-none focus:ring-2 focus:ring-green-500">

                    @if ($errors->has('uid'))
                        <div class="text-red-500 text-sm">{{ $errors->first('uid') }}</div>
                    @endif

                    <!-- Dropdown for Degree Program -->
                    <select name="program"
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

                    @if ($errors->has('program'))
                        <div class="text-red-500 text-sm">{{ $errors->first('program') }}</div>
                    @endif

                    <!-- Password -->
                    <input type="password" name="password" placeholder="Password" required
                        class="w-full p-4 bg-[#1e1e2f] rounded-lg shadow-[inset_5px_5px_10px_#141418,inset_-5px_-5px_10px_#282838] text-white text-lg focus:outline-none focus:ring-2 focus:ring-green-500">

                    @if ($errors->has('password'))
                        <div class="text-red-500 text-sm">{{ $errors->first('password') }}</div>
                    @endif

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full p-4 text-lg font-bold bg-[#1e1e2f] text-white rounded-lg shadow-[5px_5px_10px_#141418,-5px_-5px_10px_#282838] hover:bg-[#252538] hover:shadow-[inset_5px_5px_10px_#141418,inset_-5px_-5px_10px_#282838] transition">
                        Submit
                    </button>
            <!-- Old signup code -->
            <!-- <div class="text-center">
                <h2 class="text-2xl mb-[20px] font-bold">Sign-up as a Student</h2>
                <form action="{{ route('start2') }}" method="POST" class="w-full"> 
                    @csrf
                    <input class="w-11/12 p-2.5 my-2.5 text-base rounded-lg bg-slate-900 shadow-[inset_10px_10px_20px_#181824,_inset_-10px_-10px_20px_#242434] border-2 border-white" type="text" name="name" placeholder="Name" required>
                    @if ($errors->has('name'))
                        <div class="text-red-500 text-sm">{{ $errors->first('name') }}</div>
                    @endif
                    <input class="w-11/12 p-2.5 my-2.5 text-base rounded-lg bg-slate-900 shadow-[inset_10px_10px_20px_#181824,_inset_-10px_-10px_20px_#242434] border-2 border-white" type="text" name="uid" placeholder="Student Number" required>
                    @if ($errors->has('uid'))
                        <div class="text-red-500 text-sm">{{ $errors->first('uid') }}</div>
                    @endif
                    <input class="w-11/12 p-2.5 my-2.5 text-base rounded-lg bg-slate-900 shadow-[inset_10px_10px_20px_#181824,_inset_-10px_-10px_20px_#242434] border-2 border-white" type="text" name="program" placeholder="Program" required>
                    @if ($errors->has('program'))
                        <div class="text-red-500 text-sm">{{ $errors->first('program') }}</div>
                    @endif
                    <input class="w-11/12 p-2.5 my-2.5 text-base rounded-lg bg-slate-900 shadow-[inset_10px_10px_20px_#181824,_inset_-10px_-10px_20px_#242434] border-2 border-white" type="password" name="password" placeholder="Password" required>
                    @if ($errors->has('password'))
                        <div class="text-red-500 text-sm">{{ $errors->first('password') }}</div>
                    @endif
                    <button type="submit" class="w-full p-2.5 mt-[10px] rounded-xl shadow-[10px_10px_20px_#181824_,_-10px_-10px_20px_#242434] hover:bg-gradient-to-tr from-slate-900 to-slate-950">Submit</button>   
                </form> -->
            </div>
        </div>
    </body>
</html>