@extends('layouts.app')

@section('title', 'Menus — SideQuest Kitchens')

@section('content')
    <div class="sq-panel">
        <header class="text-center">
            <p class="font-display text-xs font-semibold uppercase tracking-[0.35em] text-ivy">Provisions for your quest</p>
            <h1 class="sq-heading mt-2 text-3xl md:text-4xl">Menus</h1>
            <div class="sq-divider my-6"></div>
            <p class="mx-auto max-w-2xl text-lg text-wood-mid">
                Collections below are placeholders — each will soon hold curated offerings, pricing tiers, and dietary notes.
                Expect rotating themes tied to fictional realms and Holly’s original creations.
            </p>
        </header>

        <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <article class="flex flex-col rounded-lg border-2 border-stone-deep/50 bg-parchment-dark/50 p-6 shadow-md">
                <h2 class="font-display text-lg font-bold uppercase tracking-wider text-wood-dark">From familiar realms</h2>
                <p class="mt-3 flex-1 text-wood-mid">
                    Dishes inspired by worlds readers and viewers already love — magical feasts, royal spreads, and humble tavern fare reinterpreted for real tables.
                </p>
                <p class="mt-4 font-display text-xs font-semibold uppercase tracking-widest text-brass">Coming soon</p>
            </article>

            <article class="flex flex-col rounded-lg border-2 border-stone-deep/50 bg-parchment-dark/50 p-6 shadow-md">
                <h2 class="font-display text-lg font-bold uppercase tracking-wider text-wood-dark">Feasts of Westeros &amp; beyond</h2>
                <p class="mt-3 flex-1 text-wood-mid">
                    Hearty, dramatic menus suited to long tables and bold flavors — a natural fit for marathon sessions and viewing parties.
                </p>
                <p class="mt-4 font-display text-xs font-semibold uppercase tracking-widest text-brass">Coming soon</p>
            </article>

            <article class="flex flex-col rounded-lg border-2 border-stone-deep/50 bg-parchment-dark/50 p-6 shadow-md sm:col-span-2 lg:col-span-1">
                <h2 class="font-display text-lg font-bold uppercase tracking-wider text-wood-dark">SideQuest originals</h2>
                <p class="mt-3 flex-1 text-wood-mid">
                    Holly’s own themed menus — invented lore on the plate, written for guests who want something nobody else has served.
                </p>
                <p class="mt-4 font-display text-xs font-semibold uppercase tracking-widest text-brass">Coming soon</p>
            </article>
        </div>

        <div class="mt-10 rounded-md border border-dashed border-ivy/50 bg-ivy/10 p-6 text-center">
            <p class="font-display text-sm font-semibold uppercase tracking-widest text-ivy">Adventurers wanted</p>
            <p class="mt-2 text-wood-mid">
                Event inquiry forms, deposit policies, and sample menus will anchor this section next.
            </p>
        </div>
    </div>
@endsection
