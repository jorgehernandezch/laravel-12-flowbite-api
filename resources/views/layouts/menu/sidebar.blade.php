@php
    $isDashboard = request()->routeIs('app.index');
@endphp
<!-- Sidebar -->
<aside
    class="fixed inset-y-0 left-0 z-40 hidden w-72 border-r border-white/10 bg-slate-950/95 pt-16 backdrop-blur-xl md:block"
    aria-label="Sidenav"
    id="drawer-navigation"
>
    <div class="flex h-full flex-col overflow-y-auto px-4 py-5">
        <div class="mb-6 rounded-3xl border border-white/10 bg-white/5 p-4">
            <p class="text-xs font-semibold uppercase tracking-[0.28em] text-sky-300">Starter kit</p>
            <p class="mt-2 text-sm leading-6 text-slate-300">Build production-ready Laravel apps faster with a consistent UI foundation.</p>
        </div>
        <form action="#" method="GET" class="mb-4 md:hidden">
            <label for="sidebar-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <input
                    type="text"
                    name="search"
                    id="sidebar-search"
                    class="block w-full rounded-2xl border border-white/10 bg-white/5 py-2.5 pl-10 text-sm text-white placeholder:text-slate-400 focus:border-sky-500 focus:bg-white/10 focus:ring-2 focus:ring-sky-500/30"
                    placeholder="Search"
                />
            </div>
        </form>
        <ul class="space-y-2">
            <x-sidebar.item
                route="app.index" 
                item="Dashboard"
                :active="$isDashboard"
            >
                <i class="fa-solid fa-chart-pie"></i>
            </x-sidebar.item>
        </ul>
        <ul class="mt-6 space-y-2 border-t border-white/10 pt-6">
        </ul>
        <div class="mt-auto pt-6">
            <div class="rounded-3xl border border-white/10 bg-white/5 p-4">
                <p class="text-xs uppercase tracking-[0.24em] text-slate-400">Signed in as</p>
                <p class="mt-2 text-sm font-semibold text-white">{{ auth()->user()->name }}</p>
                <p class="truncate text-sm text-slate-400">{{ auth()->user()->email }}</p>
            </div>
        </div>
    </div>
</aside>