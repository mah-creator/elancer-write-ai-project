@props([
'title' => 'Join Our Newsletter'
])

<div
    class="md:col-span-8 glass-card rounded-2xl p-12 flex flex-col justify-center border-white/5 bg-linear-to-br from-white/5 to-transparent">
    <h2 class="font-headline-lg text-headline-lg text-on-surface mb-4">{{ $title }}</h2>
    <p class="text-on-surface-variant font-body-lg max-w-xl mb-8">
        Join 24,000+ creators receiving our weekly digest on the intersection of cinema, tech, and
        minimalism.
    </p>
    <form class="flex flex-col md:flex-row gap-4 max-w-md">
        <div class="grow">
            <label class="block font-label-sm text-label-sm text-on-surface-variant mb-2">Email
                Address</label>
            <input
                class="w-full bg-surface-container-low border border-white/10 rounded-lg px-4 py-3 text-on-surface focus:border-primary focus:ring-1 focus:ring-primary transition-all outline-none"
                placeholder="hello@aether.com" type="email" />
        </div>
        <button
            class="self-end bg-on-surface text-surface py-3 px-8 rounded-lg font-bold hover:bg-primary hover:text-on-primary transition-colors h-12"
            type="submit">
            Subscribe
        </button>
    </form>
    {{ $helper ?? '' }}
</div>