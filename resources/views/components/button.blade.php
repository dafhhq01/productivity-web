@props(['href' => null, 'variant' => 'outline', 'type' => 'button'])

@php
    $base = 'inline-block text-sm text-center py-1.5 px-3 rounded-md';
    $style = $variant === 'solid'
        ? 'bg-black text-white border border-black'
        : 'border border-neutral-300 text-neutral-800';
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => "$base $style"]) }}>{{ $slot }}</a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => "$base $style"]) }}>{{ $slot }}</button>
@endif
