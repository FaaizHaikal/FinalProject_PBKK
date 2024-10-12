<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>E-Marketplace</title>
    <!-- Icon -->
    <link rel="icon" sizes="16x16" href="{{ asset('favicon/logo-16x16.png') }}" type="image/png" />
    <link rel="icon" sizes="24x24" href="{{ asset('favicon/logo-24x24.png') }}" type="image/png" />
    <link rel="icon" sizes="32x32" href="{{ asset('favicon/logo-32x32.png') }}" type="image/png" />
    <link rel="icon" sizes="48x48" href="{{ asset('favicon/logo-48x48.png') }}" type="image/png" />
    <link rel="icon" sizes="64x64" href="{{ asset('favicon/logo-64x64.png') }}" type="image/png" />
    <link rel="icon" sizes="128x128" href="{{ asset('favicon/logo-128x128.png') }}" type="image/png" />
    <link rel="icon" sizes="256x256" href="{{ asset('favicon/logo-256x256.png') }}" type="image/png" />

    <!-- JS/CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"
        integrity="sha512-+2pW8xXU/rNr7VS+H62aqapfRpqFwnSQh9ap6THjsm41AxgA0MhFRtfrABS+Lx2KHJn82UOrnBKhjZOXpom2LQ=="
        crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="relative h-screen w-full">
        <header class="antialiased shadow-sm">
            <x-navbar :username="$username" :email="$email" />
        </header>

        <div class="flex w-full flex-col justify-center">
            <div
                class="my-4 bg-gradient-to-r from-blue-600 to-purple-500 bg-clip-text text-center text-3xl font-semibold text-transparent">
                KickVerse
            </div>

            <div class="flex w-full flex-row items-center justify-center gap-12">
                <div id="default-carousel" class="relative w-[25%]" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative h-60 overflow-hidden rounded-xl">
                        <!-- Item 1 -->
                        <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                            <img src="{{ asset('image/girl-shoe1.jpg') }}"
                                class="absolute left-1/2 top-1/2 block w-full -translate-x-1/2 -translate-y-1/2 object-cover"
                                alt="...">
                        </div>
                        <!-- Item 2 -->
                        <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                            <img src="{{ asset('image/girl-shoe2.jpg') }}"
                                class="absolute left-1/2 top-1/2 block w-full -translate-x-1/2 -translate-y-1/2 object-cover"
                                alt="...">
                        </div>
                    </div>
                    <!-- Slider indicators -->
                    <div class="absolute bottom-2 left-1/2 z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse">
                        <button type="button" class="h-3 w-3 rounded-full" aria-current="true" aria-label="Slide 1"
                            data-carousel-slide-to="0"></button>
                        <button type="button" class="h-3 w-3 rounded-full" aria-current="false" aria-label="Slide 2"
                            data-carousel-slide-to="1"></button>
                    </div>
                </div>
                <div id="default-carousel" class="relative w-[25%]" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative h-60 overflow-hidden rounded-xl">
                        <!-- Item 1 -->
                        <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                            <img src="{{ asset('image/nike-1.jpg') }}"
                                class="absolute left-1/2 top-1/2 block w-full -translate-x-1/2 -translate-y-1/2 object-cover"
                                alt="...">
                        </div>
                        <!-- Item 2 -->
                        <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                            <img src="{{ asset('image/nike.jpg') }}"
                                class="absolute left-1/2 top-1/2 block w-full -translate-x-1/2 -translate-y-1/2 object-cover"
                                alt="...">
                        </div>
                    </div>
                    <!-- Slider indicators -->
                    <div class="absolute bottom-2 left-1/2 z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse">
                        <button type="button" class="h-3 w-3 rounded-full" aria-current="true" aria-label="Slide 1"
                            data-carousel-slide-to="0"></button>
                        <button type="button" class="h-3 w-3 rounded-full" aria-current="false" aria-label="Slide 2"
                            data-carousel-slide-to="1"></button>
                    </div>
                </div>
            </div>

        </div>

        <div
            class="my-8 w-full items-center bg-gradient-to-r bg-clip-text text-center text-2xl font-semibold text-transparent">
            <span class="text-black">
                Explore Our
            </span>
            <span class="multiple-text text-[#0ef]"></span>
        </div>

        <div class="mx-24">
            <div class="mt-12 flex justify-center sm:flex-row md:flex-wrap md:space-x-5 md:space-y-5 gap-3 pb-10">
                @foreach($products as $product)
                    <div class="w-full max-w-80 rounded-lg shadow">
                        <a href="#" class="w-full h-fit flex justify-center items-center content-center rounded-lg my-4">
                            <img class="rounded-lg max-h-44 object-cover" src="{{ asset('storage/' . $product->image) }}"
                                alt="product image" />
                        </a>
                        <div class="px-5 pb-4">
                            <a href="#">
                                <h5 class="text-xl font-semibold tracking-tight text-gray-900">{{ $product->name }} </h5>
                            </a>
                            <div class="flex items-center mt-2.5 mb-[1.5rem]">
                                <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                    <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                    </svg>
                                    <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                    </svg>
                                    <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                    </svg>
                                    <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                    </svg>
                                    <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                    </svg>
                                </div>
                                <span
                                    class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded ms-3">5.0</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-xl ml-1 font-bold text-gray-900">{{'$' . $product->price }}</span>
                                <a href="#"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center">Add
                                    to cart</a>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>

        </div>




    </div>


    <script>
        const typed = new Typed('.multiple-text', {
            strings: ['Latest Products', 'High Quality Shoes', 'Newest Models'],
            typeSpeed: 100,
            backSpeed: 120,
            backDelay: 1000,

            onComplete: () => {
                setTimeout(() => {
                    typed.reset()
                    typed.start()
                }, 2000);
            },
        });
        window.addEventListener('user-logout', event => {
            localStorage.removeItem('user_id');
            console.log("logout")
        });

        document.getElementById('sign-out-btn').addEventListener('click', function () {
            console.log('Sign out button clicked!');
            fetch('signout', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ key: 'value' }),
            })
                .then(response => {
                    if (response.redirected) {
                        localStorage.removeItem('user_id');
                        window.location.href = response.url;
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"
        integrity="sha512-+2pW8xXU/rNr7VS+H62aqapfRpqFwnSQh9ap6THjsm41AxgA0MhFRtfrABS+Lx2KHJn82UOrnBKhjZOXpom2LQ=="
        crossorigin="anonymous"></script>
</body>

</html>

</html>