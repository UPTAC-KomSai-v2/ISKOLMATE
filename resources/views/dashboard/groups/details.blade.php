<x-dashboard-no-time-layout :back="route('dashboard')">
    <div class="flex flex-col gap-2">
        <div class="flex justify-between">
            <div class="lg:text-2xl font-bold">{{ $group->group_name }} (ID: {{ $group->group_id }})</div>    
            @if ($user->is_teacher())
            <form action="{{ route('group.delete', $group->group_id) }}" method="post">
                @csrf
                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-red-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                </button>
            </form>
            @endif
        </div>

        <!--  Display Error Message  -->
        @if (session('error'))
            <div class="text-red-500 text-sm mb-2">
                {{ session('error') }}
            </div>
        @endif

        <!--  Display Success Message  -->
        @if (session('message'))
            <div class="text-green-500 text-sm mb-2">
                {{ session('message') }}
            </div>
        @endif

        <div>
            <h2>Course participants:</h2>

            <ul>
                @foreach ($members as $member)
                    <li class="flex gap-3">
                        <a href="{{ route('user.profile.other', $member->id) }}">
                            {{ $member->first_name }} {{ $member->last_name }}
                        </a>
                        @if ($user->id != $member->id && $user->is_teacher())
                        <form action="{{ route('group.exclude', $group->group_id) }}" method="post">
                            @csrf
                            <input type="text" name="uid" class="hidden" value="{{ $member->id }}">
                            <button type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-red-600">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </form>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>

        @if ($user->is_teacher())
        <div>
            <h2>Add participants:</h2>

            <form action="{{ route('group.include', $group->group_id) }}" method="post" class="flex">
                @csrf

                <input type="text" name="uid" placeholder="User ID" required value="{{ old('uid') }}" class="text-white bg-transparent border-white border-2 rounded-md px-4 py-1">

                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </button>

                @if ($errors->has('uid'))
                    <div class="text-red-500 text-sm">{{ $errors->first('uid') }}</div>
                @endif
            </form>
        </div>
        @endif
    </div>
</x-dashboard-no-time-layout>