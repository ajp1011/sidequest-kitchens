@extends('layouts.app')

@section('title', 'SideQuest Kitchens — Fantasy-themed catering')

@section('content')
    <div class="sq-panel text-center">
        <div class="mx-auto mb-8 flex justify-center md:hidden">
            <img
                src="{{ asset('images/sidequest-kitchens-logo.png') }}"
                width="280"
                height="280"
                class="h-44 w-auto drop-shadow-lg"
                alt=""
                role="presentation"
            >
        </div>
        <p class="font-display text-xs font-semibold uppercase tracking-[0.35em] text-ivy md:text-sm">Step through the door</p>
        <h1 class="sq-heading mt-3 text-3xl md:text-4xl">Adventure-worthy catering</h1>
        <div class="sq-divider my-6"></div>
        <p class="mx-auto max-w-2xl text-lg leading-relaxed text-wood-mid md:text-xl">
            Welcome to <strong class="text-wood-dark">SideQuest Kitchens</strong> — bespoke menus for intimate gatherings,
            birthday feasts, watch parties, and nights around the gaming table. Expect fantasy flair: dishes inspired by
            beloved fictional worlds and originals crafted by Chef Holly McGrath.
        </p>
        <div class="mt-10 flex flex-wrap items-center justify-center gap-4">
            <a
                href="{{ route('menus') }}"
                class="inline-flex items-center justify-center rounded border-2 border-ivy bg-ivy px-8 py-3 font-display text-sm font-semibold uppercase tracking-widest text-parchment shadow-md transition hover:bg-ivy-bright"
            >
                Explore menus
            </a>
            <a
                href="{{ route('about') }}"
                class="inline-flex items-center justify-center rounded border-2 border-stone-deep bg-parchment-dark/80 px-8 py-3 font-display text-sm font-semibold uppercase tracking-widest text-wood-dark transition hover:border-brass hover:text-brass"
            >
                Meet the chef
            </a>
        </div>
    </div>
@endsection
