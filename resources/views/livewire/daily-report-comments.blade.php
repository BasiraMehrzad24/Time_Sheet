<div>

    <button class="text-dark float-right text-sm px-1 py-2 rounded-md" wire:click="toggleComments()">Leave a comment</button>
    <p class="text-sm text-gray-dark"> {{ $comments->count() }} Comments </p>

    @if($showComments)
    <form wire:submit.prevent="store">
        <div class="flex space-x-2">
            <x-input class="block mt-6 w-full" type="text" name="comment" wire:model="comment" />
            <x-button class=" w-16 mt-6 text-xs" type="submit">comment</x-button>
        </div>
    </form>
    @foreach($comments as $comment)
    <div class="w-40">
        <p class="mt-4">{{ $comment->comment}}</p>
    </div>
    @endforeach
    @endif

</div>