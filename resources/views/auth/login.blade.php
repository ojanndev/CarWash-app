@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-[#0d1b2a] via-[#1b263b] to-[#2c2c54] px-4">
    <div class="w-full max-w-md bg-white/10 backdrop-blur-lg rounded-2xl shadow-2xl p-8">
        <!-- Judul -->
        <h2 class="text-3xl font-bold text-center text-white mb-6">
            Welcome Back
        </h2>
        <p class="text-center text-gray-300 mb-8">
            Sign in to continue to <span class="text-[#FF4433] font-semibold">CarWash</span>
        </p>

        <!-- Error Message -->
        @if ($errors->any())
            <div class="bg-red-500/20 border border-red-400 text-red-300 px-4 py-3 rounded mb-4">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-200 mb-2">Email Address</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                    class="w-full px-3 py-3 rounded-md bg-white/10 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-[#FF4433]">
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-200 mb-2">Password</label>
                <input type="password" name="password" id="password" required
                    class="w-full px-3 py-3 rounded-md bg-white/10 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-[#FF4433]">
            </div>

            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember"
                        class="h-4 w-4 text-[#FF4433] border-gray-500 rounded focus:ring-[#FF4433]">
                    <label for="remember" class="ml-2 block text-sm text-gray-300">Remember me</label>
                </div>
                <a href="#" class="text-sm text-[#FF4433] hover:text-[#ff6347]">Forgot password?</a>
            </div>

            <button type="submit"
                class="w-full bg-[#FF4433] hover:bg-[#e63a2e] text-white py-3 rounded-md font-semibold shadow-lg transition duration-300">
                Sign In
            </button>
        </form>

        <!-- Register -->
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-300">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-[#FF4433] hover:text-[#ff6347] font-medium">Register</a>
            </p>
        </div>
    </div>
</div>
@endsection
