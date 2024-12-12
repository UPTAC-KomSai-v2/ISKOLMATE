<!-- login student -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Sign-Up</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/script.js'])
    @endif
</head>

<body class="m-0 p-0 bg-slate-900 text-white flex justify-center items-center h-dvh font-['Poppins'_,_sans-serif]">
    <div class="relative bg-slate-900 w-full max-w-lg text-center p-7 rounded-2xl shadow-[15px_15px_30px_#181824_,-15px_-15px_30px_#242434]">
        <!-- Back -->
        <div class="absolute top-5 left-5">
            <a href="/start2" title="Go Back" class="text-2xl bg-slate-900 p-2.5 rounded-full shadow-[10px_10px_20px_#181824_,_-10px_-10px_20px_#242434] hover:shadow-[inset_10px_10px_20px_#181824_,_inset_-10px_-10px_20px_#242434] hover:bg-gradient-to-tr from-slate-800 to-slate-900">&#9664;</a>
        </div>

        <div>
            <img src="up.png" alt="UP Logo" class="inline-block mb-2.5 p-2.5 rounded-full w-24 shadow-[inset_10px_10px_20px_#181824_,_inset_-10px_-10px_20px_#242434]">
        </div>
        <div class="text-3xl my-2.5 drop-shadow-[1px_1px_5px_rgba(0,0,0,0.4)]">Iskolmate</div>
        <div class="text-base mb-5 text-neutral-300">your partner in suffering</div>


        <div class="text-center">
            <h2 class="text-2xl mb-[20px] font-bold">Sign-up as a Student</h2>
            <form action="{{ route('start2') }}" method="POST" class="w-full"> 
                @csrf
                <input class="w-11/12 p-2.5 my-2.5 text-base rounded-lg bg-slate-900 shadow-[inset_10px_10px_20px_#181824,_inset_-10px_-10px_20px_#242434] border-2 border-white" type="text" name="name" placeholder="Name" required>
                @if ($errors->has('name'))
                    <div class="text-red-500 text-sm">{{ $errors->first('name') }}</div>
                @endif
                <input class="w-11/12 p-2.5 my-2.5 text-base rounded-lg bg-slate-900 shadow-[inset_10px_10px_20px_#181824,_inset_-10px_-10px_20px_#242434] border-2 border-white" type="text" name="student_number" placeholder="Student Number" required>
                @if ($errors->has('student_number'))
                    <div class="text-red-500 text-sm">{{ $errors->first('student_number') }}</div>
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
            </form>
        </div>
    </div>
</body>

</html>