@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Notifications</h1>
            <a href="{{ route('customer.dashboard') }}" class="bg-gray-200 dark:bg-[#3E3E3A] text-gray-800 dark:text-white py-2 px-4 rounded-md hover:bg-gray-300 dark:hover:bg-[#4E4E4A] transition duration-300">
                <i class="fas fa-arrow-left mr-2"></i> Back to Dashboard
            </a>
        </div>
        
        <!-- Notification Filters -->
        <div class="bg-white dark:bg-[#161615] rounded-lg shadow p-6 mb-6">
            <div class="flex flex-wrap gap-3">
                <button class="px-4 py-2 bg-[#f53003] dark:bg-[#FF4433] text-white rounded-md">All</button>
                <button class="px-4 py-2 bg-gray-200 dark:bg-[#3E3E3A] text-gray-800 dark:text-white rounded-md hover:bg-gray-300 dark:hover:bg-[#4E4E4A]">Unread</button>
                <button class="px-4 py-2 bg-gray-200 dark:bg-[#3E3E3A] text-gray-800 dark:text-white rounded-md hover:bg-gray-300 dark:hover:bg-[#4E4E4A]">Booking</button>
                <button class="px-4 py-2 bg-gray-200 dark:bg-[#3E3E3A] text-gray-800 dark:text-white rounded-md hover:bg-gray-300 dark:hover:bg-[#4E4E4A]">Payment</button>
                <button class="px-4 py-2 bg-gray-200 dark:bg-[#3E3E3A] text-gray-800 dark:text-white rounded-md hover:bg-gray-300 dark:hover:bg-[#4E4E4A]">Service</button>
            </div>
        </div>
        
        <!-- Notifications List -->
        <div class="bg-white dark:bg-[#161615] rounded-lg shadow overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-[#3E3E3A]">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Recent Notifications</h2>
            </div>
            
            @if ($notifications->count() > 0)
                <div class="divide-y divide-gray-200 dark:divide-[#3E3E3A]">
                    @foreach ($notifications as $notification)
                        <div class="p-6 hover:bg-gray-50 dark:hover:bg-[#3E3E3A] cursor-pointer">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    @if ($notification->type == 'booking')
                                        <div class="h-10 w-10 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center">
                                            <i class="fas fa-calendar-check text-blue-500"></i>
                                        </div>
                                    @elseif ($notification->type == 'payment')
                                        <div class="h-10 w-10 rounded-full bg-green-100 dark:bg-green-900 flex items-center justify-center">
                                            <i class="fas fa-dollar-sign text-green-500"></i>
                                        </div>
                                    @elseif ($notification->type == 'service')
                                        <div class="h-10 w-10 rounded-full bg-purple-100 dark:bg-purple-900 flex items-center justify-center">
                                            <i class="fas fa-concierge-bell text-purple-500"></i>
                                        </div>
                                    @else
                                        <div class="h-10 w-10 rounded-full bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
                                            <i class="fas fa-bell text-gray-500"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="ml-4 flex-1">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">{{ $notification->title }}</h3>
                                        <span class="text-sm text-gray-500 dark:text-gray-400">{{ $notification->created_at->diffForHumans() }}</span>
                                    </div>
                                    <p class="mt-1 text-gray-600 dark:text-gray-300">{{ $notification->message }}</p>
                                    @if ($notification->data && isset($notification->data['booking_id']))
                                        <div class="mt-2">
                                            <a href="{{ route('bookings.show', $notification->data['booking_id']) }}" class="text-[#f53003] dark:text-[#FF4433] hover:text-[#d42500] dark:hover:text-[#e03a2a] text-sm font-medium">
                                                View Booking
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <!-- Pagination -->
                <div class="px-6 py-4 border-t border-gray-200 dark:border-[#3E3E3A]">
                    {{ $notifications->links() }}
                </div>
            @else
                <div class="p-6">
                    <div class="text-center">
                        <i class="fas fa-bell-slash text-4xl text-gray-300 mb-4"></i>
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-1">No notifications</h3>
                        <p class="text-gray-500 dark:text-gray-400">You don't have any notifications at the moment.</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection