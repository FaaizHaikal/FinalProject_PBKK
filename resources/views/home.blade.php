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
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="w-full h-screen relative">
        <header class="antialiased shadow-sm">
            <x-navbar :username="$username" :email="$email" />
        </header>

        <div class=" flex w-full justify-center">

            <div id="default-carousel" class="relative w-[25%] mt-8" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-72 overflow-hidden rounded-xl">
                    <!-- Item 1 -->
                    <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                        <img src="{{ asset('image/girl-shoe1.jpg') }}"
                            class="absolute left-1/2 top-1/2 block w-full -translate-x-1/2 -translate-y-1/2 object-cover" alt="...">
                    </div>
                    <!-- Item 2 -->
                    <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                        <img src="{{ asset('image/girl-shoe2.jpg') }}"
                            class="absolute left-1/2 top-1/2 block w-full -translate-x-1/2 -translate-y-1/2 object-cover" alt="...">
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

        <div class="container mt-5">
        <div class="jumbotron text-center">
            <h1>Selamat datang di (insert nama toko here)</h1>
            <p class="lead">Temukan produk berkualitas dengan harga terjangkau!</p>
            <a href="#" class="btn btn-primary">Belanja Sekarang</a>
        </div>

        <div class="row mt-5">
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('img/rinso_rinso-deterjen-bubuk-molto-deterjen-bubuk--800-g-_full04.webp') }}"
                        class="card-img-top" alt="Product 1">
                    <div class="card-body">
                        <h5 class="card-title">Deterjen Rinso Bubuk 800g</h5>
                        <p class="card-text">Rp. 32.000</p>
                        <a href="#" class="btn btn-primary">Masukkan ke Keranjang</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('img/indomie_indomie-mie-goreng-aceh--90-gr-_full02.webp') }}"
                        class="card-img-top" alt="Product 2">
                    <div class="card-body">
                        <h5 class="card-title">Indomie Goreng Aceh 90g</h5>
                        <p class="card-text">Rp. 2.500</p>
                        <a href="#" class="btn btn-primary">Masukkan ke Keranjang</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('img/Kursi-LIDO-Kursi-Plastik-Kursi-Taman-Luar-Ruangan-dengan-Kursi-Sandaran-Tangan-Luar-Ruangan-Polipropilena-Cm.jpg') }}"
                        class="card-img-top" alt="Product 3">
                    <div class="card-body">
                        <h5 class="card-title">Kursi LIDO Plastik Putih</h5>
                        <p class="card-text">Rp. 250.000</p>
                        <a href="#" class="btn btn-primary">Masukkan ke Keranjang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="mt-5 text-center">
        <p>&copy; 2024 (nama toko). All Rights Reserved.</p>
    </footer>


        

    </div>


    <script>
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

</body>

</html>

</html>