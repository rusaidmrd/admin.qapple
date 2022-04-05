<div >
    <form wire:submit.prevent="save">
        <x-notification/>

        <div>
            @error('files.*')
                <x-notification.error error="{{ $message }}" />
            @enderror

            @error('files')
                <x-notification.error error="{{ $message }}" />
            @enderror
        </div>


        <div class="mb-5 flex items-center justify-between">
            <h1 class="text-2xl font-semibold">Upload images for {{ $product->name }}</h1>
            <x-button.primary class="py-3 text-base" type="submit">Upload images</x-button.primary>
        </div>
        <x-input.filepond wire:model="files" multiple />

    </form>
    <div class="mt-8">
        @if (count($product->images) != 0)
            <div class="bg-gray-cool rounded-md p-5 flex flex-wrap">
                @foreach ($product->images as $image)
                    <div class="h-72 w-56 mb-4 ml-4">
                        <img class="w-full h-full rounded-md border border-gray-100 object-cover  bg-white shadow-sm" src="{{ $image->url() }}" alt="product">
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
