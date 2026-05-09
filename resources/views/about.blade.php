@extends('layouts.app')

@section('title', 'About — SideQuest Kitchens')

@section('content')
    <article class="sq-panel">
        <header class="text-center">
            <p class="font-display text-xs font-semibold uppercase tracking-[0.35em] text-ivy">The keeper of the kitchen</p>
            <h1 class="sq-heading mt-2 text-3xl md:text-4xl">Chef Holly McGrath</h1>
            <div class="sq-divider my-6"></div>
        </header>

        <div class="mx-auto max-w-none text-wood-mid">
            <p class="text-xl leading-relaxed">
                SideQuest Kitchens is a single-owner catering studio built around one idea:
                <strong class="text-ivy">great food should feel like part of the story.</strong>
                Whether you are planning a small celebration, a themed birthday, or a long night of dice and adventure,
                Holly brings restaurant discipline and playful imagination to every menu.
            </p>

            <h2 class="sq-heading mt-10 text-2xl">What we do best</h2>
            <ul class="mt-4 list-none space-y-3 pl-0">
                <li class="flex gap-3 rounded-md border border-stone-deep/40 bg-parchment-dark/40 px-4 py-3">
                    <span class="font-display text-brass" aria-hidden="true">✦</span>
                    <span><strong class="text-wood-dark">Small events</strong> — intimate guest lists where detail and timing matter.</span>
                </li>
                <li class="flex gap-3 rounded-md border border-stone-deep/40 bg-parchment-dark/40 px-4 py-3">
                    <span class="font-display text-brass" aria-hidden="true">✦</span>
                    <span><strong class="text-wood-dark">Themed gatherings</strong> — birthdays, watch parties, and “one-shot” style celebrations with menus that match the mood.</span>
                </li>
                <li class="flex gap-3 rounded-md border border-stone-deep/40 bg-parchment-dark/40 px-4 py-3">
                    <span class="font-display text-brass" aria-hidden="true">✦</span>
                    <span><strong class="text-wood-dark">Game nights</strong> — fuel for dungeons, dragons, and whatever quest your table is running.</span>
                </li>
            </ul>

            <h2 class="sq-heading mt-10 text-2xl">Fantasy on the plate</h2>
            <p>
                Menus draw from fictional worlds you love — think along the lines of <em>Harry Potter</em>,
                <em>Game of Thrones</em>, <em>The Lord of the Rings</em> — alongside Holly’s own culinary inventions.
                Every dish is an opportunity to nod to the lore without losing sight of flavor, balance, and hospitality.
            </p>

            <p class="mt-6 rounded-md border border-dashed border-stone-deep/60 bg-parchment-dark/30 p-4 text-center italic text-wood-mid">
                Full biography, service area, and booking details will live here as the site grows.
                For now, this page frames the story SideQuest Kitchens is here to tell.
            </p>
        </div>
    </article>
@endsection
