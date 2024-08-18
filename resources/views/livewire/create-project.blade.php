<div class="p-5">
    <p class="my-4 mb-6"> Create Project </p>
    <form wire:submit.prevent="store" method="POST">
        @csrf
   

        <div class="mt-6">
            <x-label for="title" value="Project Title"></x-label>
            <x-input id="title" class="block mt-2 w-full" type="text" name="title" wire:model="title"></x-input>
            @error('title')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-6">
            <x-label for="description" value="Description"/>
            <x-textarea id="description" class="block mt-2 w-full" rows="5" name="description" wire:model="description"/>
            @error('description')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-6 flex justify-end items-center">
            <a class="mx-4 text-red-400 cursor-pointer text-sm" wire:click="$emit('closeModal')">Cancel</a>
            <x-button type="submit" class="w-auto px-3">Create</x-button>
        </div>

    </form>

</div>