@extends('layouts.app')

@section('title', 'Order — SideQuest Kitchens')

@section('content')
    <article class="sq-panel">
        <header class="text-center">
            <p class="font-display text-xs font-semibold uppercase tracking-[0.35em] text-ivy">Commission a feast</p>
            <h1 class="sq-heading mt-2 text-3xl md:text-4xl">Quest Order Sheet</h1>
            <div class="sq-divider my-6"></div>
            <p class="mx-auto max-w-2xl text-lg text-wood-mid">
                Fill out your adventurer details below. This is a mockup — nothing is submitted yet.
            </p>
        </header>

        <form class="mt-10 space-y-8" action="#" method="get" onsubmit="return false;">
            {{-- Identity --}}
            <section class="rounded-lg border-2 border-stone-deep/60 bg-parchment-dark/30 p-5 md:p-6">
                <h2 class="font-display text-sm font-bold uppercase tracking-[0.25em] text-burgundy">Character identity</h2>
                <div class="mt-5 grid gap-5 md:grid-cols-2">
                    <label class="block">
                        <span class="font-display text-xs font-semibold uppercase tracking-widest text-wood-dark">Adventurer name</span>
                        <input
                            type="text"
                            name="name"
                            placeholder="Your name"
                            class="mt-1 w-full border-0 border-b-2 border-stone-deep/50 bg-transparent px-1 py-2 font-body text-lg text-wood-dark outline-none placeholder:text-wood-mid/40 focus:border-brass"
                        >
                    </label>
                    <label class="block">
                        <span class="font-display text-xs font-semibold uppercase tracking-widest text-wood-dark">Party / event name</span>
                        <input
                            type="text"
                            name="event_name"
                            placeholder="e.g. The Dragon’s Birthday"
                            class="mt-1 w-full border-0 border-b-2 border-stone-deep/50 bg-transparent px-1 py-2 font-body text-lg text-wood-dark outline-none placeholder:text-wood-mid/40 focus:border-brass"
                        >
                    </label>
                    <label class="block">
                        <span class="font-display text-xs font-semibold uppercase tracking-widest text-wood-dark">Class</span>
                        <select
                            name="event_type"
                            class="mt-1 w-full border-0 border-b-2 border-stone-deep/50 bg-transparent px-1 py-2 font-body text-lg text-wood-dark outline-none focus:border-brass"
                        >
                            <option value="">Choose your class…</option>
                            <option value="small-gathering">Small gathering</option>
                            <option value="themed-celebration">Themed celebration</option>
                            <option value="game-night">Game night</option>
                            <option value="watch-party">Watch party</option>
                            <option value="other">Other quest</option>
                        </select>
                    </label>
                    <label class="block">
                        <span class="font-display text-xs font-semibold uppercase tracking-widest text-wood-dark">Alignment</span>
                        <select
                            name="theme"
                            class="mt-1 w-full border-0 border-b-2 border-stone-deep/50 bg-transparent px-1 py-2 font-body text-lg text-wood-dark outline-none focus:border-brass"
                        >
                            <option value="">Theme preference…</option>
                            <option value="familiar-realms">From familiar realms</option>
                            <option value="westeros">Feasts of Westeros &amp; beyond</option>
                            <option value="originals">SideQuest originals</option>
                            <option value="surprise">Surprise me, chef</option>
                        </select>
                    </label>
                </div>
            </section>

            {{-- Ability scores --}}
            <section>
                <h2 class="font-display text-sm font-bold uppercase tracking-[0.25em] text-burgundy">Ability scores</h2>
                <div class="mt-4 grid grid-cols-2 gap-3 sm:grid-cols-4">
                    <label class="flex flex-col items-center rounded-lg border-2 border-stone-deep/60 bg-parchment-dark/40 px-3 py-4 text-center">
                        <span class="font-display text-[0.65rem] font-semibold uppercase tracking-widest text-wood-mid">Guests</span>
                        <input
                            type="number"
                            name="guest_count"
                            min="1"
                            placeholder="—"
                            class="mt-2 w-full bg-transparent text-center font-display text-2xl font-bold text-wood-dark outline-none placeholder:text-wood-mid/30"
                        >
                        <span class="mt-1 font-display text-[0.6rem] uppercase tracking-wider text-brass">Level</span>
                    </label>
                    <label class="flex flex-col items-center rounded-lg border-2 border-stone-deep/60 bg-parchment-dark/40 px-3 py-4 text-center">
                        <span class="font-display text-[0.65rem] font-semibold uppercase tracking-widest text-wood-mid">Budget</span>
                        <input
                            type="text"
                            name="budget"
                            placeholder="—"
                            class="mt-2 w-full bg-transparent text-center font-display text-2xl font-bold text-wood-dark outline-none placeholder:text-wood-mid/30"
                        >
                        <span class="mt-1 font-display text-[0.6rem] uppercase tracking-wider text-brass">Gold</span>
                    </label>
                    <label class="flex flex-col items-center rounded-lg border-2 border-stone-deep/60 bg-parchment-dark/40 px-3 py-4 text-center">
                        <span class="font-display text-[0.65rem] font-semibold uppercase tracking-widest text-wood-mid">Courses</span>
                        <input
                            type="number"
                            name="courses"
                            min="1"
                            max="12"
                            placeholder="—"
                            class="mt-2 w-full bg-transparent text-center font-display text-2xl font-bold text-wood-dark outline-none placeholder:text-wood-mid/30"
                        >
                        <span class="mt-1 font-display text-[0.6rem] uppercase tracking-wider text-brass">Feast</span>
                    </label>
                    <label class="flex flex-col items-center rounded-lg border-2 border-stone-deep/60 bg-parchment-dark/40 px-3 py-4 text-center">
                        <span class="font-display text-[0.65rem] font-semibold uppercase tracking-widest text-wood-mid">Lead days</span>
                        <input
                            type="number"
                            name="lead_days"
                            min="1"
                            placeholder="—"
                            class="mt-2 w-full bg-transparent text-center font-display text-2xl font-bold text-wood-dark outline-none placeholder:text-wood-mid/30"
                        >
                        <span class="mt-1 font-display text-[0.6rem] uppercase tracking-wider text-brass">Init</span>
                    </label>
                </div>
            </section>

            {{-- Languages / dietary --}}
            <section class="rounded-lg border-2 border-stone-deep/60 bg-parchment-dark/30 p-5 md:p-6">
                <h2 class="font-display text-sm font-bold uppercase tracking-[0.25em] text-burgundy">Languages known</h2>
                <p class="mt-1 text-sm italic text-wood-mid">Dietary needs &amp; restrictions</p>
                <div class="mt-4 grid gap-3 sm:grid-cols-2 md:grid-cols-3">
                    @foreach ([
                        'vegetarian' => 'Vegetarian',
                        'vegan' => 'Vegan',
                        'gluten-free' => 'Gluten-free',
                        'nut-free' => 'Nut-free',
                        'dairy-free' => 'Dairy-free',
                        'other' => 'Other (note below)',
                    ] as $value => $label)
                        <label class="flex cursor-pointer items-center gap-2 text-wood-dark">
                            <input type="checkbox" name="dietary[]" value="{{ $value }}" class="size-4 accent-burgundy">
                            <span>{{ $label }}</span>
                        </label>
                    @endforeach
                </div>
            </section>

            {{-- Contact / seal --}}
            <section class="rounded-lg border-2 border-stone-deep/60 bg-parchment-dark/30 p-5 md:p-6">
                <h2 class="font-display text-sm font-bold uppercase tracking-[0.25em] text-burgundy">Messenger details</h2>
                <div class="mt-5 grid gap-5 md:grid-cols-2">
                    <label class="block">
                        <span class="font-display text-xs font-semibold uppercase tracking-widest text-wood-dark">Scroll address (email)</span>
                        <input
                            type="email"
                            name="email"
                            placeholder="you@realm.example"
                            class="mt-1 w-full border-0 border-b-2 border-stone-deep/50 bg-transparent px-1 py-2 font-body text-lg text-wood-dark outline-none placeholder:text-wood-mid/40 focus:border-brass"
                        >
                    </label>
                    <label class="block">
                        <span class="font-display text-xs font-semibold uppercase tracking-widest text-wood-dark">Sending stone (phone)</span>
                        <input
                            type="tel"
                            name="phone"
                            placeholder="Optional"
                            class="mt-1 w-full border-0 border-b-2 border-stone-deep/50 bg-transparent px-1 py-2 font-body text-lg text-wood-dark outline-none placeholder:text-wood-mid/40 focus:border-brass"
                        >
                    </label>
                    <label class="block md:col-span-2">
                        <span class="font-display text-xs font-semibold uppercase tracking-widest text-wood-dark">Quest date</span>
                        <input
                            type="date"
                            name="event_date"
                            class="mt-1 w-full border-0 border-b-2 border-stone-deep/50 bg-transparent px-1 py-2 font-body text-lg text-wood-dark outline-none focus:border-brass"
                        >
                    </label>
                </div>
            </section>

            {{-- Backstory --}}
            <section class="rounded-lg border-2 border-stone-deep/60 bg-parchment-dark/30 p-5 md:p-6">
                <h2 class="font-display text-sm font-bold uppercase tracking-[0.25em] text-burgundy">Campaign notes</h2>
                <label class="mt-4 block">
                    <span class="sr-only">Special requests</span>
                    <textarea
                        name="notes"
                        rows="5"
                        placeholder="Tell the chef your lore: allergies not listed above, favorite dishes, vibe, table size, or anything else that shapes the feast…"
                        class="w-full resize-y rounded border border-stone-deep/40 bg-page/60 px-3 py-3 font-body text-base leading-relaxed text-wood-dark outline-none placeholder:text-wood-mid/45 focus:border-brass"
                    ></textarea>
                </label>
            </section>

            <div class="flex flex-col items-center gap-3 border-t-2 border-dashed border-stone-deep/40 pt-8">
                <button
                    type="submit"
                    class="inline-flex items-center justify-center rounded border-2 border-burgundy bg-burgundy px-10 py-3 font-display text-sm font-semibold uppercase tracking-widest text-parchment shadow-md transition hover:bg-header"
                >
                    Seal the quest
                </button>
                <p class="text-center text-sm italic text-wood-mid">Mockup only — the raven does not fly yet.</p>
            </div>
        </form>
    </article>
@endsection
