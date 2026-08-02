<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Fantasy-themed catering for intimate gatherings, celebrations, and game nights — SideQuest Kitchens, Chef Holly McGrath.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name'))</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    @vite(['resources/css/app.css', 'resources/js/app.ts'])
</head>
<body class="flex min-h-screen flex-col bg-page font-body text-wood-dark antialiased">
    <div class="pointer-events-none fixed inset-0 opacity-[0.07]" style="background-image: url('data:image/svg+xml,%3Csvg viewBox=%220 0 256 256%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cfilter id=%22n%22%3E%3CfeTurbulence type=%22fractalNoise%22 baseFrequency=%220.8%22 numOctaves=%224%22 stitchTiles=%22stitch%22/%3E%3C/filter%3E%3Crect width=%22100%25%22 height=%22100%25%22 filter=%22url(%23n)%22/%3E%3C/svg%3E');" aria-hidden="true"></div>

    <header class="relative z-10 border-b-4 border-double border-stone-deep/60 bg-header shadow-lg">
        <div class="mx-auto flex max-w-6xl flex-col items-center gap-6 px-4 py-8 md:flex-row md:justify-between md:gap-8 md:py-6">
            <a href="{{ route('home') }}" class="group flex flex-col items-center gap-3 md:flex-row md:gap-5">
                <img
                    src="{{ asset('images/sidequest-kitchens-logo.png') }}"
                    width="200"
                    height="200"
                    class="h-28 w-auto drop-shadow-[0_4px_12px_rgba(0,0,0,0.5)] transition-transform group-hover:scale-[1.02] md:h-24"
                    alt="SideQuest Kitchens logo: a wooden tavern door in a stone arch with crossed sword and chef knife"
                >
                <span class="sr-only md:not-sr-only md:inline md:font-display md:text-lg md:font-semibold md:uppercase md:tracking-[0.25em] md:text-parchment">SideQuest Kitchens</span>
            </a>
            <nav aria-label="Primary" class="flex flex-wrap items-center justify-center gap-x-8 gap-y-3">
                <a href="{{ route('home') }}" class="sq-nav-link {{ request()->routeIs('home') ? 'sq-nav-link-active' : '' }}">Home</a>
                <a href="{{ route('menus') }}" class="sq-nav-link {{ request()->routeIs('menus') ? 'sq-nav-link-active' : '' }}">Menus</a>
                <a href="{{ route('order') }}" class="sq-nav-link {{ request()->routeIs('order') ? 'sq-nav-link-active' : '' }}">Order</a>
                <a href="{{ route('about') }}" class="sq-nav-link {{ request()->routeIs('about') ? 'sq-nav-link-active' : '' }}">About</a>
            </nav>
        </div>
    </header>

    <main class="relative z-10 mx-auto w-full max-w-5xl flex-1 px-4 py-12 md:py-16">
        @yield('content')
    </main>

    <footer class="relative z-10 mt-auto border-t-4 border-double border-stone-deep/40 bg-footer py-8 text-center text-sm text-parchment/75">
        <p class="font-display tracking-wide">&copy; {{ date('Y') }} SideQuest Kitchens</p>
        <p class="mt-1 font-body italic text-parchment/60">Chef Holly McGrath — fantasy-inspired catering</p>
    </footer>
</body>
</html>
