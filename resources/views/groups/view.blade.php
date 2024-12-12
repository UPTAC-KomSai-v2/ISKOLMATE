<x-dashboard-no-time-layout :back="'/dashboard'">
    <div class="flex flex-col gap-2">
        <div class="flex justify-between">
            <div class="lg:text-2xl font-bold">GROUPS</div>    
            <a href="{{ route('group.create') }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </a>
        </div>

        @if (count($groups) == 0)
            <h2>No groups here yet</h2>
        @else
        <div>
            <ul>
                @foreach ($groups as $group)
                    <a href="{{ route('group.members', $group->group_id) }}">{{ $group->group_name }}</a>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</x-dashboard-no-time-layout>