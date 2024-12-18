<x-dashboard-no-time-layout :back="route('dashboard')">
    <div class="flex flex-col gap-2">
        <div class="flex justify-between">
            <div class="lg:text-2xl font-bold">COURSES</div>    
            @if ($user->is_teacher())
            <a href="{{ route('group.create') }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </a>
            @endif
        </div>

        {{-- Display Error Message --}}
        @if (session('error'))
            <div class="text-red-500 text-sm mb-2">
                {{ session('error') }}
            </div>
        @endif

        {{-- Display Success Message --}}
        @if (session('message'))
            <div class="text-green-500 text-sm mb-2">
                {{ session('message') }}
            </div>
        @endif

        @if (count($groups) == 0)
            <h2>No courses here yet</h2>
        @else
        <div>
            <ul>
                @foreach ($groups as $group)
                    <li>
                        <a href="{{ route('group.members', $group->group_id) }}">{{ $group->group_name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</x-dashboard-no-time-layout>