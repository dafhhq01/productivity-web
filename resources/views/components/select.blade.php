@props(['label' => null, 'name'])

<div class="mb-3">
    @if ($label)
        <label for="{{ $name }}" class="block text-sm mb-1">{{ $label }}</label>
    @endif

    <select 
        name="{{ $name }}" 
        id="{{ $name }}"
        {{ $attributes->merge(['class' => 'border rounded-md px-2 py-2.5 w-full text-sm ' . ($errors->has($name) ? 'border-red-400' : 'border-neutral-300')]) }}
        >
        {{ $slot }}
    </select>

    @error($name)
        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
    @enderror

</div>
