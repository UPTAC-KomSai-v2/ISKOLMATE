<x-dashboard-no-time-layout :back="route('tasks.list')">
    <div class="absolute bg-red-400 w-10 h-10 right-[-10px] top-[-10px]" hidden></div>
    <div class="relative flex items-center bg-slate-900 text-white md:text-5xl w-auto h-1/2">
        <div class="lg:text-2xl font-bold">INPUT TASKS</div>
        <div class="absolute bg-red-400 w-10 h-10 right-[-10px] top-[-10px]" id="checkAnnouncements" hidden></div>
    </div>
    <div class="flex-col border-solid border-[#f3e7e7] items-center p-10 rounded-lg">
        <form name="form" action="{{ route('tasks.store') }}" method="post">
            @csrf
            <div class="flex mb-5">
                <label for="title" class="form-label">Title</label>
            </div>

            <div class="flex mb-5">
                <input name="title" id="title" type="text" class="w-[300px] p-2 rounded-md border border-solid border-[#ccc] text-[#505050]" placeholder="Title" required />
            </div>

            <div class="flex justify-between items-center">
                <div class="w-3/4">
                    <label for="description" class="form-label"> Description </label>
                    <textarea name="description" id="description" class="p-2 form-control w-full rounded-md border border-solid border-[#ccc] text-[#505050]" rows="5" placeholder="Enter details here" required></textarea>
                </div>

                <div class="flex flex-col justify-center items-end w-1/4">
                    <button type="submit" class="bg-[#8D1436] border cursor-pointer px-4 py-2 w-32 rounded border-solid border-[#ccc] mb-4 hover:border-[#FEB71C] hover:text-[#FEB71C] hover:font-bold hover:duration-500 hover:bg-gradient-to-tr from-slate-800 to-slate-950">
                        Confirm
                    </button>

                    <a href="{{ route('tasks.list') }}">
                        <button class="bg-[#8D1436] border cursor-pointer px-4 py-2 w-32 rounded border-solid border-[#ccc] hover:border-[#FEB71C] hover:text-[#FEB71C] hover:font-bold hover:duration-500 hover:bg-gradient-to-tr from-slate-800 to-slate-950">
                            Cancel
                        </button>
                    </a>
                </div>
            </div>
        </form>
    </div>
</x-dashboard-no-time-layout>
