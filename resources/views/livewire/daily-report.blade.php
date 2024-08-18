<div class="mt-6">
    <div class="flex items-center justify-between">
        <div class="flex">
            <img src="{{ $report->user->avatar }}" alt="user avatar" class="w-10 h-10 rounded-full">
            <div class="ml-3">
                <p class="font-semibold text-sm">{{ $report->user->name  }}</p>
                <p class="text-xs text-gray-dark">{{ $report->project->users->find($report->user_id)->pivot->role }}</p>
            </div>
        </div>
        <div>

            @if($report->status == 2)
                <p class="text-sm mt-2 text-green">
                    Approved
                </p>
            @endif

            @if($report->status == 1)
                <p class="text-sm mt-2 text-orange">
                    Pending
                </p>
            @endif

            @if($report->status == 3)
                <p class="text-sm mt-2 text-red">
                    Rejected
                </p>
            @endif

        </div>
    </div>


    <p class="text-sm mt-5 leading-7">
        {{$report->report}}
        @if($report->paid_leave)
            <span class="text-red italic"> - Paid Leave</span>
        @endif
    </p>
    <div class="flex items-center space-x-3 mt-6">

        <span class="border rounded-md text-sm text-gray-dark px-3 py-2">
            {{ $report->hours }} Hours
        </span>


        @can('isAdmin', $report->project)
            <button class="w-28 text-green border border-1 text-sm px-1 py-2 rounded-lg border-gray bg-gray"
                    wire:click="approve">Approve
            </button>
        @endcan


        <button class="text-gray-800 w-28 border border-1 border-gray text-sm px-1 py-2 rounded-md"
                wire:click="toggleComments()">Comments
        </button>

        @can('isAdmin', $report->project)
            <button class="w-28 text-red text-sm" wire:click="reject">Reject</button>
        @endif
    </div>
    {{-- Repost comments --}}

    @if($showComments)
        <div class="bg-green-lighter p-5 rounded-md mt-2">
            <form wire:submit.prevent="store">
                <div class="flex items-center">
                    <x-input class="block w-full" type="text" placeholder="Your comment" name="comment"
                             wire:model="comment" required/>
                    <x-button class="w-auto px-4" type="submit">comment</x-button>
                </div>

            </form>
            <div class="mt-2">
                @foreach($comments as $comment)
                    <div class="my-2 bg-white p-2 rounded-lg">
                        <div class="flex items-center">
                            <img src="{{ $comment->user->avatar }}" alt="user avatar" class="w-5 h-5 rounded-full">
                            <span class="ml-2 text-sm">{{ $comment->user->name }}
                                <span class="text-xs text-gray-400">{{ $comment->created_at->diffForHumans() }}</span>
                            </span>
                        </div>
                        <div class="mt-2">
                            <p class="text-gray-700 text-sm"> {{ $comment->comment }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
