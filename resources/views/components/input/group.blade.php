
@props([
    'label',
    'for',
    'error' => false,
    'helpText' => false,
    'inline' => false,
    'paddingless' => false,
    'borderless' => false,
])

@if($inline)
    <div class="flex mb-5 items-center space-x-3">
        <label for="{{ $for }}" class="block font-semibold leading-5 text-gray-600">{{ $label }}</label>

        <div class="relative mt-2">
            {{ $slot }}

            @if ($error)
                <div class="mt-1 text-red-500 text-sm">{{ $error }}</div>
            @endif

            @if ($helpText)
                <p class="mt-2 text-sm text-gray-500">{{ $helpText }}</p>
            @endif
        </div>
    </div>
@else
    <div class="flex flex-col mb-5">
        <label for="{{ $for }}" class="block font-semibold leading-5 text-gray-600">
            {{ $label }}
        </label>

        <div class="mt-2">
            {{ $slot }}

            @if ($error)
                <div class="mt-1 text-red-500 text-sm">{{ $error }}</div>
            @endif

            @if ($helpText)
                <p class="mt-2 text-sm text-gray-500">{{ $helpText }}</p>
            @endif
        </div>
    </div>
@endif
