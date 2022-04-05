
@props([
    'error'
])


<div
    x-data="{show:true}"
    x-show="show"
    class="flex justify-between items-center mb-3 text-sm font-bold text-red-700 bg-red-200 py-3 px-3 rounded-lg">
    <div class="flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
        </svg>
        <span class="ml-3">{{ $error }}</span>
    </div>
    <div>
        <button type="button" @click="show = false">
            <span class="text-2xl">&times;</span>
        </button>
    </div>
</div>
