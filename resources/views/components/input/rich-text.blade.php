

<div
    class="rounded-md shadow-sm"
    x-data="{
        value: @entangle($attributes->wire('model')),
        isFocused() { return document.activeElement !== this.$refs.trix },
        setValue() { this.$refs.trix.editor.loadHTML(this.value) },
    }"
    x-init="setValue(); $watch('value', () => isFocused() && setValue())"
    x-on:trix-change="value = $event.target.value"
    {{ $attributes->whereDoesntStartWith('wire:model') }}
    wire:ignore
>
    <input id="x" type="hidden">
    <trix-editor x-ref="trix" input="x" class="form-textarea border-gray-300 px-3 py-2 rounded-md shadow-sm placeholder:text-gray-500 text-gray-500 block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5 h-56 overflow-y-scroll"></trix-editor>
</div>
