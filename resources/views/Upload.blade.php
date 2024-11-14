@section('title', 'Shop - Upload File Testing')

<div class="h-screen w-full">
    <div class="flex h-full flex-col items-center justify-center pb-[15%]">
        <div class="">
            <form wire:submit="save">
                <input
                    class="block cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 focus:outline-none lg:w-96 xl:w-[32rem]"
                    id="file_input" type="file" accept=".svg, .png, .jpg, .jpeg, .gif." wire:model="photo">
                <p class="ml-1 mt-1 text-sm text-gray-500" id="file_input_help">SVG, PNG, JPG, JPEG,
                    or GIF</p>
                <div class="item-center flex justify-center">
                    <button type="submit"
                        class="mt-7 w-[40%] items-center rounded-lg bg-gradient-to-r from-purple-500 to-pink-500 py-2 text-sm font-semibold text-white hover:bg-gradient-to-l focus:outline-none focus:ring-4 focus:ring-purple-200">Start
                        Upload</button>
                </div>

                @error('photo') <span class="error mt-2 text-sm text-red-600">{{ $message }}</span> @enderror
            </form>
        </div>

        @if ($fileUrl)
            @if ($top_confidence == -999)
                <div
                    class="mb-2 me-2 mt-8 animate-pulse rounded-lg bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 px-5 py-2.5 text-center text-sm font-bold text-white hover:bg-gradient-to-bl focus:outline-none focus:ring-4 focus:ring-red-100 dark:focus:ring-red-400">
                    <svg aria-hidden="true" role="status" class="me-3 inline h-4 w-4 animate-spin text-white"
                        viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                            fill="#E5E7EB" />
                        <path
                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                            fill="currentColor" />
                    </svg>
                    Waiting for response from roboflow endpoint ....
                </div>
            @else
                <button type="button"
                    class="mb-2 me-2 mt-8 rounded-lg bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 px-4 py-2.5 text-center text-sm font-medium text-gray-900 shadow-lg shadow-lime-500/50 hover:bg-gradient-to-br focus:outline-none focus:ring-4 focus:ring-lime-300">{{$top_category}}
                    Shoes</button>
                <button type="button"
                    class="mb-2 me-2 mt-3 rounded-lg bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 px-5 py-2.5 text-center text-sm font-medium text-white shadow-lg shadow-teal-500/50 hover:bg-gradient-to-br focus:outline-none focus:ring-4 focus:ring-teal-300">
                    {{$top_confidence}} Confidence</button>
            @endif
            <div class="">
                <div class="mt-6 text-center text-sm font-bold text-gray-500">Your File:</div>
                <img src="{{ asset('/storage' . '/' . $fileUrl) }}" class="mt-4 max-h-80 object-cover" alt="Uploaded Image">
            </div>
        @endif

    </div>

</div>

<script>
    window.addEventListener('start_inference', event => {
        fetch("https://classify.roboflow.com/shoes-categories/1?api_key=OmssS0x7eCppP0K0FVMU", {
            method: "POST",
            body: event.detail.b64_image,
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
                if (data.confidence > 0.4) {
                    @this.set('top_category', data.top);
                    @this.set('top_confidence', data.confidence);
                } else {
                    @this.set('top_category', 'Unknown Category');
                    @this.set('top_confidence', data.confidence);
                }
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error.message);
            });
    });
</script>