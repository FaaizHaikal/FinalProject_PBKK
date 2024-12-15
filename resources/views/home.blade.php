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

        body {
            background: linear-gradient(to right, #e0ffff, #f0f8ff);
            font-family: 'Poppins', sans-serif;
        }

        /* Hero Carousel */
        .hero-carousel {
            width: 100%;
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
        }

        /* Category Section */
        .category-section {
            background-color: #f8f9fa;
            padding: 30px 0;
        }

        .category-button {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            border: none;
            border-radius: 25px;
            background-color: #eee;
            color: #333;
            text-decoration: none;
            transition: background-color 0.3s, transform 0.2s;
        }

        .category-button:hover {
            background-color: #ddd;
            transform: translateY(-2px);
        }

        .category-button.active {
            background-color: #007bff;
            color: #fff;
        }

        /* Product Card */
        .product-card {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease, transform 0.5s ease;
            flex: 0 0 calc(25% - 20px);
            box-sizing: border-box; 
        }

        .product-card.show {
            opacity: 1;
            transform: translateY(0);
        }

        .product-card img {
            width: calc(100% - 20px);
            height: 200px;
            object-fit: cover;
            margin: 10px;
            margin-top: 20px;
            border-radius: 10px;
        }

        .product-card .card-body {
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .product-card h5 {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }

        .product-card .price {
            font-size: 1.1rem;
            font-weight: bold;
            color: black;
        }

        .btn-add-to-cart {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: background-color 0.3s;
            margin-top: auto;
        }

        .btn-add-to-cart:hover {
            background-color: #0056b3;
        }

        /* Explore Our Text Styling */
        .explore-our {
            text-align: center;
            margin: 40px 0;
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease, transform 0.5s ease;
            white-space: nowrap;
        }

        .explore-our.show {
            opacity: 1;
            transform: translateY(0);
        }

        .explore-our .text-black {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .multiple-text {
            font-size: 3rem;
            color: #0092ed;
            line-height: 1;            
        }

        /* Utility Class for Line Clamp */
        .line-clamp-1 {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
        }
    </style>
</head>

<body>
    <div class="relative">
        <header class="antialiased shadow-sm">
            <x-navbar :username="$username" :email="$email" />
        </header>

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
                        <img src="{{ asset('image/carousel-1.jpg') }}" class="d-block w-100 img-fluid" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('image/carousel-2.jpg') }}" class="d-block w-100 img-fluid" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('image/carousel-3.jpg') }}" class="d-block w-100 img-fluid" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('image/carousel-4.jpg') }}" class="d-block w-100 img-fluid" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('image/carousel-5.jpg') }}" class="d-block w-100 img-fluid" alt="...">
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

        <!-- Explore Our Section -->
        <div class="explore-our text-transparent">
            <div class="text-black">Explore Our</div>
            <span class="multiple-text text-[#0092ed]"></span>
        </div>

        <!-- Category Section -->
        <section class="category-section">
            <div class="container text-center">
                <h2 class="mb-4">Shop by Category</h2>
                <div class="d-flex justify-content-center flex-wrap mb-4">
                    <a href="#" class="category-button">Basket</a>
                    <a href="#" class="category-button">Boots</a>
                    <a href="#" class="category-button">Casual</a>
                    <a href="#" class="category-button">Flat Shoes</a>
                    <a href="#" class="category-button">Football</a>
                    <a href="#" class="category-button">Formal</a>
                    <a href="#" class="category-button">Heels</a>
                    <a href="#" class="category-button">Running</a>
                </div>
            </div>
        </section>

        <!-- Products Section -->
        <div class="container mt-5">
            <div class="row d-flex flex-wrap justify-content-between" id="product_container"> 
                @foreach($products as $product)
                    <div class="product-card mb-4" id="{{ $product->id }}">
                        <a href="#" class="block">
                            <img src="data:image/jpeg;base64,{{ $product->image }}" alt="product image" class="w-full">
                        </a>
                        <div class="card-body">
                            <a href="#">
                                <h5 class="line-clamp-1 hover:text-blue-600">{{ $product->name }}</h5>
                            </a>
                            <div class="flex items-center justify-between w-full mt-2">
                                <span class="price">Rp{{ number_format($product->price, 0, ',', '.') }}</span> <div class="flex items-center">
                                    <svg class="w-4 h-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20"> <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" /> </svg>
                                    <span class="ml-1 text-sm font-medium text-gray-500">5.0</span>
                                </div>
                            </div>
                            <form action="{{ route('cart.add', $product->id) }}" method="POST" class="add-to-cart-form" data-product-id="{{ $product->id }}">
                                @csrf
                                <button type="submit" class="btn btn-add-to-cart w-full mt-2">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

    <!-- Home.blade.php script -->
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

        document.getElementById('sign-out-btn').addEventListener('click', function () {
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
        
        // Scroll effects
        function revealOnScroll() {
            const elementsToReveal = document.querySelectorAll('.explore-our, .product-card');

            for (let element of elementsToReveal) {
                const elementTop = element.getBoundingClientRect().top;
                const windowHeight = window.innerHeight;

                if (elementTop < windowHeight - 100) { // Adjust the -100 value for how early the animation starts
                    element.classList.add('show');
                } else {
                    element.classList.remove('show');
                }
            }
        }

        window.addEventListener('scroll', revealOnScroll);
        revealOnScroll(); // Trigger on page load

        var _products;

        document.addEventListener('DOMContentLoaded',  async function() {
        _products = @json($products);

             // Select all forms with the 'add-to-cart-form' class
        const addToCartForms = document.querySelectorAll('.add-to-cart-form');

        addToCartForms.forEach(form => {
            form.addEventListener('submit', function (event) {
                event.preventDefault(); // Prevent the default form submission (redirect)

                const formData = new FormData(form);

                // Send an AJAX request
                fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest', // Optional: lets you know this is an AJAX request
                    }
                })
                .then(response => response.json()) // Assuming you return a JSON response from the controller
                .then(data => {
                    if (data.success) {
                        console.log(data)
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            });
        });
        });

        const input = document.getElementById('searchInput');
        input.addEventListener('input', async () => {
            filterItems(input.value)
        });

        const filterItems = async (searchTerm) => {
            const productContainer = document.getElementById('product_container');
            productContainer.innerHTML = ''

            const filteredItems = _products.filter(product => 
                product.name.toLowerCase().includes(searchTerm.toLowerCase())
            );
            filteredItems.forEach(DisplayProduct);
        };

        const DisplayProduct = (product) => {
            console.log(product);

            const productContainer = document.getElementById('product_container');
            const productCard = document.createElement('div');

            productCard.className = 'product-card mb-4 show';
            productCard.id = product.id
            productCard.innerHTML = `
                        <a href="#" class="block">
                            <img src="data:image/jpeg;base64,${product.image}" alt="product image" class="w-full">
                        </a>
                        <div class="card-body">
                            <a href="#">
                                <h5 class="line-clamp-1 hover:text-blue-600">${product.name}</h5>
                            </a>
                            <div class="flex items-center justify-between w-full mt-2">
                                <span class="price">Rp${product.price.toLocaleString()}</span> <div class="flex items-center">
                                    <svg class="w-4 h-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20"> <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" /> </svg>
                                    <span class="ml-1 text-sm font-medium text-gray-500">5.0</span>
                                </div>
                            </div>
                            <button class="btn btn-add-to-cart w-full mt-2">Add to Cart</button>
                        </div>
             `;
             productContainer.appendChild(productCard);
        }
        

    </script>

    <!-- navbar.blade.php script -->
    <script>
        const HandleImageSearch = () => {

        // Check if the popup is already created
        // Create the popup HTML using a template string
        const popupHTML = `
        <div id="popup" class="fixed inset-0 bg-gray-400 bg-opacity-40 flex items-center justify-center z-50 transition-all duration-300">
            <div class="bg-white w-fit p-4 rounded-lg flex justify-center items-center relative">
                <button onclick="closePopup()" class="absolute top-2 right-2 text-black">&times;</button>
                <form id="search_form">
                    <!-- File Input -->
                    <input
                        class="block cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 focus:outline-none lg:w-96 xl:w-[32rem]"
                        id="file_input" type="file" accept=".svg, .png, .jpg, .jpeg, .gif" onchange="previewImage(event)">
                    
                        <p class="ml-1 mt-1 text-sm text-gray-500" id="file_input_help">SVG, PNG, JPG, JPEG, or GIF</p>

                        <!-- Image Preview -->
                        <div id="imagePreviewContainer" class="mt-4 hidden">
                            <img id="imagePreview" class="max-w-full max-h-64 rounded-lg" />
                        </div>
                    
                    <div class="item-center flex justify-center" id="searchDiv" >
                        <button onclick="HandleSearchForm(event)"
                            class="mt-7 w-[40%] items-center rounded-lg bg-gradient-to-r from-purple-500 to-pink-500 py-2 text-sm font-semibold text-white hover:bg-gradient-to-l focus:outline-none focus:ring-4 focus:ring-purple-200">
                            Start Searching
                        </button>
                    </div>
                </form>
            </div>
        </div>

        `;

        // Insert the popup HTML into the body of the document
        document.body.innerHTML += popupHTML;  // Append the popup HTML at the end of the body
        }

        // Close the popup by removing it from the DOM
        const closePopup = () => {
        const popup = document.getElementById('popup');
        if (popup) {
            popup.remove();  // Remove the popup from the DOM
        }
        };

        const previewImage = (event) => {
            const fileInput = event.target;
            const file = fileInput.files[0]; 

            if (file) {
                const reader = new FileReader();

                // When the file is loaded, display it in the image preview
                reader.onload = async function(e) {
                    const imagePreview = document.getElementById('imagePreview');
                    const imagePreviewContainer = document.getElementById('imagePreviewContainer');

                    // Set the image source to the file data
                    imagePreview.src = e.target.result;

                    // Make the preview container visible
                    imagePreviewContainer.classList.remove('hidden');
                };

                // Read the file as a data URL
                reader.readAsDataURL(file);
            }
        }

        const HandleSearchForm = (event) => {
            event.preventDefault();
            const imagePreview = document.getElementById('imagePreview');
            //console.log(imagePreview.src)
            const searchDiv = document.getElementById('searchDiv');
            searchDiv.innerHTML = `
                <p class="text-lg text-center text-purple-500">Searching in progress...</p>
            `;

            fetch("https://classify.roboflow.com/shoes-categories/1?api_key=OmssS0x7eCppP0K0FVMU", {
            method: "POST",
            body: imagePreview.src,
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log(data);
                const category = data.top; // Category from the data object
                const newUrl = `/search-query/${category}`;
                window.location.href = newUrl;
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error.message);
            });
            }

        

    </script>
</body>

</html>