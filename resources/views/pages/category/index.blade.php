<x-app-layout>
    <x-slot name="title">
        <h3 class="font-bold text-xl">{{ __('All Categories') }}</h3>
    </x-slot>

    <x-slot name="subtitle">
        <span class="text-gray-600">{{ __('Listed all the categories here ') }}</span>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    categories
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
