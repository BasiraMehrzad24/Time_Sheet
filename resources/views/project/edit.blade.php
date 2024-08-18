<x-app-layout class="bg-gray-light min-w-fit">
    <div class="p-5 w-2/4 m-auto mt-28 bg-white rounded-md">
        <h3 class="mb-4 text-xl font-medium text-dark text-center">Update Your Project</h3>
        @foreach($errors->all() as $error)
            {{ $error }}
        @endforeach
        <form class="space-y-6" action="{{ route('projects.update', $project->id) }}" wire:submit.prevent="edit"
              method="post">
            @csrf
            @method('put')
            <div>
                <label class="block mb-1 text-sm font-medium text-dark font-bold ">Title</label>
                <input type="text" name="title" value="{{$project->title}}" wire:model="title"
                       class=" border border-gray text-dark text-sm rounded-lg w-full focus:ring-green focus:border-green">
            </div>
            <div>
                <label for="message"
                       class="block text-sm font-medium focus:ring-green focus:border-green lock w-full dark:bg-gray-600 dark:border-gray-500 font-bold text-dark">Description</label>
                <textarea name="description" wire:model="description" rows="4"
                          class="block h-40 w-full text-sm text-dark  focus:ring-green focus:border-green  rounded-lg border border-gray">
                {{$project->description}}
                </textarea>
            </div>
            <button type="submit"
                    class="w-full text-white bg-green  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Save
            </button>
        </form>
    </div>
</x-app-layout>