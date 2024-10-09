<head>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
  <div class="flex items-center justify-center min-h-screen px-4">
    <form class="w-full max-w-lg md:max-w-2xl lg:max-w-4xl">
      <div class="mb-5">
        <label for="product-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name</label>
        <input type="product-name" id="product-name" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
      </div>
      <div class="mb-5">
        <label for="product-description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
        <textarea id="product-description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""></textarea>
      </div>
      <div class="mb-5">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="product-image">Product Image</label>
        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="product-image-help" id="product-image" type="file" required>
      </div>
      <label for="product-price" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Your Email</label>
      <div class="mb-5">
        <label for="quantity-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantity:</label>
        <div class="relative flex items-center max-w-[8rem]">
            <button type="button" id="decrement-button" data-input-counter-decrement="quantity-input" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                </svg>
            </button>
            <input type="text" id="quantity-input" data-input-counter class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0" required />
            <button type="button" id="increment-button" data-input-counter-increment="quantity-input" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
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
          <input type="number" id="product-price" class="block p-2.5 w-full z-20 ps-10 text-sm text-gray-900 bg-gray-50 rounded-s-lg border-e-gray-50 border-e-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-e-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="" required />
        </div>
      </div>
      <button type="submit" class="
        text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Put on sale
      </button>
    </form>
  </div>
</body>

<style>
  input[type=number]::-webkit-inner-spin-button, 
  input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none; 
    margin: 0; 
  }
</style>