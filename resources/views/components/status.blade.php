
@props([
    'active'
])

@if($active)
    <span {{ $attributes->merge(['class' => 'text-green-800 bg-green-100 active:bg-green-100 border-green-100 py-1 px-5 rounded-md']) }}>{{ $slot }}</span>
@else
    <span {{ $attributes->merge(['class' => 'text-red-800 bg-red-100 active:bg-red-100 border-red-100 py-1 px-5 rounded-md']) }}>{{ $slot }}</span>
@endif

