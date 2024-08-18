<x-app-layout>
    <x-slot name="header">

    </x-slot>
    <div class="py-8 max-w-7xl mx-auto px-4 sm:px-6 ">
        <div class="max-w-7xl  sm:px-6 lg:px-8 ">
            <div class="bg-green-lighter py-4 px-4 overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" flex justify-between">
                    {{-- Quick actions --}}
                    <a href="{{route('dashboard')}} " class="hover:green" type="button">
                        <svg width="22" height="22" class="" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="11" cy="11" r="10.5" stroke="#80848F" />
                            <path d="M12.2456 6.13916C12.4143 6.30783 12.4296 6.57178 12.2916 6.75778L12.2456 6.81107L8.14739 10.9095L12.2456 15.0079C12.4143 15.1766 12.4296 15.4406 12.2916 15.6266L12.2456 15.6798C12.0769 15.8485 11.813 15.8639 11.627 15.7258L11.5737 15.6798L7.13931 11.2455C6.97063 11.0768 6.9553 10.8128 7.09331 10.6268L7.13931 10.5735L11.5737 6.13916C11.7592 5.95361 12.0601 5.95361 12.2456 6.13916Z" fill="#80848F" />
                        </svg>
                    </a>
                    <div>
                        <button id="dropdownMenuIconHorizontalButton" data-dropdown-toggle="dropdownDotsHorizontal" class=" float-right items-center p-2 text-sm font-medium text-center" type="button">
                            <svg class="w-6 h-6" aria-hidden="true" fill="#80848F" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path>
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownDotsHorizontal" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconHorizontalButton">
                                <li>
                                    <a href="{{ route('profile.edit', $user->id) }}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        Edit
                                    </a>
                                </li>
                                <li>
                                    <form action="{{ route('profile.destroy', $user->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class=" block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            Delete
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>

                {{-- personal information --}}
                <div class="container m-auto mt-28">

                    <div class="flex items-center flex-col">
                        <img src="{{ $user->avatar }}" alt="no image" class="rounded-full h-36 w-36">
                        <h1 class="font-bold mt-6"> {{ $user->name }}</h1>
                        <p class="text-gray-dark"> {{ $user->email }} </p>
                    </div>
                    {{-- List of projects --}}
                    <p class="mt-10 ml-8 text-md font-bold ">List Of Your Project</p>
                    <div class="mt-4 flex flex-col px-4 sm:px-6 lg:px-8">
                        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-300">
                                        <thead class="bg-gray-50 font-bold text-md">
                                        <tr>
                                            <td scope="col" class="py-3.5 pl-4 pr-3  text-left text-md font-semibold text-gray-900 sm:pl-6">
                                                Title
                                            </td>
                                            <td scope="col" class="py-3.5 pl-4 pr-3 text-left text-md font-semibold text-gray-900 sm:pl-6">
                                                Description
                                            </td>
                                            <td scope="col" class="py-3.5 pl-4 pr-3 text-left text-md font-semibold text-gray-900 sm:pl-6">
                                                Totle Hour
                                            </td>
                                        </tr>

                                        </thead>
                                        @foreach($user->projects as $project)
                                            <tbody class="divide-y hover:bg-green-lighter divide-gray-200 bg-white">
                                            <tr>
                                                <td class="whitespace-nowrap  text-gray-dark py-4 pl-4 pr-3 text-sm sm:pl-6">
                                                    {{ $project->title }} as {{ $project->pivot->role }}
                                                </td>
                                                <td class="whitespace-nowrap text-gray-dark py-4 pl-4 pr-3 text-sm sm:pl-6">
                                                    {{ $project->description }} as {{ $project->pivot->role }}
                                                </td>
                                                <td class="whitespace-nowrap text-gray-dark py-4 pl-4 pr-3 text-sm sm:pl-6">
                                                    {{$project->reports->where('user_id', auth()->id())->where('status', 2)->sum('hours')}}

                                                </td>
                                            </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- List of setting --}}
                    <div class="container m-auto mt-10">

                        <h1 class="mt-10 ml-8 text-md font-bold">Settings</h1>

                        <div class="grid grid-col-3 justify-items-center py-10">
                            Type notifaction recive| Email | website
                            <div class="">
                                <form action="{{route('notifaction.store')}}" method="post">
                                    @csrf
                                    <div class="space-x-2 flex">
                                        <?php $general = $user->notification;
                                        $submited = $general->where('name', 'Submited daily report')->first(); ?>
                                        <label>Submited daily report</label>&nbsp;&nbsp;&nbsp;&nbsp
                                        <input type="hidden" class="border-none bg-white rounded" name="name" value="Submited daily report">
                                        <input type="checkbox" name="mail_submit" @if($submited && $submited->mail == 1) checked @endif value="1">&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="website_submit" @if($submited && $submited->website ==1) checked @endif value="1">
                                        <br><br>
                                    </div>
                                    <div class="space-x-2 flex">
                                        <label>Approval of daily report</label>
                                        <?php $approve = $general->where('name', 'Approval of daily report')->first(); ?>
                                        <input type="hidden" name="name_approve" value="Approval of daily report">
                                        <input class="" type="checkbox" name="mail_approve" @if($approve && $approve->mail ==1 ) checked @endif value="1">&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input class="" type="checkbox" name="website_approve" @if($approve && $approve->website ==1 ) checked @endif value="1"><br><br>
                                    </div>
                                    <div class="space-x-2 flex">

                                        <label>Rejection of daily report</label>
                                        <?php $reject = $general->where('name', 'Rejection of daily report')->first(); ?>
                                        <input type="hidden" name="name_reject" value="Rejection of daily report">
                                        <input class="" type="checkbox" name="mail_reject" @if($reject && $reject->mail ==1 ) checked @endif value="1" >&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input class="" type="checkbox" name="website_reject" @if($reject && $reject->website ==1 ) checked @endif value="1"><br><br>
                                    </div>

                                    <div class="space-x-2 flex">

                                        <label>On comment</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <?php $comment = $general->where('name', 'On comment')->first(); ?>
                                        <input type="hidden" name="name_comment" value="On comment">
                                        <input class="" type="checkbox" name="mail_comment" @if($comment && $comment->mail ==1 ) checked @endif value="1">&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input class="" type="checkbox" name="website_comment" @if($comment && $comment->website ==1 ) checked @endif value="1"><br><br>

                                    </div>
                                    <div class="space-x-2 flex">

                                        <label>Add to a new project</label>&nbsp;&nbsp;&nbsp;&nbsp&nbsp;
                                        <?php $project = $general->where('name', 'Add to a new project')->first(); ?>
                                        <input type="hidden" name="name_project" value="Add to a new project">
                                        <input class="" type="checkbox" name="mail_project" @if($project && $project->mail ==1 ) checked @endif value="1">&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input class="" type="checkbox" name="website_project" @if($project && $project->website ==1 ) checked @endif value="1"><br><br>
                                    </div>
                                    <button type="submit" class=" text-white bg-green  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Save
                                    </button>

                                </form>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
</x-app-layout>