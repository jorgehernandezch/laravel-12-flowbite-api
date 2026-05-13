@props(['route', 'item', 'active' => false, 'notification' => null])

<li>
    <a {{ $attributes->merge([
        'class' => 'group flex items-center rounded-2xl px-4 py-3 text-sm font-medium transition',
        'href' => route($route),
    ]) }}>
        <span class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-white/5 text-sky-300 ring-1 ring-white/10 transition group-hover:bg-sky-500/15 group-hover:text-sky-200">
            {{ $slot }}
        </span>
        <span class="ms-3 flex-1 whitespace-nowrap text-slate-300 transition group-hover:text-white">{{ $item }}</span>
        @isset($notification)
            <span class="ms-3 inline-flex items-center justify-center rounded-full bg-sky-500/15 px-3 py-1 text-xs font-semibold text-sky-200 ring-1 ring-sky-400/20">
                {{ $notification }}
            </span>
        @endisset
    </a>
</li>