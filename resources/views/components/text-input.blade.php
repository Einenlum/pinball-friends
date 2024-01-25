@php
$placeholder ??= $label;
$hideLabel ??= false;

$classes = 'shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-firstcolor-800 focus:ring-firstcolor-800 focus:ring-1';

if ($errors->has($name)) {
    $classes .= ' border-red-500';
}
@endphp

<div class="mb-4">
    @unless($hideLabel)
        <x-form-label :label="$label" :name="$name" />
    @endunless

    <x-form-error :name="$name" />

    <input {{ $attributes->merge(['class' => $classes]) }} id="{{ $name }}" name="{{ $name }}" type="text" placeholder="{{ $placeholder }}" value="{{ $value ?? '' }}" />
</div>
