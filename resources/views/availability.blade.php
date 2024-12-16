<x-dashboard-layout :name="$name" :position="$position" :back="'/dashboard'">
    <div class="flex justify-between items-center">
        <div class="w-3/4" >
            <label for="description" class="form-label font-bold">Select Date:</label>
            <input type="date" id="availability_date" name="availability_date" class = "bg-[#83173C] text-[#FEB71B]">
            <label for="description" class="form-label font-bold">Select Start Time:</label>
            <input type="time" id="start_time" name="start_time" class = "bg-[#83173C] text-[#FEB71B]">
            <label for="description" class="form-label font-bold">Select End Time:</label>
            <input type="time" id="end_time" name="end_time" class = "bg-[#83173C] text-[#FEB71B]">
            <button class="bg-[#83173C] text-[#fff] border cursor-pointer px-4 py-2 w-48 rounded border-solid border-[#ccc] mb-4 hover:bg-gradient-to-tr from-slate-800 to-slate-950 transition duration-500
                        hover:text-[#FEB71C] hover:border-[#FEB71C]" onclick="location.href='input_tasks1'">
                Set Availability
            </button>
            <button class="bg-[#83173C] text-[#fff] border cursor-pointer px-4 py-2 w-48 rounded border-solid border-[#ccc] hover:bg-gradient-to-tr from-slate-800 to-slate-950 transition duration-500
                        hover:text-[#FEB71C] hover:border-[#FEB71C]" onclick="location.href='tasks'">
                Remove Availability
            </button>
        </div>
        
    
    </div>
</x-dashboard-layout>
    