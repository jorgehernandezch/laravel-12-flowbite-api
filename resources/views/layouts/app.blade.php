<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/x-icon" href="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <!-- Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen font-sans antialiased text-slate-100">
        <div class="relative min-h-screen overflow-hidden bg-slate-950">
            <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_top_left,rgba(14,165,233,0.18),transparent_32%),radial-gradient(circle_at_top_right,rgba(59,130,246,0.14),transparent_28%),linear-gradient(180deg,#020617_0%,#0f172a_48%,#e2e8f0_100%)]"></div>
            <div class="pointer-events-none absolute -left-24 top-24 h-72 w-72 rounded-full bg-sky-500/20 blur-3xl"></div>
            <div class="pointer-events-none absolute right-0 top-40 h-80 w-80 rounded-full bg-cyan-400/10 blur-3xl"></div>
            @include('layouts.menu.nav')
            @include('layouts.menu.sidebar')
            <main class="relative min-h-screen pt-20 md:pl-72">
                <div class="mx-auto max-w-7xl px-4 pb-10 sm:px-6 lg:px-8">
                    <div class="rounded-4xl border border-white/10 bg-white/90 p-4 shadow-2xl shadow-slate-950/20 backdrop-blur sm:p-6">
                        <div class="min-h-[calc(100vh-7rem)] rounded-3xl bg-slate-50 p-4 text-slate-900 sm:p-6">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </main>
        </div>
        @stack('scripts')
    </body>
</html>