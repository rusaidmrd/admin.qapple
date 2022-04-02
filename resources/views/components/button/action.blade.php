<button
    {{ $attributes->merge(['class' => 'px-2 py-1.5 border rounded-lg text-xs font-bold']) }}
>
    {{ $slot }}
</button>
