@php
$classes = 'text-3xl font-bold tracking-widest text-gray-900 dark:text-gray-100 my-8 mx-auto text-center';
@endphp

<h1 {{ $attributes->merge(['class' => $classes]) }}>
    <span class="font-headerfont dark:text-amber-400">{{ $slot }}</span>


    @if ($additionalInfo ?? null)
        <p class="text-sm font-normal mt-4 no-underline">
            {{ $additionalInfo }}
        </p>
    @endif
</h1>
