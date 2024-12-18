<x-entry-layout>
    <div class="mt-2.5 text-base" id="loading-text">Loading...</div>

    <div class="w-full h-3.5 rounded-lg overflow-hidden m-[20px_auto] border-[1px] border-white">
        <div class="w-0 h-full rounded-r-lg bg-gradient-to-r from-[#00ff9d] to-[#00e08c] animate-[loading_3s_forwards]"></div>
    </div>

    <script>
        const loading = document.getElementById('loading-text');

        setInterval(() => {
            loading.innerText = {
                'Loading...': 'Loading.',
                'Loading.': 'Loading..',
                'Loading..': 'Loading...',
            }[loading.innerText];
        }, 500);

        setTimeout(() => {
            location.href = "{{ route('choice') }}";
        }, 3000);
    </script>
</x-entry-layout>