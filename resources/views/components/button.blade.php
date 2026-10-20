@props(['href' => null, 'variant' => 'outline', 'type' => 'button'])

@php
    $base = 'inline-flex items-center justify-center text-sm font-bold text-center py-2.5 px-4 rounded-full transition-all active:translate-y-0.5';
    $style = $variant === 'solid'
        ? 'bg-brand-indigo text-white border-flat shadow-flat active:shadow-none hover:bg-opacity-90'
        : 'bg-white border-flat text-brand-ink hover:bg-neutral-50';
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => "$base $style"]) }}>{{ $slot }}</a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => "$base $style"]) }}>{{ $slot }}</button>
@endif
