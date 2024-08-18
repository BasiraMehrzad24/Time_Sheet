<div class="p-5">
    <p class="my-4 mb-6"> Add Member to project </p>
    <form wire:submit.prevent="store" method="POST">
        @csrf
        <div>
            <x-label for="" value="Choose User"/>
            <select wire:model="user_id" name="user_id"
                    class="mt-2 w-full text-sm rounded-md shadow-sm border-gray focus:border-green focus:ring focus:ring-green focus:ring-opacity-50">
                <option value="">--</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} {{ '@'.$user->username }}</option>
                @endforeach
            </select>
            @error('user_id')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-6">
            <x-label for="title" value="Role"></x-label>
            <x-input id="title" class="block mt-2 w-full" type="text" name="role" wire:model="role"></x-input>
            @error('role')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-6 flex justify-end items-center">
            <a class="mx-4 text-red-400 cursor-pointer text-sm" wire:click="$emit('closeModal')">Cancel</a>
            <x-button type="submit" class="w-auto px-3">Add user</x-button>
        </div>

    </form>

</div>