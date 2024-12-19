<x-dashboard-no-time-layout :back="route('tasks.list')">
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <div class="flex flex-col col-span-6 h-full">
            <textarea class="col-span-6 overflow-auto resize-none border-2 border-black m-2 p-2 rounded-lg w-full h-12 text-black placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-fuchsia-900"
                name="title"
                id="title" value="{{ old('title') }}"
                placeholder="Enter the title"></textarea>

            <textarea class="overflow-auto resize-none border-2 border-black m-2 p-2 rounded-lg w-full h-40 text-black placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-fuchsia-900"
                name="description"
                id="description" value="{{ old('description') }}"
                placeholder="Enter the content"></textarea>

            <select name="visibility_group" value="{{ old('visibility_group') }}"
                class="w-full m-2 p-2 rounded-md border border-solid border-[#ccc] text-[#505050] focus:outline-none focus:ring-2 focus:ring-green-500"
                required>
                <option value="global" selected>Personal</option>
                @if ($user->is_teacher())
                <option value="2">Teachers</option>
                @else
                <option value="1">Students</option>
                @endif
                @foreach ($user->get_courses() as $course)
                    <option value="{{ $course->group_id }}">{{ $course->group_name }}</option>
                @endforeach
            </select>

            <!--  Display Error Message  -->
            @if (session('error'))
                <div class="text-red-500 text-sm mb-2 mx-2">
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="text-red-500 text-sm mb-2 mx-2">
                        {{ $error }}
                    </div>
                @endforeach
            @endif

            <div class="flex gap-2">
                <button type="submit" class="bg-[#8D1436] w-80 text-white rounded-3xl flex border-2 hover:shadow-[inset_35px_35px_20px_#181824_,_inset_-35px_-35px_20px_#242434] cursor-pointer border-white m-2 h-20 justify-center items-center md:text-2xl font-bold">
                    Post
                </button>
    
                <a href="{{ route('tasks.list') }}" class="bg-[#8D1436] w-80 text-white rounded-3xl flex border-2 hover:shadow-[inset_35px_35px_20px_#181824_,_inset_-35px_-35px_20px_#242434] cursor-pointer border-white m-2 h-20 justify-center items-center md:text-2xl font-bold">
                    Cancel
                </a>
            </div>
        </div>
    </form>
</x-dashboard-no-time-layout>
