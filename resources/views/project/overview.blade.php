<x-app-layout class="bg-gray-light min-w-fit">

    <p class="font-bold mt-8 ml-14 text-xl">Overview</p>
    <div class="py-8 max-w-7xl mx-auto px-4 sm:px-6 ">
        <div class="max-w-7xl sm:px-6 lg:px-8 ">
            <div class="bg-green-lighter py-4 px-4 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between">
                    <p class="font-bold text-xl">Overview</p>
                    <div class="flex space-x-2">
                        <a class="flex"
                            href="{{ route('projects.overview', ['project' => request('project'), 'prev' => request('prev') + 1 ]) }}">
                            {{ now()->subMonths(request('prev') + 1)->format('F') }}
                            <svg width="22" height="22" class="" viewBox="0 0 22 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="11" cy="11" r="10.5" stroke="#80848F" />
                                <path
                                    d="M12.2456 6.13916C12.4143 6.30783 12.4296 6.57178 12.2916 6.75778L12.2456 6.81107L8.14739 10.9095L12.2456 15.0079C12.4143 15.1766 12.4296 15.4406 12.2916 15.6266L12.2456 15.6798C12.0769 15.8485 11.813 15.8639 11.627 15.7258L11.5737 15.6798L7.13931 11.2455C6.97063 11.0768 6.9553 10.8128 7.09331 10.6268L7.13931 10.5735L11.5737 6.13916C11.7592 5.95361 12.0601 5.95361 12.2456 6.13916Z"
                                    fill="#80848F" />
                            </svg>
                        </a>
                        @if(request('prev', 0) > 0)
                        <a class="flex"
                            href="{{ route('projects.overview', ['project' => request('project'), 'prev' => request('prev') - 1 ]) }}">
                            {{ now()->subMonths(request('prev') - 1)->format('F') }}
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle class="hover:stroke-green" cx="11" cy="11" r="10.5" stroke="#80848F" />
                                <path
                                    d="M9.14172 15.8583C8.96994 15.6865 8.95432 15.4177 9.09487 15.2283L9.14172 15.174L13.3155 11L9.14172 6.82602C8.96994 6.65423 8.95432 6.38542 9.09487 6.19599L9.14172 6.14172C9.31351 5.96994 9.58232 5.95432 9.77175 6.09487L9.82602 6.14172L14.3421 10.6579C14.5139 10.8296 14.5296 11.0985 14.389 11.2879L14.3421 11.3421L9.82602 15.8583C9.63706 16.0472 9.33069 16.0472 9.14172 15.8583Z"
                                    fill="#80848F" />
                            </svg>
                        </a>
                        @endif
                    </div>
                </div>

                <div class="space-y-4 sm:grid sm:grid-cols-3 sm:gap-6 sm:space-y-0 mt-8">
                    <span class="bg-yellow-100 px-8 py-4 flex text-dark md:h-20 text-xl font-semibold mr-2  rounded-md">
                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="24" cy="24" r="24" fill="#D5B451" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M24 14C29.514 14 34 18.486 34 24C34 29.514 29.514 34 24 34C18.486 34 14 29.514 14 24C14 18.486 18.486 14 24 14ZM24 15.5C19.313 15.5 15.5 19.313 15.5 24C15.5 28.687 19.313 32.5 24 32.5C28.687 32.5 32.5 28.687 32.5 24C32.5 19.313 28.687 15.5 24 15.5ZM23.6612 19.0954C24.0762 19.0954 24.4112 19.4314 24.4112 19.8454V24.2674L27.8162 26.2974C28.1712 26.5104 28.2882 26.9704 28.0762 27.3264C27.9352 27.5614 27.6862 27.6924 27.4312 27.6924C27.3002 27.6924 27.1682 27.6584 27.0472 27.5874L23.2772 25.3384C23.0512 25.2024 22.9112 24.9574 22.9112 24.6934V19.8454C22.9112 19.4314 23.2472 19.0954 23.6612 19.0954Z"
                                fill="white" />
                        </svg>
                        <div class="pl-2">
                            {{ $users->sum('reports_sum_hours') }} hrs <br>
                            <p class="text-gray-dark text-sm">
                                Totle Hour
                            </p>
                        </div>
                    </span>
                    <span class="bg-purple-100 px-8 py-4 flex text-dark md:h-20 text-xl font-semibold mr-2  rounded-md">
                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="24" cy="24" r="24" fill="#6D60CA" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M24 14C29.514 14 34 18.486 34 24C34 29.514 29.514 34 24 34C18.486 34 14 29.514 14 24C14 18.486 18.486 14 24 14ZM24 15.5C19.313 15.5 15.5 19.313 15.5 24C15.5 28.687 19.313 32.5 24 32.5C28.687 32.5 32.5 28.687 32.5 24C32.5 19.313 28.687 15.5 24 15.5ZM23.6612 19.0954C24.0762 19.0954 24.4112 19.4314 24.4112 19.8454V24.2674L27.8162 26.2974C28.1712 26.5104 28.2882 26.9704 28.0762 27.3264C27.9352 27.5614 27.6862 27.6924 27.4312 27.6924C27.3002 27.6924 27.1682 27.6584 27.0472 27.5874L23.2772 25.3384C23.0512 25.2024 22.9112 24.9574 22.9112 24.6934V19.8454C22.9112 19.4314 23.2472 19.0954 23.6612 19.0954Z"
                                fill="white" />
                        </svg>

                        <div class="pl-2">
                            {{ $users->sum('reports_sum_hours') }} hrs <br>
                            <p class="text-gray-dark text-sm">
                                Totle paid leave
                            </p>
                        </div>
                    </span>
                    <span class="bg-green-100 px-8 py-4 flex text-dark md:h-20 text-xl font-semibold mr-2  rounded-md">
                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="24" cy="24" r="24" fill="#47B783" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M26.9064 15C27.2338 15 27.4995 15.2657 27.4995 15.593L27.4998 16.2634C28.6543 16.3425 29.6132 16.738 30.2918 17.418C31.0327 18.1621 31.4225 19.2319 31.4186 20.5152V27.7287C31.4186 30.3633 29.7454 32 27.0531 32H20.3654C17.6731 32 16 30.3403 16 27.6686V20.5136C16 18.0286 17.4921 16.4335 19.9255 16.2637L19.926 15.593C19.926 15.2657 20.1917 15 20.5191 15C20.8464 15 21.1121 15.2657 21.1121 15.593L21.1118 16.2485H26.313L26.3134 15.593C26.3134 15.2657 26.5791 15 26.9064 15ZM30.2325 22.0403H17.186V27.6686C17.186 29.6975 18.3152 30.814 20.3654 30.814H27.0531C29.1034 30.814 30.2325 29.7181 30.2325 27.7287L30.2325 22.0403ZM27.2288 27.0156C27.5562 27.0156 27.8218 27.2813 27.8218 27.6086C27.8218 27.936 27.5562 28.2017 27.2288 28.2017C26.9015 28.2017 26.6326 27.936 26.6326 27.6086C26.6326 27.2813 26.8943 27.0156 27.2217 27.0156H27.2288ZM23.7201 27.0156C24.0474 27.0156 24.3131 27.2813 24.3131 27.6086C24.3131 27.936 24.0474 28.2017 23.7201 28.2017C23.3928 28.2017 23.1239 27.936 23.1239 27.6086C23.1239 27.2813 23.3856 27.0156 23.713 27.0156H23.7201ZM20.204 27.0156C20.5314 27.0156 20.7971 27.2813 20.7971 27.6086C20.7971 27.936 20.5314 28.2017 20.204 28.2017C19.8767 28.2017 19.6071 27.936 19.6071 27.6086C19.6071 27.2813 19.8696 27.0156 20.1969 27.0156H20.204ZM27.2288 23.9424C27.5562 23.9424 27.8218 24.2081 27.8218 24.5355C27.8218 24.8628 27.5562 25.1285 27.2288 25.1285C26.9015 25.1285 26.6326 24.8628 26.6326 24.5355C26.6326 24.2081 26.8943 23.9424 27.2217 23.9424H27.2288ZM23.7201 23.9424C24.0474 23.9424 24.3131 24.2081 24.3131 24.5355C24.3131 24.8628 24.0474 25.1285 23.7201 25.1285C23.3928 25.1285 23.1239 24.8628 23.1239 24.5355C23.1239 24.2081 23.3856 23.9424 23.713 23.9424H23.7201ZM20.204 23.9424C20.5314 23.9424 20.7971 24.2081 20.7971 24.5355C20.7971 24.8628 20.5314 25.1285 20.204 25.1285C19.8767 25.1285 19.6071 24.8628 19.6071 24.5355C19.6071 24.2081 19.8696 23.9424 20.1969 23.9424H20.204ZM26.313 17.4345H21.1118L21.1121 18.1952C21.1121 18.5225 20.8464 18.7882 20.5191 18.7882C20.1917 18.7882 19.926 18.5225 19.926 18.1952L19.9256 17.4525C18.1543 17.6013 17.186 18.675 17.186 20.5136V20.8543H30.2325L30.2325 20.5136C30.2357 19.5371 29.9731 18.778 29.4521 18.2562C28.9947 17.7974 28.326 17.5234 27.5001 17.4529L27.4995 18.1952C27.4995 18.5225 27.2338 18.7882 26.9064 18.7882C26.5791 18.7882 26.3134 18.5225 26.3134 18.1952L26.313 17.4345Z"
                                fill="white" />
                        </svg>

                        <div class="pl-2">
                            {{ $users->sum('reports_sum_hours') }} hrs <br>
                            <p class="text-gray-dark text-sm">
                                Totle Days
                            </p>
                        </div>
                    </span>
                    <span>
                </div>

                <div class="">

                    <p class="font-bold text-md mt-4">
                        List Of Employee
                    </p>
                    <div class="overflow-x-auto relative shadow-md mt-4 sm:rounded-lg">

                        <table class="w-full text-sm text-left">
                            <thead class="text-sm uppercase bg-green-50">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        NAME
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        EMAIL
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        REPORTS
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        TOTLE HOUR
                                </tr>
                            </thead>
                            @foreach($users as $user)
                            <tbody>
                                <tr class="bg-white border-b hover:bg-gray-50 ">

                                    <th scope="row"
                                        class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$user->name}}
                                    </th>

                                    <th scope="row"
                                        class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$user->email}}
                                    </th>

                                    <th scope="row"
                                        class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $user->reports_count }}
                                    </th>

                                    <th scope="row"
                                        class="py-4 px-6 font-medium  text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $user->reports_sum_hours }}
                                    </th>

                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
