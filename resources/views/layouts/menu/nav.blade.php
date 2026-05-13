<nav class="fixed inset-x-0 top-0 z-50 border-b border-white/10 bg-slate-950/80 backdrop-blur-xl">
    <div class="mx-auto flex h-16 max-w-screen-2xl flex-wrap items-center justify-between px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-3">
            {{-- Toggle Sidebar --}}
            <button data-drawer-target="drawer-navigation"
                data-drawer-toggle="drawer-navigation"
                aria-controls="drawer-navigation"
                class="inline-flex cursor-pointer items-center justify-center rounded-xl border border-white/10 bg-white/5 p-2.5 text-slate-300 transition hover:bg-white/10 hover:text-white focus:ring-2 focus:ring-sky-500 md:hidden"
            >
                <i class="fa-solid fa-bars"></i>
                <span class="sr-only">Toggle sidebar</span>
            </button>
            {{-- Logotipo --}}
            <a href="{{ route('app.index') }}" class="flex items-center gap-3">
                <span class="flex h-10 w-10 items-center justify-center rounded-2xl bg-linear-to-br from-sky-500 to-cyan-400 text-sm font-bold text-white shadow-lg shadow-sky-500/30">
                    L
                </span>
                <div class="hidden sm:block">
                    <span class="block text-sm font-semibold text-white">{{ config('app.name', 'Laravel') }}</span>
                    <span class="block text-xs text-slate-400">Laravel 12 starter</span>
                </div>
            </a>
            {{-- Search --}}
            <form class="hidden lg:block lg:pl-2" action="#" method="GET">
                <label class="sr-only" for="topbar-search">Search</label>
                <div class="relative w-104 max-w-full">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <input
                        class="block h-11 w-full rounded-2xl border border-white/10 bg-white/5 pl-10 text-sm text-white placeholder:text-slate-400 focus:border-sky-500 focus:bg-white/10 focus:ring-2 focus:ring-sky-500/30"
                        id="topbar-search"
                        name="email"
                        type="text"
                        placeholder="Search"
                    />
                </div>
            </form>
        </div>
        <div class="flex items-center gap-2 lg:order-2">
            {{-- Search mobile --}}
            <button 
                type="button"
                class="inline-flex rounded-xl border border-white/10 bg-white/5 p-2.5 text-slate-300 transition hover:bg-white/10 hover:text-white focus:ring-2 focus:ring-sky-500 lg:hidden"
                data-drawer-toggle="drawer-navigation"
                aria-controls="drawer-navigation"
            >
                <span class="sr-only">Toggle search</span>
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
            <!-- Notifications -->
            <button
                class="inline-flex rounded-xl border border-white/10 bg-white/5 p-2.5 text-slate-300 transition hover:bg-white/10 hover:text-white focus:ring-2 focus:ring-sky-500"
                data-dropdown-toggle="notification-dropdown"
                type="button"
            >
                <span class="sr-only">View notifications</span>
                <i class="fa-regular fa-bell"></i>
            </button>
            <!-- Dropdown menu -->
            <div 
                id="notification-dropdown"
                class="z-50 my-4 hidden max-w-sm list-none divide-y divide-slate-800 overflow-hidden rounded-2xl border border-slate-800 bg-slate-950 text-base shadow-2xl shadow-slate-950/60"
            >
                <div class="block bg-white/5 px-4 py-3 text-center text-sm font-medium tracking-wide text-slate-200">
                    Notifications
                </div>
                <div>
                    <a class="flex border-b border-slate-800 px-4 py-3 transition hover:bg-white/5" href="#">
                        <div class="shrink-0">
                            <img
                                class="h-11 w-11 rounded-full"
                                src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/bonnie-green.png"
                                alt="Bonnie Green avatar"
                            />
                        </div>
                        <div class="w-full pl-3">
                            <div class="mb-1.5 text-sm font-normal text-gray-500">
                                New message from
                                <span class="font-semibold text-gray-900">Bonnie Green</span>: "Hey,
                                what's up? All set for the presentation?"
                            </div>
                            <div class="text-primary-600 text-xs font-medium">
                                a few moments ago
                            </div>
                        </div>
                    </a>
                </div>
                <a class="text-md block bg-white/5 py-3 text-center font-medium text-white transition hover:bg-white/10" href="{{ route('app.notifications') }}">
                    <div class="inline-flex items-center">
                        <i class="fa-solid fa-eye"></i>
                        View all
                    </div>
                </a>
            </div>
            <button
                class="mx-3 flex rounded-full bg-gray-800 text-sm focus:ring-2 focus:ring-gray-600 md:mr-0"
                id="user-menu-button"
                data-dropdown-toggle="dropdown"
                type="button"
                aria-expanded="false"
            >
                <span class="sr-only">Open user menu</span>
                <img
                    class="h-8 w-8 rounded-full"
                    src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gough.png"
                    alt="user photo"
                />
            </button>
            <!-- Dropdown menu -->
            <div
                class="z-50 my-4 hidden w-64 list-none divide-y divide-slate-800 rounded-2xl border border-slate-800 bg-slate-950 text-base shadow-2xl shadow-slate-950/60"
                id="dropdown"
            >
                <div class="px-4 py-3">
                    <span class="block text-sm font-semibold text-white">{{ auth()->user()->name }}</span>
                    <span class="block truncate text-sm text-slate-400">{{ auth()->user()->email }}</span>
                </div>
                <ul class="py-1 text-slate-300" aria-labelledby="dropdown">
                    <li>
                        <a class="block px-4 py-2 text-sm transition hover:bg-white/5 hover:text-white" href="{{ route('app.profile') }}">
                            My profile
                        </a>
                    </li>
                    <li>
                        <a class="block px-4 py-2 text-sm transition hover:bg-white/5 hover:text-white" href="{{ route('app.settings') }}">
                            Configurations
                        </a>
                    </li>
                </ul>
                <ul class="py-1 text-slate-300" aria-labelledby="dropdown">
                    <li>
                        <form 
                            class="block px-4 py-2 text-sm transition hover:bg-white/5 hover:text-white" 
                            action="{{ route('app.logout') }}"
                            method="POST"
                        >
                            @csrf
                            <button type="submit">Sign out</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>