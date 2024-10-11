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
            <div class="item-center text-center mt-8 font-semibold">
                Welcome to your store<br>
                {{$store_name}}
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
</script>