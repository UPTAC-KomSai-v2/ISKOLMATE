@props(['title' => '', 'route' => ''])

<a href="{{ $route }}" class="col-span-3 bg-slate-900 text-white rounded-3xl flex border-2 hover:bg-gradient-to-tr from-slate-800 to-slate-950 hover:cursor-pointer hover:text-hover hover:border-hover hover:duration-500 border-white h-80 justify-center items-center md:text-2xl font-bold">
    {{ $title }}
</a>
