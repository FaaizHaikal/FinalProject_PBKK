@section('title', 'Shop - Upload File Testing')

<div class="h-screen w-full">
        <div class="flex items-center justify-center h-full">
            <div class>
                <form wire:submit="save">
                    <input class="block w-[300px] text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" 
                        id="file_input" 
                        type="file" 
                        accept=".svg, .png, .jpg, .jpeg, .gif"        
                        wire:model="photo" 
                    >   
                    <p class="mt-1 ml-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG, PNEG, or GIF</p>
                    <button class="block mt-3 ml-1 text-sm font-medium text-gray-900 dark:text-white" type="submit">Save Photo</button>
                    @error('photo') <span class="error">{{ $message }}</span> @enderror
                </form>
            </div>

            @if ($fileUrl)
                <p class="mt-6 text-sm text-gray-500 dark:text-gray-300">Uploaded file:</p>
                <img src="{{ asset('/storage' . '/z' . $fileUrl) }}" class="mt-2 w-32 h-32 object-cover" alt="Uploaded Image">
            @endif
        </div>
</div>
