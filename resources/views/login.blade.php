<!-- resources/views/login.blade.php -->
@section('title', 'Shop - Login')

<div class="h-screen w-full">
    <div class="h-full w-full bg-[rgb(242,242,242)] bg-cover bg-center bg-no-repeat"
        style="background-image: url('{{ asset('svg/AuthBackground.svg') }}');">
        <div class="flex h-full items-center justify-center">
            <div class="w-fit min-w-96 rounded bg-white p-10 shadow-lg">

                <div class="mb-6 flex flex-row items-center justify-center gap-4 pb-1">
                    <div class="scale-[1.7] text-blue-500">
                        {!!file_get_contents(public_path('svg/register.svg'))!!}
                    </div>
                    <span class="text-lg font-semibold">
                        Login to your account
                    </span>
                </div>

                <div class="item-center text-center">
                    <button
                        class="border-gray w-fit rounded-md border border-solid border-[#c2c8d0] p-2 text-sm hover:bg-gray-200">
                        <div class="flex flex-row items-center gap-3 text-center">
                            <img src="{{ asset('svg/google-logo.svg') }}" class="w-5" alt="Google Logo" />
                            <span class="text-md">Continue with Google</span>
                        </div>
                    </button>

                    <div class="my-5 flex items-center justify-center">
                        <div class="flex-grow border-b border-gray-300"></div>
                        <span class="mx-4 text-sm text-slate-600">OR</span>
                        <div class="flex-grow border-b border-gray-300"></div>
                    </div>
                </div>


    
                <form class="mx-auto max-w-sm" wire:submit.prevent="login">
                    <div class="relative mb-4">
                        <label for="email"
                            class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Identity</label>
                        <div class="pointer-events-none absolute inset-y-0 start-0 mt-7 flex items-center ps-3.5">
                            <img src="{{ asset('svg/user-logo.svg') }}" class="h-4 w-4 text-gray-500"
                                alt="Email Logo" />
                        </div>

                        <input type="text" id="email" wire:model="username_or_email"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 ps-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Enter your email or username" required autocomplete="off"/>
                    </div>

                    <div class="relative">
                        <label for="password"
                            class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <div class="pointer-events-none absolute inset-y-0 start-0 mt-7 flex items-center ps-3">
                            <img src="{{ asset('svg/password-logo.svg') }}" class="w-4" alt="Password Logo" />
                        </div>
                        <input type="password" id="password" wire:model="password"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 ps-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Enter your password" required autocomplete="off" />
                    </div>

                    @if ($errors->has('email'))
                        <div class="text-xs text-red-600 mt-2">
                            {{ $errors->first('email') }}
                        </div>
                    @endif

                    @if ($errors->has('username'))
                        <div class="text-xs text-red-600 mt-2">
                            {{ $errors->first('username') }}
                        </div>
                    @endif

                    <div class="my-6 flex items-start">
                        <div class="flex h-5 items-center">
                            <input id="remember" type="checkbox" value=""
                                class="focus:ring-3 h-4 w-4 rounded border border-gray-300 bg-gray-50 focus:ring-blue-300"
                                required />
                        </div>
                        <label for="remember" class="ms-2 text-sm font-medium text-gray-900">
                            Remember me
                        </label>
                    </div>


                    <button type="submit"
                        class="w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">Submit</button>
                </form>

            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('user-login', event => {
        localStorage.setItem('user_id', event.detail.userId);
        console.log( event.detail.userId)
    });
</script>
