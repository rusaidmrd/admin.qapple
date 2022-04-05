<div
    wire:ignore
    x-data
    x-init="
        FilePond.registerPlugin(FilePondPluginImagePreview);
        FilePond.setOptions({
            imagePreviewHeight : '200',
            allowMultiple: {{ isset($attributes['multiple']) ? 'true' : 'false' }},
            server: {
                process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                    @this.upload('{{ $attributes['wire:model'] }}', file, load, error, (event) => {
                        progress(event.lengthComputable, event.loaded, event.total)
                    })
                },
                revert: (filename, load) => {
                    @this.removeUpload('{{ $attributes['wire:model'] }}', filename, load)
                },
            },
        });
        var Pond = FilePond.create($refs.input);
        this.addEventListener('notify', e => {
            Pond.removeFiles();
        });
    "
>
    <input type="file" x-ref="input">
</div>
