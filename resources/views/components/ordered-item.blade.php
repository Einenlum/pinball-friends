@php
$href ??= null;

$classes = 'block my-4 border rounded-lg p-4 flex group';

if ($href) {
    $classes .= ' dark:group-hover:bg-firstcolor-900 dark:group-hover:text-white';
}
@endphp

<div class="group">
    <a {{ $attributes->merge(['class' => $classes]) }} @if($href) href="{{ $href }}" @endif>
        <x-position-circle class="mr-2" :position="$position" :href="$href ?? null"/>
        <span class="block dark:text-gray-300">
            {{ $slot }}
        </span>
    </a>
</div>
