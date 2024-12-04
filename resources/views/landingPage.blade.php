@extends('layouts.basic')

@section('title', 'Shoe Store')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<div class="w-full h-screen bg-gray-100">
    <!-- Top Bar / Navigation Section -->
    <header class="bg-gray-900 text-white py-4">
        <div class="container mx-auto flex justify-between items-center px-2">
            <a href="/" class="text-2xl font-bold flex items-center text-yellow-400">
                <i class="fas fa-shoe-prints mr-4"></i> <!-- Shoe icon -->
                Kickverse
            </a>            
            <nav>
                <ul class="flex space-x-8">
                    <li>
                        <a href="/home" class="text-lg hover:text-yellow-400 transition duration-300 flex items-center">
                            <i class="fas fa-store mr-2"></i> Store
                        </a>
                    </li>
                    <li>
                        <a href="#shop-now" class="text-lg hover:text-yellow-400 transition duration-300 flex items-center">
                            <i class="fas fa-cogs mr-2"></i> Products
                        </a>
                    </li>
                    <li>
                        <a href="#about-us" class="text-lg hover:text-yellow-400 transition duration-300 flex items-center">
                            <i class="fas fa-users mr-2"></i> Company
                        </a>
                    </li>
                    <li>
                        <a href="#contact" class="text-lg hover:text-yellow-400 transition duration-300 flex items-center">
                            <i class="fas fa-envelope mr-2"></i> Contact
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>


    <!-- Hero Section -->
   <!-- Hero Section -->
<!-- Hero Section -->
<section class="bg-blue-500 text-white h-screen flex flex-col justify-center items-center">
    <h1 class="text-4xl md:text-5xl font-bold mb-4">Welcome to Kickverse</h1>
    <p class="text-lg md:text-xl mb-6">Find Your Perfect Pair of Shoes</p>

    <div class="flex flex-row gap-8">
        <!-- Explore Now Button (Scrolls down) -->
        <a href="#explore" class="bg-transparent border-2 border-white text-white py-2 px-6 rounded-lg text-xl hover:bg-white hover:text-gray-900 transition duration-300 mb-4">
            Explore Now
        </a>
    
        <!-- Sign Up Button -->
        <a href="/auth/register" class="bg-transparent border-2 border-white text-white py-2 px-6 rounded-lg text-xl hover:bg-white hover:text-gray-900 transition duration-300 mb-4">
            Sign Up Now
        </a>
    </div>

    <!-- Disclaimer Text -->
    <p class="text-sm text-white mt-4 opacity-70 mt-8">
        *Disclaimer: This is just a test site for demonstration purposes. Please contact us for more info
    </p>
</section>



    <!-- About Us Section -->
    <section id="about-us" class="py-16 bg-neutral-950">
    <div class="text-center max-w-4xl mx-auto">
        <h2 class="text-3xl font-bold text-yellow-400 mb-6">About Kickverse</h2>
        <p class="text-lg text-gray-200 mb-8">
            Kickverse is your one-stop-shop for high-quality shoes for every occasion. Whether you're looking for casual sneakers, performance-oriented running shoes, or stylish boots, we have it all. Our goal is to provide the perfect fit for every foot and make sure you step out in style.
        </p>
    </div>
</section>


    <!-- Footer Section -->
    <footer id="explore" class="bg-gray-900 text-white py-12">
    <div class="container mx-auto px-6 md:px-12">
        <!-- Footer Top Section: Logo and Quick Links -->
        <div class="flex flex-wrap justify-between">
            <!-- Logo Section -->
            <div class="w-full md:w-1/4 mb-8 md:mb-0">
                <a href="/" class="text-2xl font-bold flex items-center text-yellow-400">
                    Kickverse
                </a>
                <p class="mt-4 text-gray-400">Your ultimate destination for quality shoes. Explore our collection and find your perfect fit.</p>
            </div>

            <!-- Quick Links Section -->
            <div class="w-full md:w-3/4 grid grid-cols-2 md:grid-cols-3 gap-8 pl-6">
                <!-- Company Links -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Company</h3>
                    <ul class="space-y-2">
                        <li><a href="#about-us" class="hover:text-yellow-400 transition duration-300">About Us</a></li>
                        <li><a href="#news" class="hover:text-yellow-400 transition duration-300">News</a></li>
                        <li><a href="#careers" class="hover:text-yellow-400 transition duration-300">Careers</a></li>
                        <li><a href="#contact" class="hover:text-yellow-400 transition duration-300">Contact</a></li>
                    </ul>
                </div>

                <!-- Security & Policies -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Security & Policies</h3>
                    <ul class="space-y-2">
                        <li><a href="#safety" class="hover:text-yellow-400 transition duration-300">Safety Overview</a></li>
                        <li><a href="#security" class="hover:text-yellow-400 transition duration-300">Security</a></li>
                        <li><a href="#terms" class="hover:text-yellow-400 transition duration-300">Terms & Policies</a></li>
                        <li><a href="#privacy" class="hover:text-yellow-400 transition duration-300">Privacy Policy</a></li>
                        <li><a href="#terms-of-use" class="hover:text-yellow-400 transition duration-300">Terms of Use</a></li>
                    </ul>
                </div>

                <!-- Additional Policies -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Other Policies</h3>
                    <ul class="space-y-2">
                        <li><a href="#brand-guidelines" class="hover:text-yellow-400 transition duration-300">Brand Guidelines</a></li>
                        <li><a href="#residency" class="hover:text-yellow-400 transition duration-300">Residency</a></li>
                        <li><a href="#charter" class="hover:text-yellow-400 transition duration-300">Our Charter</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Footer Bottom Section: Social Media Links -->
        <div class="mt-12 border-t border-gray-700 pt-6 text-center">
            <p class="text-gray-400 text-sm">&copy; 2024 Kickverse. All rights reserved.</p>
            <div class="mt-4 flex justify-center space-x-6">
                <!-- Social Icons -->
                <a href="#" class="text-gray-400 hover:text-yellow-400 transition duration-300">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="text-gray-400 hover:text-yellow-400 transition duration-300">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="text-gray-400 hover:text-yellow-400 transition duration-300">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="text-gray-400 hover:text-yellow-400 transition duration-300">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
        </div>
    </div>
</footer>

</div>
@endsection
