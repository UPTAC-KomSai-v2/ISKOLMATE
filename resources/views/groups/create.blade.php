<x-dashboard-no-time-layout :back="'/dashboard/groups'">
    <h1>TEST</h1>

    <form action="{{ route('group.create') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Name -->
        <input type="text" name="name" placeholder="Name" required value="{{ old('name') }}" class="w-full p-4 bg-[#1e1e2f] rounded-lg shadow-[inset_5px_5px_10px_#141418,inset_-5px_-5px_10px_#282838] text-white text-lg focus:outline-none focus:ring-2 focus:ring-green-500">

        @if ($errors->has('name'))
            <div class="text-red-500 text-sm">{{ $errors->first('name') }}</div>
        @endif

        <!-- Submit Button -->
        <button type="submit" class="w-full p-4 text-lg font-bold bg-[#1e1e2f] text-white rounded-lg shadow-[5px_5px_10px_#141418,-5px_-5px_10px_#282838] hover:bg-[#252538] hover:shadow-[inset_5px_5px_10px_#141418,inset_-5px_-5px_10px_#282838] transition">
            Submit
        </button>
    </form>
</x-dashboard-no-time-layout>