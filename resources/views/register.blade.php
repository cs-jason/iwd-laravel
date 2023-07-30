<x-layout title="Register">
    <div class="flex flex-col items-center mt-8">       
        <div class="max-w-sm w-full">
            <h2 class="text-3xl font-medium mb-1">Sign Up</h2>
            <p class="text-gray-500 mb-8">Let's get you started with Bunny.</p>
            <form method="POST" action="{{ route('register') }}" class="flex flex-col justify-between h-full">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block mb-2 text-gray-500">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus class="w-full p-2 px-4 border-gray-300 border rounded-lg" placeholder="Enter your full name">
                    @error('name')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block mb-2 text-gray-500">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" class="w-full p-2 px-4 border-gray-300 border rounded-lg" placeholder="Enter your email">
                    @error('email')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block mb-2 text-gray-500">Password</label>
                    <input type="password" id="password" name="password" required autocomplete="new-password" class="w-full p-2 px-4 border-gray-300 border rounded-lg" placeholder="Enter your new password">
                    @error('password')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-16">
                    <label for="password_confirmation" class="block mb-2 text-gray-500">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" class="w-full p-2 px-4 border-gray-300 border rounded-lg" placeholder="Re-enter your password">
                </div>

                <button type="submit" class="bg-gray-800 text-gray-100 border w-full px-4 py-2 rounded-lg focus:outline-none shadow hover:bg-gray-300 hover:text-gray-800 hover:shadow-md hover:border-gray-300 hover:border transition duration-200 ease-in-out active:translate-y-0.5 text-center">Sign Up</button>
                <p class="text-center text-gray-500 mt-4">Already have an account? <a href="{{ route('login') }}" class="text-gray-800 font-medium hover:text-gray-700 hover:underline">Sign In</a></p>
            </form>
        </div>
    </div>
</x-layout>
