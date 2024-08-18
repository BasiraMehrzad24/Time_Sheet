<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans">

    <div class="bg-white">
        <div class="relative overflow-hidden">
            <header class="relative">
                <div class="bg-gray-900 pt-6">
                    <nav class="relative mx-auto flex max-w-7xl items-center justify-between px-4 sm:px-6" aria-label="Global">
                   
                        <div class="hidden md:flex md:items-center md:space-x-6">

                            @if (Route::has('login'))
                            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                @auth
                                <a href="{{ url('/dashboard') }}" class=" ml-4 text-md hover:text-green text-white dark:text-gray-drak">Dashboard</a>
                                @else
                                <a href="{{ route('login') }}" class="ml-4 text-md hover:text-green text-white dark:text-gray-drak ">Log in</a>

                                @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-md hover:text-green text-white dark:text-gray-drak">Register</a>
                                @endif
                                @endauth
                            </div>
                            @endif
                        </div>
                    </nav>
                </div>
            </header>
            <main>
                <div class="bg-gray-900 pt-10 sm:pt-16 lg:overflow-hidden lg:pt-8 lg:pb-14">
                    <div class="mx-auto max-w-7xl lg:px-8">
                        <div class="lg:grid lg:grid-cols-2 lg:gap-8">
                            <div class="mx-auto max-w-md px-4 sm:max-w-2xl sm:px-6 sm:text-center lg:flex lg:items-center lg:px-0 lg:text-left">
                                <div class="lg:py-24">

                                    <h1 class="mt-4 text-4xl font-bold tracking-tight text-white sm:mt-5 sm:text-6xl lg:mt-6 xl:text-6xl">
                                        <span class="block">Easy</span>
                                        <span class="block bg-gradient-to-r from-teal-200 to-cyan-400 bg-clip-text pb-3 text-green sm:pb-5">Timesheet</span>
                                    </h1>
                                    <p class="text-base text-gray-dark sm:text-xl lg:text-lg xl:text-xl"> a better way to work from your home , esay timesheet allow you to do your best.</p>

                                </div>
                            </div>
                            <div class="mt-12 -mb-16 sm:-mb-48 lg:relative lg:m-0">
                                <div class="mx-auto max-w-md px-4 sm:max-w-2xl sm:px-6 lg:max-w-none lg:px-0">
                                    <!-- Illustration taken from Lucid Illustrations: https://lucid.pixsellz.io/ -->
                                    <img class="w-full lg:absolute lg:inset-y-0 lg:left-0 lg:h-full lg:w-auto lg:max-w-none" src="https://tailwindui.com/img/component-images/cloud-illustration-teal-cyan.svg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Feature section with screenshot -->
                <div class="relative bg-gray-50 pt-10 sm:pt-24 lg:pt-32">
                    <div class="mx-auto max-w-md px-4 text-center sm:max-w-3xl sm:px-6 lg:max-w-7xl lg:px-8">
                        <div>
                            <h2 class="text-lg -mt-10 font-semibold text-green">Useage</h2>
                            <p class="mx-auto mt-2 max-w-prose text-xl text-gray-dark"> for those software companies who want to have a
                                modern system for managing their employees work progress, report and projects and they will access
                                directly to these application from anywhere at any time to check their employee’s activity.
                            </p>
                        </div>
                        <div class="mt-8">
                            <img class="rounded-lg shadow-xl ring-opacity-5" src="{{asset('storage/image/timesheet.png')}}" alt="">
                        </div>
                    </div>
                </div>


                <!-- Testimonial section -->
                <div class="bg-gradient-to-r from-green-light to-green mt-24 lg:relative lg:z-10 lg:pb-0">
                    <div class="lg:mx-auto lg:grid lg:max-w-7xl lg:grid-cols-3 lg:gap-8 lg:px-8">
                        <div class="relative lg:-my-8">
                            <div aria-hidden="true" class="absolute inset-x-0 top-0 h-1/2 bg-white lg:hidden"></div>
                            <div class="mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:h-full lg:p-0">
                                <div class="aspect-w-10 aspect-h-6 overflow-hidden rounded-xl shadow-xl sm:aspect-w-16 sm:aspect-h-7 lg:aspect-none lg:h-full">
                                    <img class="object-cover lg:h-full lg:w-full" src="https://images.unsplash.com/photo-1520333789090-1afc82db536a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2102&q=80" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="mt-12 lg:col-span-2 lg:m-0 lg:pl-8">
                            <div class="mx-auto max-w-md px-4 sm:max-w-2xl sm:px-6 lg:max-w-none lg:px-0 lg:py-20">
                                <blockquote>
                                    <div>
                                        <svg class="h-12 w-12 text-white opacity-25" fill="currentColor" viewBox="0 0 32 32" aria-hidden="true">
                                            <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" />
                                        </svg>
                                        <p class="mt-6 text-2xl font-medium text-white">Using modern and online systems is one of the needs of all companies in the current situation,
                                            especially for managers of a company to manage employees, having better access to management,
                                            information of a company and as we think, this system can help a company manager to manage
                                            company’s employee, the number of working hours, daily reports, creating comments in reports
                                            and access to the database.</p>
                                    </div>

                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>



            </main>
            
        </div>
    </div>

</body>

</html>