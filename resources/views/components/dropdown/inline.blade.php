<div class="flex items-center space-x-3">
    <label for="perPage" class="block font-semibold leading-5 text-gray-400">Per Page</label>
    <div class="relative">
        <div class="flex">
            <select wire:model="perPage" id="perPage" {{ $attributes->merge(['class' => 'text-gray-400  form-select block w-full pl-3 pr-10 py-2 rounded-md text-base leading-6 border-gray-200 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5']) }}>
                {{ $slot }}
            </select>
        </div>
    </div>
</div>

