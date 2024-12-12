<x-dashboard-no-time-layout :back="'/dashboard'">
    <h1>{{ $group->group_name }}</h1>    

    <h2>Group members:</h2>

    <ul>
        @foreach ($members as $member)
            <li>{{ $member->name }}</li>
        @endforeach
    </ul>
</x-dashboard-no-time-layout>