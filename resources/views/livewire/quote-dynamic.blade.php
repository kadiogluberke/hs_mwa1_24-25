<div>

    @if($quote === '')
        <div wire:poll.100ms="newquote()">...</div>
    @else
        {{$quote}}
    @endif

    <a wire:click="newquote()" class="bg-pink-100 text-pink-500 p-2 mt-2 rounded cursor-pointer">New quote</a>

</div>
