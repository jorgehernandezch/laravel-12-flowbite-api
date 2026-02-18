<nav class="fixed left-0 right-0 top-0 z-50 px-5 py-2.5 bg-gray-800">
    <div class="flex flex-wrap items-center justify-between">
        <div class="flex items-center justify-start">
            {{-- Toggle Sidebar --}}
            <button data-drawer-target="drawer-navigation"
                data-drawer-toggle="drawer-navigation"
                aria-controls="drawer-navigation"
                class="mr-2 cursor-pointer rounded-lg p-2 text-gray-600 hover:text-gray-100 focus:ring-2 focus:ring-gray-600 md:hidden"
            >
                <i class="fa-solid fa-bars"></i>
                <span class="sr-only">Toggle sidebar</span>
            </button>
            {{-- Logotipo --}}
            <a href="" class="flex items-center justify-between mr-4">
                <img
                    src="https://flowbite.s3.amazonaws.com/logo.svg"
                    class="mr-3 h-8"
                    alt="Flowbite Logo"
                />
                <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">Flowbite</span>
            </a>
            {{-- Search --}}
            <form class="hidden md:block md:pl-2" action="#" method="GET">
                <label class="sr-only" for="topbar-search">Search</label>
                <div class="relative sm:w-64 md:w-96">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <input
                        class="focus:ring-primary-500 focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 pl-10 text-sm text-gray-900 h-8"
                        id="topbar-search"
                        name="email"
                        type="text"
                        placeholder="Search"
                    />
                </div>
            </form>
        </div>
        <div class="flex items-center lg:order-2">
            {{-- Search mobile --}}
            <button 
                type="button"
                class="mr-1 rounded-lg p-2 text-gray-600 hover:text-gray-100 focus:ring-2 focus:ring-gray-600 md:hidden"
                data-drawer-toggle="drawer-navigation"
                aria-controls="drawer-navigation"
            >
                <span class="sr-only">Toggle search</span>
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
            <!-- Notifications -->
            <button
                class="mr-1 rounded-lg p-2 text-gray-600 hover:text-gray-100 focus:ring-2 focus:ring-gray-600 "
                data-dropdown-toggle="notification-dropdown"
                type="button"
            >
                <span class="sr-only">View notifications</span>
                <i class="fa-regular fa-bell"></i>
            </button>
            <!-- Dropdown menu -->
            <div 
                id="notification-dropdown"
                class="z-50 my-4 hidden max-w-sm list-none divide-y divide-gray-100 overflow-hidden rounded-xl bg-white text-base shadow-lg"
            >
                <div class="block bg-gray-50 px-4 py-2 text-center text-base font-medium text-gray-700 ">
                    Notifications
                </div>
                <div>
                    <a class="flex border-b px-4 py-3 hover:bg-gray-100" href="#">
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
                <a class="text-md block bg-gray-50 py-2 text-center font-medium text-gray-900 hover:bg-gray-100" href="{{ route('app.notifications') }}">
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
                class="z-50 my-4 hidden w-56 list-none divide-y divide-gray-100 rounded-xl bg-white text-base shadow"
                id="dropdown"
            >
                <div class="px-4 py-3">
                    <span class="block text-sm font-semibold text-gray-900">{{ auth()->user()->name }}</span>
                    <span class="block truncate text-sm text-gray-900">{{ auth()->user()->email }}</span>
                </div>
                <ul class="py-1 text-gray-700" aria-labelledby="dropdown">
                    <li>
                        <a class="block px-4 py-2 text-sm hover:bg-gray-100" href="{{ route('app.profile') }}">
                            My profile
                        </a>
                    </li>
                    <li>
                        <a class="block px-4 py-2 text-sm hover:bg-gray-100" href="{{ route('app.settings') }}">
                            Configurations
                        </a>
                    </li>
                </ul>
                <ul class="py-1 text-gray-700" aria-labelledby="dropdown">
                    <li>
                        <form 
                            class="block px-4 py-2 text-sm hover:bg-gray-100" 
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