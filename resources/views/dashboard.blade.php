<x-app-layout>
    <div class="flex justify-between items-center">
        <p class="text-xl font-semibold">Welcome 👋</p>
        <x-button onclick="Livewire.emit('openModal', 'create-project')" type="button" class="px-3">
            New Project
        </x-button>
    </div>
    <p class="text-base font-semibold mt-10 mb-4">All Projects</p>
    <div class="grid grid-cols-3 gap-7">
        @foreach ($projects as $project)
        <div class="bg-green-lighter p-5 rounded-lg">
            <a href="{{ route('projects.show', $project->id) }}">
                <div class="flex flex-col flex-1 h-full">
                    <div class="flex-1">
                        <p class="text-base font-semibold">{{ $project->title }}</p>
                        <p class="text-sm text-gray-500 mt-2 leading-6 ">{{ $project->description }}</p>
                    </div>
                    <div class="flex justify-between items-center mt-6">
                        <div class="isolate flex -space-x-3 overflow-hidden">
                            {{-- Take only 3 avatars of users and show the number for the rest --}}
                            @foreach ($project->users->take(3) as $user)
                            <img class="relative z-{{ $loop->index * 10}} inline-block h-8 w-8 rounded-full ring-2 ring-white"
                                src="{{ $user->avatar }}" alt="">
                            @endforeach

                            {{-- Get the count of the rest --}}
                            @if($project->users->count() > 3)
                            <div
                                class="relative flex items-center justify-center z-40 inline-block h-8 w-8 rounded-full ring-2 opacity-75 ring-white bg-gray-900">
                                <p class="text-xs text-white">
                                    + {{ $project->users->count() - 3 }}
                                </p>
                            </div>
                            @endif

                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</x-app-layout>