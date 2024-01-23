@php
$classes = 'text-2xl font-headerfont text-gray-700 dark:text-gray-300 mb-12 mx-auto text-center tracking-tighter uppercase';
@endphp

<h2 {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</h2>
