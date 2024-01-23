@php
$classes = 'rounded-full dark:bg-secondcolor-700 dark:text-white bg-firstcolor-900 text-white flex justify-center w-8 h-8 text-center';

if ($href ?? null) {
    $classes .= ' hover:dark:text-black';
}
@endphp

<span {{ $attributes->merge(['class' => $classes]) }}># <span class="pl-1 font-bold">{{ $position }}</span></span>
