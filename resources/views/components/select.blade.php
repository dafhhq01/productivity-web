@props(['label' => null, 'name'])

<div class="mb-4">
    @if ($label)
        <label for="{{ $name }}" class="block text-xs font-bold text-brand-ink mb-1.5 ml-1 font-outfit">{{ $label }}</label>
    @endif

    <select 
        name="{{ $name }}" 
        id="{{ $name }}"
        {{ $attributes->merge(['class' => 'w-full h-14 bg-white border-flat rounded-3xl px-4 text-sm font-medium focus:border-brand-indigo focus:outline-none ' . ($errors->has($name) ? 'border-red-400' : '')]) }}
    >
        {{ $slot }}
    </select>

    @error($name)
        <p class="text-xs text-red-500 mt-1.5 ml-1">{{ $message }}</p>
    @enderror
</div>
