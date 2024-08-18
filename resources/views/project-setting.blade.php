<x-app-layout>

    <div class="flex justify-between items-center">
        <p class="text-xl font-semibold">{{ $project->title }}</p>
    </div>
    <p class="text-base font-semibold mt-10 mb-4">Project Setting</p>
    <div class="bg-gray-50 p-5 rounded-lg">
        <form id="update-project" class="space-y-6" action="{{ route('projects.update', $project->id) }}" method="post">
            @csrf
            @method('put')

            <div class="mt-6">
                <x-label for="title" value="Project Title"></x-label>
                <x-input id="title" class="block mt-2 w-full" type="text" :value="$project->title" name="title"></x-input>
                @error('title')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-6">
                <x-label for="description" value="Description" />
                <x-textarea :value="$project->description" id="description" class="block mt-2 w-full" rows="5" name="description" />
                @error('description')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </form>

        @if(session()->has('message-basic-setting'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
                <p class="text-green-500 text-sm mt-1">{{ session('message-basic-setting') }}</p>
            </div>
        @endif

        <div class="mt-6 flex justify-end items-center">
            <form action="{{ route('projects.destroy', $project->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="mx-4 text-red-400 cursor-pointer text-sm" wire:click="$emit('closeModal')">
                    Archive
                    Project
                </button>
            </form>
            <x-button form="update-project" type="submit" class="w-auto px-3">Save Changes</x-button>
        </div>
    </div>


    <p class="text-base font-semibold mt-10 mb-4">Daily Report Allowed Days</p>
    <div class="bg-gray-50 p-5 rounded-lg">
        <form id="update-project" class="space-y-6" action="{{ route('projects.setting.update', $project->id) }}" method="post">
            @csrf
            @method('put')

            <div class="mt-6">
                <x-label for="days" value="Days"></x-label>
                <x-input id="days" class="block mt-2 w-full" type="text" :value="$project->num_allowed_days" name="days"></x-input>
                @error('days')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            @if(session()->has('message-daily-report'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
                <p class="text-green-500 text-sm mt-1">{{ session('message-daily-report') }}</p>
            </div>
            @endif

            <div class="mt-6 flex justify-end items-center">
                <x-button type="submit" class="w-auto px-3">Save Changes</x-button>
            </div>
        </form>
    </div>

    <div class="flex justify-between items-center mt-10 mb-4">
        <p class="text-base font-semibold"> Project Members </p>
        <x-button class="w-auto px-4" type="button"
                  onclick="Livewire.emit('openModal', 'add-project-member', {{ json_encode(['project' => $project]) }})">
            Add Members
        </x-button>
    </div>
    <div class="mt-4 flex flex-col">
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50 font-bold text-md">
                            <tr>
                                <td scope="col" class="py-3.5 pl-4 pr-3  text-left text-md font-semibold text-gray-900 sm:pl-6">
                                    Name
                                </td>
                                <td scope="col" class="py-3.5 pl-4 pr-3 text-left text-md font-semibold text-gray-900 sm:pl-6">
                                    Email
                                </td>
                                <td scope="col" class="py-3.5 pl-4 pr-3 text-left text-md font-semibold text-gray-900 sm:pl-6">
                                    Role
                                </td>
                                <td scope="col" class="py-3.5 pl-4 pr-3 text-left text-md font-semibold text-gray-900 sm:pl-6">

                                </td>
                            </tr>

                        </thead>
                        @foreach($users as $user)
                        <tbody class="divide-y hover:bg-green-lighter divide-gray-200 bg-white">
                            <tr>
                                <td class="whitespace-nowrap text-gray-dark py-4 pl-4 pr-3 text-sm sm:pl-6 flex">
                                    <img src=" {{$user->avatar}} " class="w-12 h-12 rounded-full">
                                    <div class="ml-3">
                                        <p class="font-semibold text-base">{{$user->name}}</p>
                                        <p class="text-sm text-gray-dark">{{ '@'.$user->username }}</p>
                                    </div>
                                </td>
                                <td class="whitespace-nowrap text-gray-dark py-4 pl-4 pr-3 text-sm sm:pl-6">
                                    <p class="truncate overflow-hidden">
                                        {{ $user->email }}
                                    </p>
                                </td>
                                <td class="whitespace-nowrap capitalize text-gray-dark py-4 pl-4 pr-3 text-sm sm:pl-6">
                                    {{ $user->pivot->role }}
                                </td>
                                <td class="whitespace-nowrap text-gray-dark py-4 pl-4 pr-3 text-sm sm:pl-6">
                                    <a class="text-red-400 cursor-pointer"
                                       onclick="Livewire.emit(
                                           'openModal', 'change-project-member-role' ,{{ json_encode(['project' => $project->id, 'user' => $user->id]) }}
                                           )"
                                       type="button">Modify</a>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>


    <p class="text-base font-semibold mt-10 mb-4">Auth Checking</p>
    <div class="space-y-6 bg-gray-50 px-4 py-4 rounded-lg focus:border-green mb-10">
        <form method="POST" action="{{route('auto-check-in.store', $project->id)}}">
            @csrf
            <div class="mt-6">
                <x-label for="time"> Hour</x-label>
                <x-input id="time" value="{{ $project->autoCheckIn->hour }}" class="block mt-2 w-full" type="time" name="hour" required />
            </div>

            <div class="mt-6">
                <x-label for="days">Days of week</x-label>
                @foreach(\Carbon\CarbonPeriod::create('2022-11-05', '2022-11-11') as $day)
                    <div class="my-2">
                        <label for="{{ $day }}" class="inline-flex items-center">
                            <input id="{{ $day }}" type="checkbox"
                                   {{ in_array($day->format('D'), $project->autoCheckIn->days ?? []) ? 'checked' : '' }} name="days[]"
                                   value="{{$day->format('D')}}"
                                   class="rounded border-gray text-green shadow-sm focus:border-green focus:ring focus:ring-green-light focus:ring-opacity-50">
                            <span class="ml-2 text-sm text-black">{{$day->format('l')}}</span>
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="flex justify-end">
                <x-button type="submit" class="w-auto px-4">
                    Save Changes
                </x-button>
            </div>
        </form>
    </div>

</x-app-layout>