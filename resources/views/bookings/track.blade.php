@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <div class="max-w-2xl mx-auto bg-white dark:bg-[#161615] rounded-lg shadow p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Track Your Booking</h2>
                <span class="bg-gray-100 dark:bg-[#3E3E3A] text-gray-800 dark:text-white text-sm font-medium px-2.5 py-0.5 rounded">
                    #{{ $booking->id }}
                </span>
            </div>
            
            <div class="mb-6 p-4 bg-gray-50 dark:bg-[#3E3E3A] rounded-lg">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Service</h3>
                <div class="flex justify-between">
                    <span class="text-gray-700 dark:text-gray-300">{{ $booking->service->name }}</span>
                    <span class="font-bold text-[#f53003] dark:text-[#FF4433]">${{ number_format($booking->service->price, 2) }}</span>
                </div>
                <div class="flex justify-between mt-1">
                    <span class="text-gray-700 dark:text-gray-300">Date & Time</span>
                    <span class="text-gray-700 dark:text-gray-300">{{ $booking->booking_date->format('M d, Y g:i A') }}</span>
                </div>
            </div>
            
            <!-- Progress Tracker -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Service Progress</h3>
                <div class="flex items-center justify-between relative">
                    <!-- Progress line -->
                    <div class="absolute top-4 left-0 right-0 h-1 bg-gray-200 dark:bg-[#3E3E3A] -z-10"></div>
                    <div class="absolute top-4 left-0 h-1 bg-[#f53003] dark:bg-[#FF4433] -z-10" 
                         style="width: 
                         @if($booking->status == 'pending') 0%
                         @elseif($booking->status == 'confirmed') 25%
                         @elseif($booking->status == 'in_progress') 75%
                         @elseif($booking->status == 'completed') 100%
                         @else 0%
                         @endif;"></div>
                    
                    <!-- Progress steps -->
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center
                            @if($booking->status == 'pending' || $booking->status == 'confirmed' || $booking->status == 'in_progress' || $booking->status == 'completed') 
                                bg-[#f53003] dark:bg-[#FF4433] text-white
                            @else 
                                bg-gray-200 dark:bg-[#3E3E3A] text-gray-500
                            @endif">
                            <i class="fas fa-check"></i>
                        </div>
                        <span class="mt-2 text-xs text-gray-600 dark:text-gray-400">Booked</span>
                    </div>
                    
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center
                            @if($booking->status == 'confirmed' || $booking->status == 'in_progress' || $booking->status == 'completed') 
                                bg-[#f53003] dark:bg-[#FF4433] text-white
                            @else 
                                bg-gray-200 dark:bg-[#3E3E3A] text-gray-500
                            @endif">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <span class="mt-2 text-xs text-gray-600 dark:text-gray-400">Confirmed</span>
                    </div>
                    
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center
                            @if($booking->status == 'in_progress' || $booking->status == 'completed') 
                                bg-[#f53003] dark:bg-[#FF4433] text-white
                            @else 
                                bg-gray-200 dark:bg-[#3E3E3A] text-gray-500
                            @endif">
                            <i class="fas fa-car"></i>
                        </div>
                        <span class="mt-2 text-xs text-gray-600 dark:text-gray-400">In Progress</span>
                    </div>
                    
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center
                            @if($booking->status == 'completed') 
                                bg-[#f53003] dark:bg-[#FF4433] text-white
                            @else 
                                bg-gray-200 dark:bg-[#3E3E3A] text-gray-500
                            @endif">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <span class="mt-2 text-xs text-gray-600 dark:text-gray-400">Completed</span>
                    </div>
                </div>
                
                <!-- Current Status -->
                <div class="mt-6 p-4 bg-gray-50 dark:bg-[#3E3E3A] rounded-lg">
                    <div class="flex items-center">
                        <div class="text-[#f53003] dark:text-[#FF4433] text-xl mr-3">
                            <i class="fas fa-info-circle"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Current Status</p>
                            <p class="text-lg font-semibold text-gray-900 dark:text-white">
                                @if($booking->status == 'pending')
                                    Pending Confirmation
                                @elseif($booking->status == 'confirmed')
                                    Confirmed - Awaiting Service
                                @elseif($booking->status == 'in_progress')
                                    Service In Progress
                                @elseif($booking->status == 'completed')
                                    Service Completed
                                @else
                                    {{ ucfirst($booking->status) }}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Worker Information -->
            @if($worker)
            <div class="mb-6 p-4 bg-gray-50 dark:bg-[#3E3E3A] rounded-lg">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Assigned Technician</h3>
                <div class="flex items-center">
                    <div class="bg-gray-200 border-2 border-dashed rounded-xl w-12 h-12 mr-4"></div>
                    <div>
                        <p class="font-medium text-gray-900 dark:text-white">{{ $worker->name }}</p>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">{{ $worker->position }}</p>
                    </div>
                </div>
            </div>
            @endif
            
            <!-- Estimated Completion -->
            <div class="mb-6 p-4 bg-gray-50 dark:bg-[#3E3E3A] rounded-lg">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Estimated Completion</h3>
                <p class="text-gray-700 dark:text-gray-300">
                    @if($booking->status == 'pending')
                        Awaiting confirmation
                    @elseif($booking->status == 'confirmed')
                        {{ $booking->booking_date->addMinutes($booking->service->duration)->format('M d, Y g:i A') }}
                    @elseif($booking->status == 'in_progress')
                        {{ $booking->booking_date->addMinutes($booking->service->duration)->format('M d, Y g:i A') }}
                    @elseif($booking->status == 'completed')
                        Completed on {{ $booking->updated_at->format('M d, Y g:i A') }}
                    @else
                        N/A
                    @endif
                </p>
            </div>
            
            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-3">
                <a href="{{ route('bookings.show', $booking) }}" class="flex-1 bg-gray-200 dark:bg-[#3E3E3A] text-gray-800 dark:text-white py-2 px-4 rounded-md hover:bg-gray-300 dark:hover:bg-[#4E4E4A] transition duration-300 text-center">
                    Back to Booking Details
                </a>
                
                @if($booking->status == 'completed' && $booking->payment_status == 'pending')
                    <a href="{{ route('payments.checkout', $booking) }}" class="flex-1 bg-[#f53003] dark:bg-[#FF4433] text-white py-2 px-4 rounded-md hover:bg-[#d42500] dark:hover:bg-[#e03a2a] transition duration-300 text-center">
                        Pay Now
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection