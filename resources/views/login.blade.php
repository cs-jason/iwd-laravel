{{-- 
views/login.blade.php

Extend the 'Layout' component and set the title as "Register" 
--}}
<x-layout title="Register">
    <div class="flex flex-col items-center mt-8">
        {{-- Container for the login form --}}
        <div class="max-w-sm w-full">
            {{-- Login form --}}
            <h2 class="text-3xl font-medium mb-8 text-gray-800">Sign In</h2>
            <form method="POST" action="{{ route('login') }}" class="flex flex-col justify-between">
                {{-- CSRF token --}}
                @csrf

                {{-- Email input --}}
                <div class="mb-4">
                    <label for="email" class="block mb-2 text-gray-500">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus class="w-full p-2 px-4 border-gray-300 border rounded-lg" placeholder="Enter your email">
                    @error('email')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Password input --}}
                <div class="mb-16">
                    <label for="password" class="block mb-2 text-gray-500">Password</label>
                    <input type="password" id="password" name="password" required autocomplete="current-password" class="w-full p-2 px-4 border-gray-300 border rounded-lg" placeholder="Enter your password">
                    @error('password')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Sign In button --}}
                <button type="submit" class="bg-gray-800 text-gray-100 border w-full px-4 py-2 rounded-lg focus:outline-none shadow hover:bg-gray-200 hover:text-gray-800 hover:shadow-md hover:border-gray-300 hover:border transition duration-200 ease-in-out active:translate-y-0.5 text-center">Sign In</button>

                {{-- Sign up link --}}
                <p class="text-center text-gray-500 mt-4">Don't have an account? <a href="{{ route('register') }}" class="text-gray-800 font-medium hover:text-gray-700 hover:underline">Sign Up</a></p>
            </form>
        </div>
    </div>
</x-layout>
