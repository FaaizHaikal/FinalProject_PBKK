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
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap');

        /* Custom CSS for larger hero section and hover effects */
        .hero-carousel {
            width: 100%;
            /* Remove fixed height */
            position: relative;
            overflow: hidden;
        }

        .hero-carousel .carousel-item {
            height: 100%;
        }

        .hero-carousel img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            /* Ensures images keep aspect ratio and fit within the container */
            max-width: 100%;
            /* Prevents images from being wider than the carousel */
            max-height: 100%;
            /* Prevents images from being taller than the carousel */
        }

        .product-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            /* Add transitions for hover effects */
            border: none;
            /* Remove default card border */
            width: 280px;
            /* Adjust card width as needed */
        }

        .product-card:hover {
            transform: translateY(-5px);
            /* Move card slightly up on hover */
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            /* Add a more prominent shadow on hover */
        }

        .product-card img {
            border-top-left-radius: 0.375rem;
            /* Match card's top-left border radius */
            border-top-right-radius: 0.375rem;
            /* Match card's top-right border radius */
        }

        /* Gradient Background */
        body {
            background: linear-gradient(to right, #e0ffff, #f0f8ff);
            /* Light blue to lighter blue */
            font-family: 'Poppins', sans-serif;
        }

        .btn-add-to-cart {
            background-color: #007bff;
            /* Blue color */
            border-color: #007bff;
            /* Blue color */
            transition: background-color 0.3s ease, border-color 0.3s ease;
            padding: 0.2rem 0.4rem; /* Reduced padding for smaller size */
        }

        .btn-add-to-cart:hover {
            background-color: #0056b3;
            /* Darker blue on hover */
            border-color: #0056b3;
            /* Darker blue on hover */
        }
    </style>
</head>

<body>
    <div class="relative min-h-screen w-full">
        <header class="antialiased shadow-sm">
            <x-navbar :username="$username" :email="$email" />
        </header>

        <div class="flex w-full flex-col justify-center">
            <div class="hero-carousel">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                            aria-label="Slide 4"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"
                            aria-label="Slide 5"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('image/carousel-1.webp') }}" class="d-block w-100 img-fluid" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('image/carousel-2.webp') }}" class="d-block w-100 img-fluid" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('image/carousel-3.webp') }}" class="d-block w-100 img-fluid" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('image/carousel-4.webp') }}" class="d-block w-100 img-fluid" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('image/carousel-5.webp') }}" class="d-block w-100 img-fluid" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

        </div>

        <div
            class="my-8 w-full items-center bg-gradient-to-r bg-clip-text text-center text-2xl font-semibold text-transparent">
            <span class="text-black">
                Explore Our
            </span>
            <span class="multiple-text text-[#0092ed]"></span>
        </div>

        <!-- Featured Categories Section -->
        <div class="container mt-5">
            <h2 class="text-center mb-4">Shop by Category</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <a href="#" class="text-decoration-none">
                        <div class="card">
                            <img src="{{ asset('image/men-shoes.webp') }}" class="card-img-top" alt="Men's Shoes">
                            <div class="card-body text-center">
                                <h5 class="card-title">Men's Shoes</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mb-4">
                    <a href="#" class="text-decoration-none">
                        <div class="card">
                            <img src="{{ asset('image/women-shoes.webp') }}" class="card-img-top"
                                alt="Women's Shoes">
                            <div class="card-body text-center">
                                <h5 class="card-title">Women's Shoes</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mb-4">
                    <a href="#" class="text-decoration-none">
                        <div class="card">
                            <img src="{{ asset('image/kid-shoes.webp') }}" class="card-img-top" alt="Kid's Shoes">
                            <div class="card-body text-center">
                                <h5 class="card-title">Kid's Shoes</h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <p class="text-center mt-3">
                Discover a wide range of high-quality shoes for men, women, and children.
            </p>
        </div>

        <div class="mx-24">
            <div class="mt-12 flex flex-wrap justify-center gap-5 pb-10">
                @foreach($products as $product)
                <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden transform hover:-translate-y-1 transition duration-300 ease-in-out" style="width: 280px;">
                    <a href="#" class="block">
                        <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $product->image) }}" alt="product image">
                    </a>
                    <div class="p-4">
                        <a href="#">
                            <h5 class="text-lg font-semibold text-gray-900 line-clamp-1 hover:text-blue-600">{{ $product->name }}</h5>
                        </a>
                        <div class="mt-2 flex items-center justify-between">
                            <div class="flex items-center space-x-1">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                    </svg>
                                    <span class="ml-1 text-sm font-medium text-gray-500">5.0</span>
                                </div>
                            </div>
                            <span class="text-lg font-bold text-gray-900">{{ 'Rp.' . $product->price }}</span>
                        </div>
                        <button class="mt-4 w-full bg-blue-600 text-white font-medium py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300">
                            Add to Cart
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>


    <script>
        const typed = new Typed('.multiple-text', {
            strings: ['Latest Products', 'High Quality Shoes', 'Newest Models'],
            typeSpeed: 30,
            backSpeed: 20,
            backDelay: 2000,
            loop: true
        });
        window.addEventListener('user-logout', event => {
            localStorage.removeItem('user_id');
            console.log("logout")
        });

        document.getElementById('sign-out-btn').addEventListener('click', function() {
            console.log('Sign out button clicked!');
            fetch('signout', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        key: 'value'
                    }),
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