@props(['label' => null, 'name', 'type' => 'text', 'value' => ''])

<div class="mb-3">
    @if ($label)
        <label for="{{ $name }}" class="block text-sm mb-1">{{ $label }}</label>
    @endif
    <input 
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ old($name, $value) }}"
        {{ $attributes->merge(['class' => 'border rounded-md px-2 py-1.5 w-full text-sm ' . ($errors->has($name) ? 'border-red-400' : 'border-neutral-300')]) }}
        >
        @error($name)
            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
        @enderror
</div>
