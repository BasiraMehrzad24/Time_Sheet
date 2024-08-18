<div class="p-5">
    <p class="my-4 mb-6"> Create Project </p>
    <form wire:submit.prevent="store" method="POST">
        @csrf


        <div class="mt-6">
            <x-label for="role" value="Role"></x-label>
            <x-input id="role" class="block mt-2 w-full" type="text" name="role" wire:model="role"></x-input>
            @error('role')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-6 flex justify-end items-center">
            <a class="mx-4 text-red-400 cursor-pointer text-sm" wire:click="$emit('closeModal')">Cancel</a>
            <a class="mx-4 text-red-600 cursor-pointer text-sm" wire:click="delete()">Remove</a>
            <x-button type="submit" class="w-auto px-3">Save Changes</x-button>
        </div>

    </form>

</div>