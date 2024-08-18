<x-app-layout class="bg-gray-light min-w-fit">
    <x-slot name="header">

    </x-slot>
    <div class="p-5 w-2/4 m-auto mt-28 bg-white rounded-md">
        <h3 class="mb-4 text-xl font-medium text-dark text-center">Change Role user</h3>
        @foreach($errors->all() as $error)
        {{ $error }}
        @endforeach

        <form method="get" action="{{ route('dashboard') }}">

            <div class="relative">
                <div>
                    <h3 class="text-lg font-bold">
                        Project
                    </h3>
                </div>

                <div class="flex absolute inset-y-0 left-0 items-center mt-4 pl-2 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-4 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input type="search" value="{{ request('search') }}" name="search" class="block w-full p-4 pl-8  border border-none text-sm text-gray-900  rounded-md " placeholder="Search">
                <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-green  font-medium rounded-md text-sm px-4 py-2 ">
                    Search
                </button>
            </div>
        </form>

        <form class="space-y-6" action="" wire:submit.prevent="edit" method="post">
            @csrf
            @method('put')
            <div>
                <label class="block mb-1 text-sm font-medium text-dark font-bold ">Role</label>
                <input type="text" name="role" class="border border-gray text-dark text-sm rounded-lg w-full focus:ring-green focus:border-green">
            </div>

            <button type="submit" class=" text-white bg-green  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Save
            </button>
            <a href="" type="button" class=" text-blak bg-gray  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4  py-2.5 text-center dark:bg-blue-600  dark:focus:ring-blue-800">
                Cancel
            </a>
        </form>
    </div>
</x-app-layout>