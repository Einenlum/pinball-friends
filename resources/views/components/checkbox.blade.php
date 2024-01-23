<div class="mb-4 flex">
  <x-form-label :label="$label" :name="$name" />

  <x-form-error name="{{ $name }}" />

  <input type="checkbox" class="shadow appearance-none rounded py-2 px-3 text-firstcolor-900 leading-tight focus:outline-none focus:shadow-outline" id="{{ $name }}" name="{{ $name }}" type="text" @if($checked ?? false) @endif checked />
</div>
