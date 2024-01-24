@php
    $items = build_breadcrumb($attributes->get('model'));
    $textSize = 'text-sm';
@endphp

<nav aria-label="breacrumb" class="mt-4 mb-8 text-sm">
    <ul class="dark:text-white uppercase flex flex-wrap gap-x-1 tracking-wide font-cursive">
        <div class="mr-2"><span class="i-lucide-arrow-right-left text-gray-400 h-3"></span></div>
        <x-breadcrumb-item :path="route('home')" name="Home" />
        @foreach($items as $item)
            @if ($loop->last)
                <li>{{ $item->name }}</li>
            @else
                <x-breadcrumb-item :path="$item->path" :name="$item->name" />
            @endif
        @endforeach
    </ul>
</nav>
