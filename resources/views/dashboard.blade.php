<x-dashboard-layout :first_name="$first_name" :last_name="$last_name" :position="$position">
    <x-dashboard-button :title="'ANNOUNCEMENTS'" :route="route('announcements.view')" />
    <x-dashboard-button :title="'TASKS'" :route="route('tasks.list')" />
    <x-dashboard-button :title="'AVAILABILITY'" :route="route('availability')" />
    <x-dashboard-button :title="'COURSES'" :route="route('group.view')" />
</x-dashboard-layout>