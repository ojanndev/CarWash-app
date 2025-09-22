@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">Admin Dashboard</h1>
        
        <!-- Summary Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <div class="bg-white dark:bg-[#161615] rounded-lg shadow p-6 border-l-4 border-[#f53003]">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Total Bookings</h3>
                        <p class="text-3xl font-bold text-[#f53003] dark:text-[#FF4433]">{{ $bookingsCount }}</p>
                    </div>
                    <div class="text-4xl text-[#f53003] dark:text-[#FF4433]">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-white dark:bg-[#161615] rounded-lg shadow p-6 border-l-4 border-blue-500">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Today's Bookings</h3>
                        <p class="text-3xl font-bold text-blue-500">{{ $todayBookings }}</p>
                    </div>
                    <div class="text-4xl text-blue-500">
                        <i class="fas fa-clock"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-white dark:bg-[#161615] rounded-lg shadow p-6 border-l-4 border-green-500">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Total Revenue</h3>
                        <p class="text-3xl font-bold text-green-500">${{ number_format($totalRevenue, 2) }}</p>
                    </div>
                    <div class="text-4xl text-green-500">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-white dark:bg-[#161615] rounded-lg shadow p-6 border-l-4 border-purple-500">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Total Customers</h3>
                        <p class="text-3xl font-bold text-purple-500">{{ $customersCount }}</p>
                    </div>
                    <div class="text-4xl text-purple-500">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Booking Status Overview -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
            <div class="bg-white dark:bg-[#161615] rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Pending</h3>
                <p class="text-3xl font-bold text-yellow-500">{{ $pendingBookings }}</p>
            </div>
            
            <div class="bg-white dark:bg-[#161615] rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Confirmed</h3>
                <p class="text-3xl font-bold text-blue-500">{{ $confirmedBookings }}</p>
            </div>
            
            <div class="bg-white dark:bg-[#161615] rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Completed</h3>
                <p class="text-3xl font-bold text-green-500">{{ $completedBookings }}</p>
            </div>
            
            <div class="bg-white dark:bg-[#161615] rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Cancelled</h3>
                <p class="text-3xl font-bold text-red-500">{{ $cancelledBookings }}</p>
            </div>
        </div>
        
        <!-- Upcoming Bookings and Recent Activity -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
            <!-- Upcoming Bookings -->
            <div class="bg-white dark:bg-[#161615] rounded-lg shadow overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-[#3E3E3A]">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Upcoming Bookings</h2>
                </div>
                
                @if ($upcomingBookings->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-[#3E3E3A]">
                            <thead class="bg-gray-50 dark:bg-[#3E3E3A]">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Customer</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Service</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Date</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-[#161615] divide-y divide-gray-200 dark:divide-[#3E3E3A]">
                                @foreach ($upcomingBookings as $booking)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $booking->customer->name }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900 dark:text-white">{{ $booking->service->name }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900 dark:text-white">{{ $booking->booking_date->format('M d, g:i A') }}</div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="p-6">
                        <p class="text-gray-600 dark:text-gray-300 text-center">No upcoming bookings.</p>
                    </div>
                @endif
            </div>
            
            <!-- Recent Bookings -->
            <div class="bg-white dark:bg-[#161615] rounded-lg shadow overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-[#3E3E3A]">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Recent Bookings</h2>
                </div>
                
                @if ($recentBookings->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-[#3E3E3A]">
                            <thead class="bg-gray-50 dark:bg-[#3E3E3A]">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Customer</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Service</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Date</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Status</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-[#161615] divide-y divide-gray-200 dark:divide-[#3E3E3A]">
                                @foreach ($recentBookings as $booking)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $booking->customer->name }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900 dark:text-white">{{ $booking->service->name }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900 dark:text-white">{{ $booking->booking_date->format('M d, Y') }}</div>
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
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="p-6">
                        <p class="text-gray-600 dark:text-gray-300 text-center">No bookings yet.</p>
                    </div>
                @endif
            </div>
        </div>
        
        <!-- Quick Actions -->
        <div class="bg-white dark:bg-[#161615] rounded-lg shadow p-6 mb-6">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Quick Actions</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <a href="{{ route('admin.bookings') }}" class="bg-[#f53003] dark:bg-[#FF4433] text-white py-3 px-4 rounded-md hover:bg-[#d42500] dark:hover:bg-[#e03a2a] transition duration-300 text-center">
                    <i class="fas fa-calendar-alt mr-2"></i> Manage Bookings
                </a>
                <a href="{{ route('admin.services') }}" class="bg-blue-500 text-white py-3 px-4 rounded-md hover:bg-blue-600 transition duration-300 text-center">
                    <i class="fas fa-concierge-bell mr-2"></i> Manage Services
                </a>
                <a href="{{ route('admin.customers') }}" class="bg-green-500 text-white py-3 px-4 rounded-md hover:bg-green-600 transition duration-300 text-center">
                    <i class="fas fa-users mr-2"></i> Manage Customers
                </a>
                <a href="{{ route('admin.reports') }}" class="bg-purple-500 text-white py-3 px-4 rounded-md hover:bg-purple-600 transition duration-300 text-center">
                    <i class="fas fa-chart-bar mr-2"></i> View Reports
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection