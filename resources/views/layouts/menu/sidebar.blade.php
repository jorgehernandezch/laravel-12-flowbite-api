@php
    $url = request()->url();
    $segments = explode('/', $url);
    //dd($segments, count($segments));
    count($segments) == 4 ? $segment = $segments[3] : $segment = $segments[4];
    
@endphp
<!-- Sidebar -->
<aside
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full md:translate-x-0 bg-gray-800"
    aria-label="Sidenav"
    id="drawer-navigation"
>
    <div class="overflow-y-auto py-5 px-3 h-full bg-gray-800">
        <form action="#" method="GET" class="md:hidden mb-2">
            <label for="sidebar-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <input
                    type="text"
                    name="search"
                    id="sidebar-search"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2"
                    placeholder="Search"
                />
            </div>
        </form>
        <ul class="space-y-2">
            <x-sidebar.item
                route="app.index" 
                item="Dashboard"
                class="{{ $segment == 'app' ? 'bg-linear-to-l from-sky-400 via-sky-500 to-sky-600 text-white hover:bg-linear-to-br ' : '' }}"
            >
                <i class="fa-solid fa-chart-pie"></i>
            </x-sidebar.item>
        </ul>
        <ul class="mt-4 pt-4 space-y-2 border-t border-gray-600">
            {{-- <x-sidebar.item 
                route="app.index"
                item="Users" 
                class="{{ $segment == 'users' ? 'bg-linear-to-l from-sky-400 via-sky-500 to-sky-600 text-white hover:bg-linear-to-br' : '' }}"
            >
                <i class="fa-solid fa-person-circle-check"></i>
            </x-sidebar.item> --}}
        </ul>
    </div>
    <div class="hidden absolute bottom-0 left-0 justify-center p-4 w-full lg:flex bg-gray-800 z-20 border-t border-gray-600">
        <a
            href="{{ route('app.settings') }}"
            data-tooltip-target="tooltip-settings"
            class="inline-flex justify-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100"
        >
            <i class="fa-solid fa-gear"></i>
        </a>
        <button
            type="button"
            data-dropdown-toggle="language-dropdown"
            class="inline-flex justify-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100"
        >
            <i class="fa-brands fa-whatsapp"></i>
        </button>
        <!-- Dropdown -->
        <div
            class="hidden z-50 my-4 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700"
            id="language-dropdown"
        >
        <ul class="py-1" role="none">
            <li>
                <a
                    href="#"
                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100"
                    role="menuitem"
                >
                    <div class="inline-flex items-center">
                        English (US)
                    </div>
                </a>
            </li>
            <li>
            <a
                href="#"
                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:text-white dark:hover:bg-gray-600"
                role="menuitem"
            >
                <div class="inline-flex items-center">
                <svg
                    aria-hidden="true"
                    class="h-3.5 w-3.5 rounded-full mr-2"
                    xmlns="http://www.w3.org/2000/svg"
                    id="flag-icon-css-de"
                    viewBox="0 0 512 512"
                >
                    <path fill="#ffce00" d="M0 341.3h512V512H0z" />
                    <path d="M0 0h512v170.7H0z" />
                    <path fill="#d00" d="M0 170.7h512v170.6H0z" />
                </svg>
                Deutsch
                </div>
            </a>
            </li>
            <li>
            <a
                href="#"
                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:text-white dark:hover:bg-gray-600"
                role="menuitem"
            >
                <div class="inline-flex items-center">
                <svg
                    aria-hidden="true"
                    class="h-3.5 w-3.5 rounded-full mr-2"
                    xmlns="http://www.w3.org/2000/svg"
                    id="flag-icon-css-it"
                    viewBox="0 0 512 512"
                >
                    <g fill-rule="evenodd" stroke-width="1pt">
                    <path fill="#fff" d="M0 0h512v512H0z" />
                    <path fill="#009246" d="M0 0h170.7v512H0z" />
                    <path fill="#ce2b37" d="M341.3 0H512v512H341.3z" />
                    </g>
                </svg>
                Italiano
                </div>
            </a>
            </li>
            <li>
            <a
                href="#"
                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:text-white dark:text-gray-300 dark:hover:bg-gray-600"
                role="menuitem"
            >
                <div class="inline-flex items-center">
                <svg
                    aria-hidden="true"
                    class="h-3.5 w-3.5 rounded-full mr-2"
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink"
                    id="flag-icon-css-cn"
                    viewBox="0 0 512 512"
                >
                    <defs>
                    <path
                        id="a"
                        fill="#ffde00"
                        d="M1-.3L-.7.8 0-1 .6.8-1-.3z"
                    />
                    </defs>
                    <path fill="#de2910" d="M0 0h512v512H0z" />
                    <use
                    width="30"
                    height="20"
                    transform="matrix(76.8 0 0 76.8 128 128)"
                    xlink:href="#a"
                    />
                    <use
                    width="30"
                    height="20"
                    transform="rotate(-121 142.6 -47) scale(25.5827)"
                    xlink:href="#a"
                    />
                    <use
                    width="30"
                    height="20"
                    transform="rotate(-98.1 198 -82) scale(25.6)"
                    xlink:href="#a"
                    />
                    <use
                    width="30"
                    height="20"
                    transform="rotate(-74 272.4 -114) scale(25.6137)"
                    xlink:href="#a"
                    />
                    <use
                    width="30"
                    height="20"
                    transform="matrix(16 -19.968 19.968 16 256 230.4)"
                    xlink:href="#a"
                    />
                </svg>
                中文 (繁體)
                </div>
            </a>
            </li>
        </ul>
        </div>
    </div>
</aside>