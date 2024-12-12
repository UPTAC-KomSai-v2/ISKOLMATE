<x-dashboard-no-time-layout :back="'/dashboard/groups'">
    <div class="lg:text-2xl font-bold">CREATE GROUP</div>

    <form action="{{ route('group.create') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Name -->
        <input type="text" name="name" placeholder="Group Name" required value="{{ old('name') }}" class="text-white bg-transparent border-white border-2 rounded-md px-4 py-2">

        @if ($errors->has('name'))
            <div class="text-red-500 text-sm">{{ $errors->first('name') }}</div>
        @endif

        <!-- Submit Button -->
        <button type="submit" class="bg-[#f0f0f0] border cursor-pointer px-4 py-2 rounded border-solid border-[#ccc] mb-4 text-black">
            Create Group
        </button>
    </form>
</x-dashboard-no-time-layout>