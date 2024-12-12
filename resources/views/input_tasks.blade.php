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
    <body class="bg-slate-900 text-white font-['Poppins'_,_sans-serif]">
        <div class="absolute top-10 left-8 z-20">
            <a href="/tasks" title="Go Back" class="text-2xl p-2.5 rounded-full">&#9664;</a>
        </div>
        <div class="justify-center m-8 rounded-3xl bg-slate-900 p-8 w-auto h-auto border-2 border-white shadow-[5px_5px_30px_#181824_,-15px_-15px_30px_#242434]">
            <div class="absolute bg-red-400 w-10 h-10 right-[-10px] top-[-10px]" hidden></div>
            <div class="relative flex items-center bg-slate-900 text-white md:text-5xl w-auto h-1/2">
                <div class="lg:text-2xl font-bold">INPUT TASKS</div>
                <div class="absolute bg-red-400 w-10 h-10 right-[-10px] top-[-10px]" id="checkAnnouncements" hidden></div>
            </div>
            <div class="flex-col border-solid border-[#f3e7e7] items-center p-10 rounded-lg">
                <div class="flex mb-5"> 
                    <form name="form" action="" method="post">
                        <input name="subject" id="subject" type="text" class="w-[300px] p-2 rounded-md border border-solid border-[#ccc]" placeholder="Subject" required />
                    </form>
                </div>
                <div class="flex">
                    <label for="fileInput" class="p-[5px] bg-[#f0f0f0] border border-solid border-[#ccc] rounded-l-md cursor-pointer">Upload</label>
                    <span class="grow text-center text-[#888] bg-[#f0f0f0] p-[5px] border-x-[none] border-solid border-[#ccc]">Choose file</span>
                    <button class="bg-[#f0f0f0] border cursor-pointer px-2.5 py-[5px] rounded-r-md border-solid border-[#ccc]">Browse</button>
                </div>
                <div class="flex justify-between items-center">
                    <div class="w-3/4">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control w-full rounded-md border border-solid border-[#ccc]" rows="5" placeholder="Enter details here" required></textarea>
                    </div>
                    <div class="flex flex-col justify-center items-end w-1/4">
                        <button class="bg-[#f0f0f0] border cursor-pointer px-4 py-2 w-32 rounded border-solid border-[#ccc] mb-4" onclick="location.href='input_tasks1'">
                            Confirm
                        </button>
                        <button class="bg-[#f0f0f0] border cursor-pointer px-4 py-2 w-32 rounded border-solid border-[#ccc]" onclick="location.href='tasks'">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
