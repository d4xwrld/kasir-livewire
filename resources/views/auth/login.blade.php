<!DOCTYPE html>
<html data-theme="bumblebee">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KasirKu! - Login</title>
    @vite(['resources/css/output.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="container mx-auto flex justify-center items-center h-screen">
        <div class="bg-white shadow-md rounded pt-8 pb-8 mb-8 mx-auto flex flex-col py-8">
            <div class="text-center font-bold text-3xl mb-8">KasirKu!</div>
            <h2 class="text-center font-bold text-2xl mb-6">Sign in</h2>
            <form class="w-full max-w-md mx-auto px-6" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-6">
                    <label for="email" class="block text-gray-700 text-lg font-bold mb-2">
                        Email address
                    </label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        class="shadow appearance-none border rounded w-full py-4 px-6 text-xl text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                        value="{{ old('email') }}" 
                        required 
                        autofocus
                    >
                    @error('email')
                        <span class="text-red-500 text-lg">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-gray-700 text-lg font-bold mb-2">
                        Password
                    </label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        class="shadow appearance-none border rounded w-full py-4 px-6 text-xl text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                        required
                    >
                    @error('password')
                        <span class="text-red-500 text-lg">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex items-center mb-8">
                    <label class="cursor-pointer label">
                        <input type="checkbox" checked="checked" class="checkbox checkbox-secondary mr-2" />
                        <span class="label-text">Remember me</span>
                    </label>
                </div>
                <div class="flex items-center justify-end mb-4">
                    <button type="submit" class="btn btn-secondary text-xl">
                        Sign in
                    </button>
                </div>
                {{-- @if (Route::has('password.request'))
                    <div class="text-center mt-6">
                        <a class="text-blue-500 hover:text-blue-700" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </div>
                @endif --}}
            </form>
        </div>
    </div>
</body>
</html>