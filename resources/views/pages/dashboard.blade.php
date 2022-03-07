<x-app-layout>
    <x-slot name="title">
        <h3 class="font-bold text-xl">{{ __('Dashboard') }}</h3>
    </x-slot>

    <x-slot name="subtitle">
        <span class="text-gray-600">{{ __('Detail information about your store ') }}</span>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
