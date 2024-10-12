@section('title', 'Shop - Upload File Testing')

<div class="h-screen w-full">
        <div class="flex h-full flex-col items-center justify-center pb-[15%]">
            <div class="">
                <form wire:submit="save">
                    <input class="block cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 focus:outline-none lg:w-96 xl:w-[32rem]" 
                        id="file_input" 
                        type="file" 
                        accept=".svg, .png, .jpg, .jpeg, .gif."        
                        wire:model="photo" 
                    >   
                    <p class="ml-1 mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG, JPEG, or GIF</p>
                    <div class="item-center flex justify-center">
                        <button type="submit" class="mt-7 w-[40%] items-center rounded-lg bg-gradient-to-r from-purple-500 to-pink-500 py-2 text-sm font-semibold text-white hover:bg-gradient-to-l focus:outline-none focus:ring-4 focus:ring-purple-200 dark:focus:ring-purple-800">Start Upload</button>
                    </div>

                    @error('photo') <span class="error mt-2 text-sm text-red-600">{{ $message }}</span> @enderror
                </form>
            </div>

            @if ($fileUrl)
            <div class="flex flex-row gap-6">
                <div>
                    <div class="mt-6 text-center text-sm text-gray-500 dark:text-gray-300">Your File:</div>
                    <img src="{{ asset('/storage' . '/' . $fileUrl) }}" class="mt-2 h-32 w-32 object-cover" alt="Uploaded Image">
                </div>
                <div>
                    <div class="mt-6 text-center text-sm text-gray-500 dark:text-gray-300">Response File:</div>
                    <img src="{{ asset('/storage' . '/' . $fileUrl) }}" class="mt-2 h-32 w-32 object-cover" alt="Response Image">
                </div>
            </div>
            @endif
        </div>
        
</div>
