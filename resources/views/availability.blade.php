<x-dashboard-layout :name="$name" :position="$position" :back="'/dashboard'">
    <div class="flex justify-between items-center">
        <div class="w-3/4" >
            <label for="description" class="form-label">Description</label>
            <input type="datetime-local" id="birthday" name="birthday" class = "bg-[#83173C] text-[#FEB71B]">
        </div>
    </div>
    <div class="flex flex-col justify-center items-end w-1/4 font-bold">
        <button class="bg-[#83173C] text-[#FEB71B] border cursor-pointer px-4 py-2 w-48 rounded border-solid border-[#ccc] mb-4" onclick="location.href='input_tasks1'">
            Set Availability
        </button>
        <button class="bg-[#83173C] text-[#FEB71B] border cursor-pointer px-4 py-2 w-48 rounded border-solid border-[#ccc]" onclick="location.href='tasks'">
            Remove Availability
        </button>
    </div>
</x-dashboard-layout>