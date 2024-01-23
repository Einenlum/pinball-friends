<div class="mb-4">
    <x-form-label :label="$label" :name="$name" />

    <x-form-error name="{{ $name }}" />

    <input class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-firstcolor-800 focus:ring-firstcolor-800 focus:ring-1 @error($name) border border-red-500 @enderror" id="{{ $name }}" name="{{ $name }}" type="text" placeholder="{{ $label }}" value="{{ $value ?? '' }}" />
</div>
