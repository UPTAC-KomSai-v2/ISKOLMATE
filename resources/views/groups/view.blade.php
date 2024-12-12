<x-dashboard-no-time-layout :back="'/dashboard'">
    <h1>TEST</h1>

    @foreach ($groups as $group)
        <h2>{{ $group->group_name }}</h2>
    @endforeach
</x-dashboard-no-time-layout>