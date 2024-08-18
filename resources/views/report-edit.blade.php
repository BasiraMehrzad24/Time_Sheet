<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <br>
    <div class=" max-w-7xl w-full flex justify-center m-auto sm:px-6 lg:px-8  py-12  ">
        <div class="bg-white py-4 px-4 shadow-sm sm:rounded-lg">
            <h1 class="font-bold text-xl">Daily Report Update</h1>
            
            @foreach($errors->all() as $error)
            {{ $error }}
            @endforeach
            <form method="post" action="{{ route('reports.update', ['project' => $report->project_id, 'report' => $report]) }}" class="space-y-6 border border-gray px-4 py-4 rounded-lg focus:border-green">
                @csrf
                @method('put')
                <div>
                    <label class="block mb-1 text-sm font-medium text-dark font-bold ">Rapor</label>
                    <textarea type="text" id="report" name="report" class=" border border-gray text-dark text-sm rounded-lg w-full focus:ring-green focus:border-green">
                    {{$report->report}}
                    </textarea>
                </div>
                <select name="hour"  class="border border-none bg-gray text-dark text-sm rounded-lg focus:ring-green focus:border-green">
        

                    <option value="">
                        Chose hour
                    </option>
                    
                    <option  value="1">
                        2
                    </option>
                    <option value="2">
                        3
                    </option>
                    <option value="3">
                        4
                    </option>
                    <option value="4">
                        5
                    </option>
                    <option value="5">
                        6
                    </option>
                </select>
                <select name="date" value="{{$report->date}}"  type="date" class="border border-none bg-gray text-dark text-sm rounded-lg focus:ring-green focus:border-green">
                    <option value="">
                        Chose day
                    </option>
                    <option value="1">
                        Today
                    </option>
                    <option value="2">
                        Yesterday
                    </option>
                    <option value="3">
                        Before Yesterday
                    </option>
                </select>
                <!-- <input type="text" name="status"> -->
                <button type="submit" class=" py-2 px-4 rounded  bg-green border-none  shadow-md text-sm font-medium text-white">
                    Submit
                </button>
            </form>
        </div>
    </div>

</x-app-layout>