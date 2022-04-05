<div
    x-data="{ show: false, message: 'This is the default message' }"
    x-on:notify.window="show = true; message = $event.detail;"
    x-show="show"
    class="flex justify-between items-center mb-3 text-sm font-bold text-green-800 bg-green-200 py-3 px-3 rounded-lg">
    <div class="flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
        </svg>
        <span x-text="message" class="ml-3"></span>
    </div>
    <div>
        <button type="button" @click="show = false">
            <span class="text-2xl">&times;</span>
        </button>
    </div>
</div>
