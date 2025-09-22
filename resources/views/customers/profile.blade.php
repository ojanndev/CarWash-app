@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">My Profile</h1>
        
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2">
                <div class="bg-white dark:bg-[#161615] rounded-lg shadow p-6">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Personal Information</h2>
                    
                    <form method="POST" action="{{ route('customer.profile.update') }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2">Full Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $customer->name) }}" required class="w-full px-3 py-2 border border-gray-300 dark:border-[#3E3E3A] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] bg-white dark:bg-[#161615] text-gray-900 dark:text-white">
                        </div>
                        
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2">Email Address</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $customer->email) }}" required class="w-full px-3 py-2 border border-gray-300 dark:border-[#3E3E3A] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] bg-white dark:bg-[#161615] text-gray-900 dark:text-white">
                        </div>
                        
                        <div class="mb-4">
                            <label for="phone" class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2">Phone Number</label>
                            <input type="text" name="phone" id="phone" value="{{ old('phone', $customer->phone) }}" class="w-full px-3 py-2 border border-gray-300 dark:border-[#3E3E3A] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] bg-white dark:bg-[#161615] text-gray-900 dark:text-white">
                        </div>
                        
                        <div class="mb-6">
                            <label for="address" class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2">Address</label>
                            <textarea name="address" id="address" rows="3" class="w-full px-3 py-2 border border-gray-300 dark:border-[#3E3E3A] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] bg-white dark:bg-[#161615] text-gray-900 dark:text-white">{{ old('address', $customer->address) }}</textarea>
                        </div>
                        
                        <button type="submit" class="bg-[#f53003] dark:bg-[#FF4433] text-white py-2 px-4 rounded-md hover:bg-[#d42500] dark:hover:bg-[#e03a2a] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] transition duration-300">
                            Update Profile
                        </button>
                    </form>
                </div>
            </div>
            
            <div>
                <div class="bg-white dark:bg-[#161615] rounded-lg shadow p-6 mb-6">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Account Information</h2>
                    <div class="space-y-3">
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Member Since</p>
                            <p class="text-gray-900 dark:text-white">{{ $customer->created_at->format('M d, Y') }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Total Bookings</p>
                            <p class="text-gray-900 dark:text-white">{{ $customer->bookings()->count() }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white dark:bg-[#161615] rounded-lg shadow p-6 mb-6">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">My Vehicles</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">Manage your vehicles for faster booking.</p>
                    <a href="{{ route('customer.vehicles') }}" class="inline-block bg-[#f53003] dark:bg-[#FF4433] text-white py-2 px-4 rounded-md hover:bg-[#d42500] dark:hover:bg-[#e03a2a] transition duration-300">
                        Manage Vehicles
                    </a>
                </div>
                
                <div class="bg-white dark:bg-[#161615] rounded-lg shadow p-6 mb-6">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">My Reviews</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">View and manage your service reviews.</p>
                    <a href="{{ route('customer.reviews') }}" class="inline-block bg-[#f53003] dark:bg-[#FF4433] text-white py-2 px-4 rounded-md hover:bg-[#d42500] dark:hover:bg-[#e03a2a] transition duration-300">
                        View Reviews
                    </a>
                </div>
                
                <div class="bg-white dark:bg-[#161615] rounded-lg shadow p-6">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Change Password</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">To change your password, please contact our support team.</p>
                    <a href="#" class="inline-block bg-gray-200 dark:bg-[#3E3E3A] text-gray-800 dark:text-white py-2 px-4 rounded-md hover:bg-gray-300 dark:hover:bg-[#4E4E4A] transition duration-300">
                        Contact Support
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection