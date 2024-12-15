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
            <div class="item-center mt-8 text-center text-4xl font-semibold">
                Welcome to your store, {{ $store_name }}!
            </div>
            <div class="flex justify-center">
                <button id="add-product-btn" wire:click="setFormHidden"
                    class="m-6 block w-full text-white text-xl bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Add Product to Sale
                </button>
            </div>

            @if ($isFormHidden == false)
                <div id="product-form-modal" class="fixed inset-0 z-10 flex items-center justify-center bg-black bg-opacity-50">
                    <div class="relative w-full max-w-lg rounded-lg bg-white p-6 shadow-lg md:max-w-2xl lg:max-w-4xl max-h-[80%] overflow-y-auto">
                        <button id="close-modal-btn" wire:click="setFormHidden" class="absolute right-2 top-2 text-gray-500 hover:text-gray-700">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                                </path>
                            </svg>
                        </button>
                        <form class="w-full" wire:submit.prevent="AddProduct">
                            <div class="mb-5">
                                <label for="product-name"
                                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Product Name</label>
                                <input type="text" id="product-name" wire:model="product_name"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                    placeholder="" required />
                            </div>
                            <div class="mb-5">
                                <label for="product-description"
                                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Description
                                    (optional)</label>
                                <textarea id="product-description" rows="5" wire:model="product_description"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                    placeholder=""></textarea>
                            </div>
                            <div class="mb-5">
                                <label class="block text-sm font-medium text-gray-900 dark:text-white"
                                    for="product-image">Product Image</label>
                                <p class="mb-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG, or
                                    PNEG</p>
                                @if ($product_image_url)
                                    <img class="h-20 w-20 rounded-lg" src="data:image/jpeg;base64,{{ $product_image_url }}"
                                        alt="Product Image">
                                    <input wire:model="product_image"
                                        class="block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 focus:outline-none dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:placeholder-gray-400"
                                        aria-describedby="product-image-help" id="product-image" type="file"
                                        accept=".svg, .png, .jpg, .jpeg">

                                        <div id="imagePreviewContainer" class="mt-4 @if($product_image) block @else hidden @endif">
                                            <img id="imagePreviews" class="rounded-lg" src="{{ $product_image ? $product_image->temporaryUrl() : '' }}" />
                                        </div>

                                @else
                                    <input wire:model="product_image"
                                        class="block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 focus:outline-none dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:placeholder-gray-400"
                                        aria-describedby="product-image-help" id="product-image" type="file"
                                        accept=".svg, .png, .jpg, .jpeg" required onchange="handleAiGrade(event)">
                                        
                                        <div id="imagePreviewContainer" class="mt-4 @if($product_image) block @else hidden @endif">
                                            <img id="imagePreview" class="max-w-full max-h-64 rounded-lg" src="{{ $product_image ? $product_image->temporaryUrl() : '' }}" />

                                            <span class="mt-4 text-sm text-gray-500 font-semibold">AI Grade: </span>
                                            <span id="ai_grade" class="text-sm text-gray-500 font-semibold" > {{$ai_grade ? $ai_grade : 'Waiting ...'}} </span>
                                            <span id="ai_confs" class="text-sm text-gray-500 font-semibold" > {{$ai_conf ? $ai_conf: ''}} </span>
                                        </div>
                                @endif
                            </div>
                            <div class="mb-5">
                                <label for="stock-input" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Stocks:</label>
                                <div class="relative flex w-1/6 items-center">
                                    <button type="button" id="decrement-button" wire:click="decrementStock"
                                        class="h-11 rounded-s-lg border border-gray-300 bg-gray-100 p-3 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                                        <svg class="h-3 w-3 text-gray-900 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M1 1h16" />
                                        </svg>
                                    </button>
                                    <input type="number" id="stock-input" wire:model.lazy="product_stock"
                                        class="block h-11 w-full border-x-0 border-gray-300 bg-gray-50 py-2.5 text-center text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                        placeholder="1" min="1" required />
                                    <button type="button" id="increment-button" wire:click="incrementStock"
                                        class="h-11 rounded-e-lg border border-gray-300 bg-gray-100 p-3 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                                        <svg class="h-3 w-3 text-gray-900 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M9 1v16M1 9h16" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="mb-5">
                                <label for="product-category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                <select id="product-category" wire:model="product_category" class="block p-2.5 w-1/6 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <option value="" disabled selected>Choose here</option>
                                    <option value="Basket">Basket</option>
                                    <option value="Boots">Boots</option>
                                    <option value="Casual">Casual</option>
                                    <option value="Flat shoes">Flat shoes</option>
                                    <option value="Football">Football</option>
                                    <option value="Formal">Formal</option>
                                    <option value="Heels">Heels</option>
                                    <option value="Running">Running</option>
                                </select>
                            </div>
                            <div class="mb-5">
                                <label for="product-price"
                                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Price</label>
                                <div class="relative">
                                    <div class="pointer-events-none absolute inset-y-0 start-0 top-0 flex items-center ps-3.5">
                                        <span class="text-sm text-gray-500 dark:text-gray-400">IDR</span>
                                    </div>
                                    <input type="number" id="product-price" wire:model="product_price"
                                        class="z-20 block w-full rounded-s-lg border border-e-2 border-gray-300 border-e-gray-50 bg-gray-50 p-2.5 ps-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:border-e-gray-700 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500"
                                        placeholder="" required />
                                </div>
                            </div>
                            <button type="submit"
                                class="rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Put on sale
                            </button>
                        </form>
                    </div>
                </div>
            @endif


            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400 rtl:text-right">
                    <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-all-search" type="checkbox"
                                        class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600 dark:focus:ring-offset-gray-800">
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
                                Category
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
                    <tbody class="divide-y divide-gray-100 bg-white dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($products as $product)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-{{ $product->id }}" type="checkbox"
                                            class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600 dark:focus:ring-offset-gray-800">
                                        <label for="checkbox-{{ $product->id }}" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <th scope="row"
                                    class="whitespace-nowrap px-6 py-4 text-xl font-medium text-gray-900 dark:text-white">
                                    {{ $product->name }}
                                </th>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900 dark:text-gray-200">
                                        {{ $product->description }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900 text-xl dark:text-gray-200">
                                        {{ $product->category }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-xl text-gray-900 dark:text-gray-200">
                                        {{ $product->stock }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-xl text-gray-900 dark:text-gray-200">
                                        Rp. {{ $product->price }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900 dark:text-gray-200">
                                        <img class="h-20 w-20 rounded-lg" src="data:image/jpeg;base64,{{ $product->image }}"
                                            alt="{{ $product->name }}">
                                    </div>
                                </td>
                                <td class="flex items-center px-6 py-4 text-xl">
                                    <button wire:click="EditProduct({{ $product->id }})" class="font-medium text-blue-600 hover:underline dark:text-blue-500">Edit</button>
                                    <button wire:click="RemoveProduct({{ $product->id }})"
                                        class="ms-3 font-medium text-red-600 hover:underline dark:text-red-500">Remove</button>
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

    const handleAiGrade = async (event) => {
    event.preventDefault();

    // Get the image file from the input
    const fileInput = document.getElementById('product-image');
    const file = fileInput.files[0]; // Get the first file selected

    if (!file) {
        console.log("No file selected.");
        return; // Exit if no file is selected
    }

    // Create a FormData object to send the file
    const formData = new FormData();
    formData.append('file', file);  // Append the file to FormData

    // Send the file to the external API using fetch
    try {
        const response = await fetch("https://classify.roboflow.com/shoes-categories/1?api_key=OmssS0x7eCppP0K0FVMU", {
            method: "POST",
            body: formData, // Send the FormData
            headers: {
                // No need to set 'Content-Type' as it is handled by FormData
            }
        });

        if (!response.ok) {
            throw new Error('Network response was not ok');
        }

        const data = await response.json();  // Parse JSON response

        console.log(data);  // Log the data to see the AI grade
        // Assuming the response contains an 'ai_grade' field, update the AI grade in the UI
        document.getElementById('ai_grade').textContent = data.top || 'No grade available';
        @this.set('ai_grade', data.top);

        const aiConfElement = document.getElementById('ai_confs');
        if (aiConfElement) {
            aiConfElement.textContent = data.confidence;
            @this.set('ai_conf', data.confidence);  // Assuming you are using Livewire or similar
            console.log("dwada")
        }

    } catch (error) {
        console.error('Error fetching AI grade:', error.message);
        document.getElementById('ai_grade').textContent = 'Error occurred while grading.';
    }
}

    
</script>