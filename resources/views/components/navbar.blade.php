
<div class="text-xs py-1 text-center bg-slate-200 font-medium text-gray-500">
    This is just a test site for demonstration purposes. Please contact us for more detail !
</div>
<nav class="border-gray-200 bg-zinc-100 px-4 py-3 lg:px-6 sticky top-0 z-50">
    
            <div class="flex flex-wrap items-center justify-between">
                <div class="flex items-center justify-start">
                    <button id="toggleSidebar" aria-expanded="true" aria-controls="sidebar"
                        class="mr-3 hidden cursor-pointer rounded p-2 text-gray-600 hover:bg-gray-100 hover:text-gray-900 lg:inline">
                        <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 16 12">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 1h14M1 6h14M1 11h7" />
                        </svg>
                    </button>
                    <button aria-expanded="true" aria-controls="sidebar"
                        class="mr-2 cursor-pointer rounded-lg p-2 text-gray-600 hover:bg-gray-100 hover:text-gray-900 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100 lg:hidden">
                        <svg class="h-[18px] w-[18px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                        <span class="sr-only">Toggle sidebar</span>
                    </button>
                    <a href="/home" class="mr-4 flex">
                        <img src="{{ asset('favicon/logo-64x64.png') }}" class="ml-2.5 mr-2.5 mt-0.5 h-8" />
                        <span class="self-center whitespace-nowrap text-2xl font-semibold">KickFlicker</span>
                    </a>
                </div>


                <div class="relative mx-10 mt-1 lg:flex-1">
                    <!-- Search Icon (Left) -->
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex justify-center items-center pl-3">
                        <svg class="h-4 w-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    
                    <!-- Input field -->
                    <input type="text" name="email" id="searchInput"
                        class="focus:ring-primary-500 focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-white p-2.5 pl-9 text-gray-900 sm:text-sm"
                        placeholder="Search">
                    
                    <!-- Camera Button (Right) -->
                    <button type="button" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400" onclick="HandleImageSearch()">
                        <img src="{{ asset('svg/camera.svg') }}" class="w-6 text-gray-400" />
                    </button>
                </div>




                <div class="flex items-center lg:order-2">
                    <!-- Notifications -->
                    <a type="button" href="/mystore"
                        class="ml-6 mr-3 rounded-lg bg-gradient-to-br from-blue-500 to-purple-400 p-2 text-xs font-bold text-white hover:bg-gradient-to-bl focus:outline-none focus:ring-4 focus:ring-pink-200">My
                        Store</a>

                    <button type="button" data-dropdown-toggle="notification-dropdown"
                        class="mr-1 rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 focus:ring-4 focus:ring-gray-300">
                        <span class="sr-only">View notifications</span>
                        <!-- Bell icon -->
                        <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 14 20">
                            <path
                                d="M12.133 10.632v-1.8A5.406 5.406 0 0 0 7.979 3.57.946.946 0 0 0 8 3.464V1.1a1 1 0 0 0-2 0v2.364a.946.946 0 0 0 .021.106 5.406 5.406 0 0 0-4.154 5.262v1.8C1.867 13.018 0 13.614 0 14.807 0 15.4 0 16 .538 16h12.924C14 16 14 15.4 14 14.807c0-1.193-1.867-1.789-1.867-4.175ZM3.823 17a3.453 3.453 0 0 0 6.354 0H3.823Z" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div class="z-50 my-4 hidden max-w-sm list-none divide-y divide-gray-100 overflow-hidden rounded bg-white text-base shadow-lg"
                        id="notification-dropdown">
                    </div>
                    <!-- Apps -->
                    <button type="button" data-dropdown-toggle="apps-dropdown"
                        class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 focus:ring-4 focus:ring-gray-300">
                        <span class="sr-only">View notifications</span>
                        <!-- Icon -->
                        <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 18 18">
                            <path
                                d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div class="z-50 my-4 hidden max-w-sm list-none divide-y divide-gray-100 overflow-hidden rounded bg-white text-base shadow-lg"
                        id="apps-dropdown">
                        <div class="block bg-gray-50 px-4 py-2 text-center text-base font-medium text-gray-700">
                            Apps
                        </div>
                        <div class="grid grid-cols-3 gap-4 p-4">
                            <a href="/" class="group block rounded-lg p-4 text-center hover:bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg"class="mx-auto mb-2 h-5 w-5 text-gray-400 group-hover:text-gray-500"><path fill="currentColor" d="M10 20v-6h4v6h5v-8h3L12 3L2 12h3v8z"/></svg>
                                <div class="text-sm font-medium text-gray-900">Home</div>
                            </a>
                            <a href="/cart" class="group block rounded-lg p-4 text-center hover:bg-gray-100">
                                <svg class="mx-auto mb-2 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 18 20">
                                        <path
                                            d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
                                    </svg>
                                <div class="text-sm font-medium text-gray-900">Cart</div>
                            </a>
                            <a href="#" class="group block rounded-lg p-4 text-center hover:bg-gray-100">
                                <svg class="mx-auto mb-2 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 18 18">
                                    <path
                                        d="M15.977.783A1 1 0 0 0 15 0H3a1 1 0 0 0-.977.783L.2 9h4.239a2.99 2.99 0 0 1 2.742 1.8 1.977 1.977 0 0 0 3.638 0A2.99 2.99 0 0 1 13.561 9H17.8L15.977.783ZM6 2h6a1 1 0 1 1 0 2H6a1 1 0 0 1 0-2Zm7 5H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Z" />
                                    <path
                                        d="M1 18h16a1 1 0 0 0 1-1v-6h-4.439a.99.99 0 0 0-.908.6 3.978 3.978 0 0 1-7.306 0 .99.99 0 0 0-.908-.6H0v6a1 1 0 0 0 1 1Z" />
                                </svg>
                                <div class="text-sm font-medium text-gray-900">Inbox</div>
                            </a>
                            <a href="#" class="group block rounded-lg p-4 text-center hover:bg-gray-100">
                                <svg class="mx-auto mb-2 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                                </svg>
                                <div class="text-sm font-medium text-gray-900">Profile</div>
                            </a>
                            <a href="#" class="group block rounded-lg p-4 text-center hover:bg-gray-100">
                                <svg class="mx-auto mb-2 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M18 7.5h-.423l-.452-1.09.3-.3a1.5 1.5 0 0 0 0-2.121L16.01 2.575a1.5 1.5 0 0 0-2.121 0l-.3.3-1.089-.452V2A1.5 1.5 0 0 0 11 .5H9A1.5 1.5 0 0 0 7.5 2v.423l-1.09.452-.3-.3a1.5 1.5 0 0 0-2.121 0L2.576 3.99a1.5 1.5 0 0 0 0 2.121l.3.3L2.423 7.5H2A1.5 1.5 0 0 0 .5 9v2A1.5 1.5 0 0 0 2 12.5h.423l.452 1.09-.3.3a1.5 1.5 0 0 0 0 2.121l1.415 1.413a1.5 1.5 0 0 0 2.121 0l.3-.3 1.09.452V18A1.5 1.5 0 0 0 9 19.5h2a1.5 1.5 0 0 0 1.5-1.5v-.423l1.09-.452.3.3a1.5 1.5 0 0 0 2.121 0l1.415-1.414a1.5 1.5 0 0 0 0-2.121l-.3-.3.452-1.09H18a1.5 1.5 0 0 0 1.5-1.5V9A1.5 1.5 0 0 0 18 7.5Zm-8 6a3.5 3.5 0 1 1 0-7 3.5 3.5 0 0 1 0 7Z" />
                                </svg>
                                <div class="text-sm font-medium text-gray-900">Settings</div>
                            </a>
                            <a href="#" class="group block rounded-lg p-4 text-center hover:bg-gray-100">
                                <svg class="mx-auto mb-2 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 20 16">
                                    <path
                                        d="M19 0H1a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1ZM2 6v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6H2Zm11 3a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1V8a1 1 0 0 1 2 0h2a1 1 0 0 1 2 0v1Z" />
                                </svg>
                                <div class="text-sm font-medium text-gray-900">Products</div>
                            </a>
                            <a href="#" class="group block rounded-lg p-4 text-center hover:bg-gray-100">
                                <svg class="mx-auto mb-2 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 11 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M1.75 15.363a4.954 4.954 0 0 0 2.638 1.574c2.345.572 4.653-.434 5.155-2.247.502-1.813-1.313-3.79-3.657-4.364-2.344-.574-4.16-2.551-3.658-4.364.502-1.813 2.81-2.818 5.155-2.246A4.97 4.97 0 0 1 10 5.264M6 17.097v1.82m0-17.5v2.138" />
                                </svg>
                                <div class="text-sm font-medium text-gray-900">Pricing</div>
                            </a>
                            <a href="#" class="group block rounded-lg p-4 text-center hover:bg-gray-100">
                                <svg class="mx-auto mb-2 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 16 20">
                                    <path
                                        d="M7 11H5v1h2v-1Zm4 3H9v1h2v-1Zm-4 0H5v1h2v-1ZM5 5V.13a2.98 2.98 0 0 0-1.293.749L.88 3.707A2.98 2.98 0 0 0 .13 5H5Z" />
                                    <path
                                        d="M14.066 0H7v5a2 2 0 0 1-2 2H0v11a1.97 1.97 0 0 0 1.934 2h12.132A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.934-2ZM13 16a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-6a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v6Zm-1-8H9a1 1 0 0 1 0-2h3a1 1 0 1 1 0 2Zm0-3H9a1 1 0 0 1 0-2h3a1 1 0 1 1 0 2Z" />
                                    <path d="M11 11H9v1h2v-1Z" />
                                </svg>
                                <div class="text-sm font-medium text-gray-900">Billing</div>
                            </a>
                            <a href="#" class="group block rounded-lg p-4 text-center hover:bg-gray-100">
                                <svg class="mx-auto mb-2 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 16 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 8h11m0 0-4-4m4 4-4 4m-5 3H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h3" />
                                </svg>
                                <div class="text-sm font-medium text-gray-900">Logout</div>
                            </a>
                        </div>
                    </div>
                    <button type="button"
                        class="mx-3 flex rounded-full border border-solid text-sm focus:ring-4 focus:ring-gray-300"
                        id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
                        <span class="sr-only">Open user menu</span>
                        <img class="h-8 w-8 rounded-full" src="{{ asset('image/profile-picture2.jpg') }}"
                            alt="user photo">
                    </button>
                    <!-- Dropdown menu -->
                    <div class="z-50 my-4 hidden w-56 list-none divide-y divide-gray-100 rounded bg-white text-base shadow"
                        id="dropdown">
                        <div class="px-4 py-3">
                            <span class="block text-sm font-semibold text-gray-900">{{ $username }}</span>
                            <span class="block truncate text-sm text-gray-500">{{ $email }}</span>
                        </div>
                        <ul class="py-1 text-gray-500" aria-labelledby="dropdown">
                            <li>
                                <a href="#" class="hover:bg-gray-10 block px-4 py-2 text-sm">My profile</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100">Account settings</a>
                            </li>
                        </ul>
                        <ul class="py-1 text-gray-500" aria-labelledby="dropdown">
                            <li>
                                <a href="#" class="flex items-center px-4 py-2 text-sm hover:bg-gray-100">
                                    <svg class="mr-2 h-4 w-4 text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                        <path
                                            d="M17.947 2.053a5.209 5.209 0 0 0-3.793-1.53A6.414 6.414 0 0 0 10 2.311 6.482 6.482 0 0 0 5.824.5a5.2 5.2 0 0 0-3.8 1.521c-1.915 1.916-2.315 5.392.625 8.333l7 7a.5.5 0 0 0 .708 0l7-7a6.6 6.6 0 0 0 2.123-4.508 5.179 5.179 0 0 0-1.533-3.793Z" />
                                    </svg>
                                    My likes
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center px-4 py-2 text-sm hover:bg-gray-100">
                                    <svg class="mr-2 h-4 w-4 text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="m1.56 6.245 8 3.924a1 1 0 0 0 .88 0l8-3.924a1 1 0 0 0 0-1.8l-8-3.925a1 1 0 0 0-.88 0l-8 3.925a1 1 0 0 0 0 1.8Z" />
                                        <path
                                            d="M18 8.376a1 1 0 0 0-1 1v.163l-7 3.434-7-3.434v-.163a1 1 0 0 0-2 0v.786a1 1 0 0 0 .56.9l8 3.925a1 1 0 0 0 .88 0l8-3.925a1 1 0 0 0 .56-.9v-.786a1 1 0 0 0-1-1Z" />
                                        <path
                                            d="M17.993 13.191a1 1 0 0 0-1 1v.163l-7 3.435-7-3.435v-.163a1 1 0 1 0-2 0v.787a1 1 0 0 0 .56.9l8 3.925a1 1 0 0 0 .88 0l8-3.925a1 1 0 0 0 .56-.9v-.787a1 1 0 0 0-1-1Z" />
                                    </svg>
                                    Collections
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center justify-between px-4 py-2 text-sm hover:bg-gray-100">
                                    <span class="flex items-center">
                                        <svg class="text-primary-600 mr-2 h-4 w-4" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="m7.164 3.805-4.475.38L.327 6.546a1.114 1.114 0 0 0 .63 1.89l3.2.375 3.007-5.006ZM11.092 15.9l.472 3.14a1.114 1.114 0 0 0 1.89.63l2.36-2.362.38-4.475-5.102 3.067Zm8.617-14.283A1.613 1.613 0 0 0 18.383.291c-1.913-.33-5.811-.736-7.556 1.01-1.98 1.98-6.172 9.491-7.477 11.869a1.1 1.1 0 0 0 .193 1.316l.986.985.985.986a1.1 1.1 0 0 0 1.316.193c2.378-1.3 9.889-5.5 11.869-7.477 1.746-1.745 1.34-5.643 1.01-7.556Zm-3.873 6.268a2.63 2.63 0 1 1-3.72-3.72 2.63 2.63 0 0 1 3.72 3.72Z" />
                                        </svg>
                                        Pro version
                                    </span>
                                    <svg class="h-2.5 w-2.5 text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 9 4-4-4-4" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                        <ul class="py-1 text-gray-500" aria-labelledby="dropdown">
                            <li>
                                <button id="sign-out-btn"
                                    class="flex w-full items-center px-4 py-2 text-sm hover:bg-gray-100">
                                    <span class="flex-1 text-left">Sign Out</span>
                                </button>
                            </li>

                        </ul>
                    </div>

                </div>
            </div>
        </nav>