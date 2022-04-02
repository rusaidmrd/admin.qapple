@if ($paginator->hasPages())
    <div class="mt-6 flex justify-between items-center">
        <div class="flex items-center space-x-2 pagination">

            @if ($paginator->onFirstPage())
                <span class="flex items-center px-3 py-1 text-gray-400 bg-gray-100 text-sm rounded-md opacity-70 cursor-not-allowed">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                    </svg>
                </span>
            @else
                <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev" class="flex items-center px-3 py-1 text-gray-400 bg-gray-100 text-sm rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                    </svg>
                </button>
            @endif


            @foreach ($elements as $element)
                @if (is_string($element))
                    <span href="#" class="disabled px-3 py-1 text-gray-500 text-sm bg-gray-100 rounded-md hover:bg-primary-color hover:text-white">
                        {{ $element }}
                    </span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url )
                        @if ($page === $paginator->currentPage())
                            <span class="px-3 py-1 text-gray-500 text-sm bg-gray-100 rounded-md hover:bg-primary-color hover:text-white active">
                                {{ $page }}
                            </span>
                        @else
                            <button wire:click="gotoPage({{ $page }})" class="px-3 py-1 text-gray-500 text-sm bg-gray-100 rounded-md hover:bg-primary-color hover:text-white">
                                {{ $page }}
                            </button>
                        @endif

                    @endforeach
                @endif

            @endforeach

            @if ($paginator->hasMorePages())
                <button wire:click="nextPage" wire:loading.attr="disabled" rel="next" class="px-3 py-1 text-gray-400 bg-gray-100 text-sm rounded-md hover:bg-primary-color hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </button>
            @else
                <span class="px-3 py-1 text-gray-400 bg-gray-100 text-sm rounded-md hover:bg-primary-color hover:text-white opacity-70 cursor-not-allowed">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </span>
            @endif
        </div>
        <div>
            <p class="text-sm text-gray-500">Showing 1 to 10 of 250 results</p>
        </div>
    </div>
@endif
