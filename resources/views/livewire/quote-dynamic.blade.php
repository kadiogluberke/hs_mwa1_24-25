<div>

    <div class="flex items-center space-x-4">
        @if($quote === '')
            <div wire:poll.100ms="newquote()">...</div>
        @else
            {{$quote}}
        @endif

        {{-- <a wire:click="newquote()" class="bg-pink-100 text-pink-500 p-2 mt-2 rounded cursor-pointer">New quote</a> --}}

        <!-- Refresh Button -->
        <button wire:click="newquote()" 
            class="text-gray-500 p-2">
            <svg xmlns="http://www.w3.org/2000/svg" 
                class="h-6 w-6" 
                fill="none" 
                viewBox="0 0 24 24" 
                stroke="currentColor"
                wire:loading.class="animate-spin">
                <path stroke-linecap="round" stroke-linejoin="round" 
                    d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
            </svg>
        </button>
    </div>

</div>
