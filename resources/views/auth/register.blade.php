@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-[#0d1b2a] via-[#1b263b] to-[#2c2c54] px-4 py-20">
    <div class="w-full max-w-lg bg-white/10 backdrop-blur-lg rounded-2xl shadow-2xl p-10">
        
        <!-- Title -->
        <h2 class="text-3xl font-bold text-center text-white mb-6">Create an Account</h2>
        <p class="text-center text-gray-300 mb-8">
            Join <span class="text-[#FF4433] font-semibold">CarWash</span> and book your service easily
        </p>

        <!-- Referral Info -->
        @if(request('ref'))
            <div class="bg-green-500/20 border border-green-400 text-green-300 px-4 py-3 rounded mb-4">
                <p class="text-sm">
                    <i class="fas fa-gift mr-2"></i>
                    You were referred by a friend! You'll both get $10 credit after your first booking.
                </p>
            </div>
            <input type="hidden" name="referrer_id" value="{{ request('ref') }}">
        @endif

        <!-- Error -->
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
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Hidden user type field - always customer -->
            <input type="hidden" name="user_type" value="customer">
            
            <!-- Hidden referrer field -->
            @if(request('ref'))
                <input type="hidden" name="referrer_id" value="{{ request('ref') }}">
            @endif

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-200 mb-2">Full Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                    class="w-full px-3 py-3 rounded-md bg-white/10 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-[#FF4433]">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-200 mb-2">Email Address</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                    class="w-full px-3 py-3 rounded-md bg-white/10 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-[#FF4433]">
            </div>

            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-200 mb-2">Phone Number</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                    class="w-full px-3 py-3 rounded-md bg-white/10 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-[#FF4433]">
            </div>

            <div class="mb-4">
                <label for="address" class="block text-sm font-medium text-gray-200 mb-2">Address</label>
                <textarea name="address" id="address" rows="3"
                    class="w-full px-3 py-3 rounded-md bg-white/10 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-[#FF4433]">{{ old('address') }}</textarea>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-200 mb-2">Password</label>
                <input type="password" name="password" id="password" required
                    class="w-full px-3 py-3 rounded-md bg-white/10 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-[#FF4433]">
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-200 mb-2">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                    class="w-full px-3 py-3 rounded-md bg-white/10 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-[#FF4433]">
            </div>

            <button type="submit"
                class="w-full bg-[#FF4433] hover:bg-[#e63a2e] text-white py-3 rounded-md font-semibold shadow-lg transition duration-300">
                Register
            </button>
        </form>

        <!-- Login redirect -->
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-300">
                Already have an account?
                <a href="{{ route('login') }}" class="text-[#FF4433] hover:text-[#ff6347] font-medium">Sign in here</a>
            </p>
        </div>
    </div>
</div>

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
