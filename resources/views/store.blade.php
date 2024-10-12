@section('title', 'Shop - My Store')

<div class="flex h-screen flex-col">
    <header class="antialiased shadow-sm">
        <x-navbar :username="$username" :email="$email" />
    </header>

    <div class="h-screen w-full antialiased">
        @if ($isHaveStore == false)
            <div class="item-center flex h-full justify-center">
                <div class="flex w-full flex-col items-center justify-center">
                    <div class="w-fit min-w-96 rounded-md border-2 border-red-200 px-10 pb-14 pt-6 shadow-md">
                        <div
                            class="mb-10 bg-gradient-to-r from-blue-500 to-purple-500 bg-clip-text text-center font-semibold text-transparent">
                            Create Your First Shop To Get Started !
                        </div>
                        <form class="w-full max-w-md" wire:submit.prevent="AddStore">
                            <div class="group relative z-0 w-full">
                                <input type="text" name="store_name" id="store_name" wire:model="store_name"
                                    class="peer block w-full appearance-none border-0 border-b-2 border-gray-400 bg-transparent px-0 py-2.5 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0"
                                    placeholder=" " required autocomplete="off" />
                                <label for="store_name"
                                    class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:start-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:font-medium peer-focus:text-blue-600 rtl:peer-focus:left-auto rtl:peer-focus:translate-x-1/4">Store
                                    Name</label>

                                <button type="submit"
                                    class="me-2 mt-8 w-full rounded-lg bg-cyan-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-cyan-800 focus:outline-none focus:ring-4 focus:ring-blue-300">Create</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        @endif

        @if ($isHaveStore)
            <div class="item-center text-center mt-8 font-semibold text-4xl">
                Welcome to your store, {{ $store_name }}!
            </div>
            <div class="flex justify-center">
                <button id="add-product-btn" class="block m-6 w-full p-3 bg-teal-400 border border-gray-200 rounded-lg shadow hover:bg-teal-300">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Add Product to Sale</h5>
                </button>
            </div>

            <div id="product-form-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-10 hidden">
                <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-lg md:max-w-2xl lg:max-w-4xl relative">
                    <button id="close-modal-btn" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                    <form class="w-full" wire:submit.prevent="AddProduct">
                        <div class="mb-5">
                            <label for="product-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name</label>
                            <input type="text" id="product-name" wire:model="product_name" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                        </div>
                        <div class="mb-5">
                            <label for="product-description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description (optional)</label>
                            <textarea id="product-description" rows="5" wire:model="product_description" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""></textarea>
                        </div>
                        <div class="mb-5">
                            <label class="block text-sm font-medium text-gray-900 dark:text-white" for="product-image">Product Image</label>
                            <p class="text-sm mb-1 text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG, or PNEG</p>
                            <input wire:model="product_image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="product-image-help" id="product-image" type="file" accept=".svg, .png, .jpg, .jpeg" required>
                        </div>
                        <div class="mb-5">
                            <label for="stock-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stocks:</label>
                            <div class="relative flex items-center w-1/6">
                                <button type="button" id="decrement-button" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                                    </svg>
                                </button>
                                <input type="number" id="stock-input" wire:model="product_stock" class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="1" min="1" required />
                                <button type="button" id="increment-button" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="mb-5">
                            <label for="product-price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
                                    <span class="text-gray-500 dark:text-gray-400 text-sm">IDR</span>
                                </div>
                                <input type="number" id="product-price" wire:model="product_price" class="block p-2.5 w-full z-20 ps-10 text-sm text-gray-900 bg-gray-50 rounded-s-lg border-e-gray-50 border-e-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-e-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="" required />
                            </div>
                        </div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Put on sale
                        </button>
                    </form>
                </div>
            </div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Product name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Stocks
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Price
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Image
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-100 dark:divide-gray-700">
                        @foreach ($products as $product)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-{{ $product->id }}" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-{{ $product->id }}" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <th scope="row" class="px-6 py-4 font-medium text-xl text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $product->name }}
                                </th>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900 dark:text-gray-200">
                                        {{ $product->description }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900 text-xl dark:text-gray-200">
                                        {{ $product->stock }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900 text-xl dark:text-gray-200">
                                        Rp. {{ $product->price }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900 dark:text-gray-200">
                                        <img class="w-20 h-20 rounded-lg" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                                    </div>
                                </td>
                                <td class="flex items-center text-xl px-6 py-4">
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        @endif
    </div>
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

    document.getElementById('add-product-btn').addEventListener('click', function () {
        document.getElementById('product-form-modal').classList.remove('hidden');
    });

    document.getElementById('close-modal-btn').addEventListener('click', function () {
        document.getElementById('product-form-modal').classList.add('hidden');
    });

    document.getElementById('increment-button').addEventListener('click', function () {
        const input = document.getElementById('stock-input');
        if (isNaN(parseInt(input.value))) {
            input.value = 1;
        }
        input.value = parseInt(input.value) + 1;

        input.dispatchEvent(new Event('input'));
    });

    document.getElementById('decrement-button').addEventListener('click', function () {
        const input = document.getElementById('stock-input');
        if (isNaN(parseInt(input.value)) || parseInt(input.value) < 1) {
            input.value = 1;
        }
        if (parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
        }

        input.dispatchEvent(new Event('input'));
    });

    document.getElementById('stock-input').addEventListener('input', function () {
        if (parseInt(this.value) < 1 || isNaN(parseInt(this.value))) {
            this.value = 1;
        }
    });
</script>