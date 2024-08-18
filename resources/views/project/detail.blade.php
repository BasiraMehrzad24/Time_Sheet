<x-app-layout>
    <div class="flex justify-between items-center">
        <p class="text-xl font-semibold">{{ $project->title }}</p>
    </div>

    <p class="text-base font-semibold mt-10 mb-4">Daily Report</p>

    <div class="grid grid-cols-6 gap-2">

        <div class="col-span-4">
            <div class="rounded-lg bg-green-lighter p-5">
                <form method="post" action="{{ route('reports.store', ['project' => $project]) }}">
                    @csrf
                    <h3 class="text-base font-semibold">
                        what did you get done today?
                    </h3>
                    <div class="flex mt-6 space-x-3">
                        <div>
                            <x-label for="date" :value="__('Date')"></x-label>
                            <x-input id="text" class="block mt-2 w-full"
                                min="{{ now()->subDays($project->num_allowed_days)->format('Y-m-d')  }}"
                                max="{{ now()->format('Y-m-d') }}" type="date" aria-hidden="true" name="date"
                                :value="old('date') ?? now()->format('Y-m-d')"></x-input>
                        </div>
                        <div>
                            <x-label for="hour" :value="__('Number of Hours')"></x-label>
                            <label>
                                <select name="hours"
                                    class="mt-2 w-full text-sm rounded-md shadow-sm border-gray focus:border-green focus:ring focus:ring-green focus:ring-opacity-50">
                                    @foreach(range(1, 12) as $hour)
                                    <option @selected($hour==8) value="{{$hour}}">{{$hour}}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                    </div>

                    <div>
                        @error('date')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror

                        @error('hours')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <x-label for="report" :value="__('Report')"></x-label>
                        <x-textarea id="report" class="block mt-2 w-full" rows="5" name="report" />
                    </div>


                    <div class="flex justify-between items-center mt-6">
                        <div>
                            <label for="paid-leave" class="inline-flex items-center">
                                <input id="paid-leave" type="checkbox"
                                    class="rounded border-gray text-green shadow-sm focus:border-green focus:ring focus:ring-green-light focus:ring-opacity-50"
                                    name="paid_leave">
                                <span class="ml-2 text-sm text-red">{{ __('Paid Leave') }}</span>
                            </label>
                        </div>

                        <div>
                            <x-button class="bg-green px-4">
                                {{ __('Submit Report') }}
                            </x-button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="border-b border-gray-200 mt-6">
                <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                    <a href="{{ route('projects.show', ['project' => $project]) }}"
                        class="@if(request()->tab == null) border-green text-green @else border-transparent text-gray-500 @endif  whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                        aria-current="page">Latest Reports</a>

                    <a href="{{ route('projects.show', ['project' => $project, 'tab' => 'approved']) }}"
                        class="@if(request()->tab == 'approved') border-green text-green @else border-transparent text-gray-500 @endif  whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">Approved</a>

                    <a href="{{ route('projects.show', ['project' => $project ,  'tab' => 'pending']) }}"
                        class="@if(request()->tab == 'pending') border-green text-green @else border-transparent text-gray-500 @endif  whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">Pending</a>
                </nav>
            </div>

            <div class="mt-6">
                @foreach($reports->groupBy('date') as $key => $item)
                <p class="text-gray-dark text-sm">
                    {{ \Carbon\Carbon::parse($key)->format('d M Y') }}
                </p>
                @foreach($item as $report)
                <livewire:daily-report :report="$report" />
                @endforeach
                <hr class="my-6">
                @endforeach
            </div>

            <div class="w-full my-4">
                {{ $reports->links() }}
            </div>

        </div>

        <div class="col-span-2">

        </div>

    </div>

</x-app-layout>