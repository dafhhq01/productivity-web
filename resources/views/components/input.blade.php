@props(['label' => null, 'name', 'type' => 'text', 'value' => '', 'icon' => null])

<div class="mb-4">
    @if ($label)
        <label for="{{ $name }}" class="block text-xs font-bold text-brand-ink mb-1.5 ml-1 font-outfit">{{ $label }}</label>
    @endif
    <div class="relative">
        @if($icon)
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-neutral-800">
                {!! $icon !!}
            </div>
        @endif
        <input 
            type="{{ $type }}"
            name="{{ $name }}"
            id="{{ $name }}"
            value="{{ old($name, $value) }}"
            {{ $attributes->merge(['class' => 'w-full h-14 bg-white border-flat rounded-3xl text-sm font-medium placeholder-neutral-400 focus:border-brand-indigo focus:outline-none ' . ($icon ? 'pl-12 pr-4' : 'px-4') . ' ' . ($errors->has($name) ? 'border-red-400' : '')]) }}
        >
    </div>
    @error($name)
        <p class="text-xs text-red-500 mt-1.5 ml-1">{{ $message }}</p>
    @enderror
</div>
