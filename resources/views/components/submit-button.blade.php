@php
$classes = 'bg-firstcolor-700 hover:bg-firstcolor-900 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer uppercase';
@endphp

<input type="submit" {{ $attributes->merge(['class' => $classes]) }} value="{{ $text }}"/>
