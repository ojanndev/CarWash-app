@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Customer Dashboard</h1>
            <div class="flex items-center space-x-4">
                <a href="{{ route('customer.notifications') }}" class="relative text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">
                    <i class="fas fa-bell text-xl"></i>
                    @if($unreadNotificationsCount > 0)
                        <span class="absolute -top-2 -right-2 bg-[#f53003] dark:bg-[#FF4433] text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">
                            {{ $unreadNotificationsCount }}
                        </span>
                    @endif
                </a>
                <a href="{{ route('customer.profile') }}" class="bg-gray-200 dark:bg-[#3E3E3A] text-gray-800 dark:text-white py-2 px-4 rounded-md hover:bg-gray-300 dark:hover:bg-[#4E4E4A] transition duration-300">
                    <i class="fas fa-user mr-2"></i> My Profile
                </a>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div class="bg-white dark:bg-[#161615] rounded-lg shadow p-6 border-l-4 border-[#f53003]">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Welcome, {{ $customer->name }}!</h3>
                        <p class="text-gray-600 dark:text-gray-300">Manage your bookings and profile information.</p>
                    </div>
                    <div class="text-4xl text-[#f53003] dark:text-[#FF4433]">
                        <i class="fas fa-user-circle"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-white dark:bg-[#161615] rounded-lg shadow p-6 border-l-4 border-blue-500">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Total Bookings</h3>
                        <p class="text-3xl font-bold text-blue-500">{{ $customer->bookings()->count() }}</p>
                    </div>
                    <div class="text-4xl text-blue-500">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-white dark:bg-[#161615] rounded-lg shadow p-6 border-l-4 border-green-500">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Upcoming Bookings</h3>
                        <p class="text-3xl font-bold text-green-500">{{ $customer->bookings()->where('booking_date', '>', now())->count() }}</p>
                    </div>
                    <div class="text-4xl text-green-500">
                        <i class="fas fa-clock"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
            <!-- Recent Bookings -->
            <div class="bg-white dark:bg-[#161615] rounded-lg shadow overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-[#3E3E3A]">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Recent Bookings</h2>
                </div>
                
                @if ($customer->bookings()->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-[#3E3E3A]">
                            <thead class="bg-gray-50 dark:bg-[#3E3E3A]">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Service</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Date & Time</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Status</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Price</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-[#161615] divide-y divide-gray-200 dark:divide-[#3E3E3A]">
                                @foreach ($customer->bookings()->latest()->take(5)->get() as $booking)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $booking->service->name }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900 dark:text-white">{{ $booking->booking_date->format('M d, Y g:i A') }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                @if($booking->status == 'pending') bg-yellow-100 text-yellow-800
                                                @elseif($booking->status == 'confirmed') bg-blue-100 text-blue-800
                                                @elseif($booking->status == 'completed') bg-green-100 text-green-800
                                                @elseif($booking->status == 'cancelled') bg-red-100 text-red-800
                                                @endif">
                                                {{ ucfirst($booking->status) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                            ${{ number_format($booking->total_price, 2) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('bookings.show', $booking) }}" class="text-[#f53003] dark:text-[#FF4433] hover:text-[#d42500] dark:hover:text-[#e03a2a]">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="p-6">
                        <p class="text-gray-600 dark:text-gray-300 text-center">You don't have any bookings yet.</p>
                    </div>
                @endif
                
                <div class="px-6 py-4 bg-gray-50 dark:bg-[#3E3E3A]">
                    <a href="{{ route('bookings.index') }}" class="text-[#f53003] dark:text-[#FF4433] hover:text-[#d42500] dark:hover:text-[#e03a2a] font-medium">
                        View All Bookings
                    </a>
                </div>
            </div>
            
            <!-- Quick Actions -->
            <div class="bg-white dark:bg-[#161615] rounded-lg shadow p-6">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Quick Actions</h2>
                <div class="grid grid-cols-2 gap-4">
                    <a href="{{ route('services.index') }}" class="block bg-[#f53003] dark:bg-[#FF4433] text-white py-3 px-4 rounded-md hover:bg-[#d42500] dark:hover:bg-[#e03a2a] transition duration-300 text-center">
                        <i class="fas fa-concierge-bell mr-2"></i> Book Service
                    </a>
                    <a href="{{ route('bookings.index') }}" class="block bg-blue-500 text-white py-3 px-4 rounded-md hover:bg-blue-600 transition duration-300 text-center">
                        <i class="fas fa-calendar-alt mr-2"></i> My Bookings
                    </a>
                    <a href="{{ route('customer.vehicles') }}" class="block bg-green-500 text-white py-3 px-4 rounded-md hover:bg-green-600 transition duration-300 text-center">
                        <i class="fas fa-car mr-2"></i> My Vehicles
                    </a>
                    <a href="{{ route('customer.reviews') }}" class="block bg-purple-500 text-white py-3 px-4 rounded-md hover:bg-purple-600 transition duration-300 text-center">
                        <i class="fas fa-star mr-2"></i> My Reviews
                    </a>
                </div>
                
                <!-- Upcoming Reminder -->
                @php
                    $upcomingBooking = $customer->bookings()->where('booking_date', '>', now())->orderBy('booking_date')->first();
                @endphp
                
                @if($upcomingBooking)
                <div class="mt-6 p-4 bg-yellow-50 dark:bg-[#3E3E3A] rounded-lg">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Upcoming Appointment</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        <i class="fas fa-calendar-day mr-2"></i> {{ $upcomingBooking->service->name }}
                    </p>
                    <p class="text-gray-700 dark:text-gray-300 mt-1">
                        <i class="fas fa-clock mr-2"></i> {{ $upcomingBooking->booking_date->format('M d, Y g:i A') }}
                    </p>
                    <a href="{{ route('bookings.show', $upcomingBooking) }}" class="mt-3 inline-block text-[#f53003] dark:text-[#FF4433] hover:text-[#d42500] dark:hover:text-[#e03a2a] font-medium">
                        View Details
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection