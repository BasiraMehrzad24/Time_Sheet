<x-app-layout>
    <x-slot name="header">

    </x-slot>

    {{-- personal information --}}
    <div class="container m-auto mt-28">

        <div class="w-1/2">
            <img src="{{ $user->avatar }}" alt="no image" class="rounded-full h-20 w-20">
            <form method="POST" action="{{ route('profile.update', $user->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div class="mt-6">
                    <x-label for="name" :value="__('Name')"/>
                    <x-input id="name" value="{{ $user->name }}" class="block mt-2 w-full" type="text" name="name"/>
                </div>

                <!-- Avatar -->
                <div class="mt-6">
                    <x-label for="avatar" :value="__('Avatar')"/>
                    <x-input id="avatar" class="block mt-2 w-full" type="file" name="avatar"/>
                </div>

                <div>
                    <x-button class="bg-green mt-6">
                        {{ __('Update') }}
                    </x-button>
                </div>


            </form>
        </div>
    </div>


</x-app-layout>