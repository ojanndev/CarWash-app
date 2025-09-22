@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <div class="max-w-2xl mx-auto bg-white dark:bg-[#161615] rounded-lg shadow p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Booking Details</h2>
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
                <p class="text-gray-600 dark:text-gray-300 mt-2">{{ $booking->service->description }}</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div class="bg-gray-50 dark:bg-[#3E3E3A] rounded-lg p-4">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Booking Date & Time</p>
                    <p class="text-lg font-semibold text-gray-900 dark:text-white">{{ $booking->booking_date->format('M d, Y g:i A') }}</p>
                </div>
                
                <div class="bg-gray-50 dark:bg-[#3E3E3A] rounded-lg p-4">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Status</p>
                    <p class="text-lg font-semibold 
                        @if($booking->status == 'pending') text-yellow-600 dark:text-yellow-400
                        @elseif($booking->status == 'confirmed') text-blue-600 dark:text-blue-400
                        @elseif($booking->status == 'completed') text-green-600 dark:text-green-400
                        @elseif($booking->status == 'cancelled') text-red-600 dark:text-red-400
                        @endif">
                        {{ ucfirst($booking->status) }}
                    </p>
                </div>
                
                <div class="bg-gray-50 dark:bg-[#3E3E3A] rounded-lg p-4">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Vehicle Type</p>
                    <p class="text-lg font-semibold text-gray-900 dark:text-white">{{ ucfirst($booking->vehicle_type) }}</p>
                </div>
                
                <div class="bg-gray-50 dark:bg-[#3E3E3A] rounded-lg p-4">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Total Price</p>
                    <p class="text-lg font-bold text-[#f53003] dark:text-[#FF4433]">${{ number_format($booking->total_price, 2) }}</p>
                </div>
                
                <div class="bg-gray-50 dark:bg-[#3E3E3A] rounded-lg p-4">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Payment Status</p>
                    <p class="text-lg font-semibold 
                        @if($booking->payment_status == 'paid') text-green-600 dark:text-green-400
                        @elseif($booking->payment_status == 'pending') text-yellow-600 dark:text-yellow-400
                        @else text-gray-600 dark:text-gray-400
                        @endif">
                        {{ ucfirst($booking->payment_status) }}
                    </p>
                </div>
                
                @if($booking->payment_method)
                <div class="bg-gray-50 dark:bg-[#3E3E3A] rounded-lg p-4">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Payment Method</p>
                    <p class="text-lg font-semibold text-gray-900 dark:text-white">
                        {{ ucfirst(str_replace('_', ' ', $booking->payment_method)) }}
                    </p>
                </div>
                @endif
            </div>
            
            @if($booking->vehicle_make || $booking->vehicle_model)
            <div class="mb-6 p-4 bg-gray-50 dark:bg-[#3E3E3A] rounded-lg">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Vehicle Information</h3>
                <p class="text-gray-700 dark:text-gray-300">
                    @if($booking->vehicle_make)
                        {{ $booking->vehicle_make }}
                        @if($booking->vehicle_model)
                            {{ $booking->vehicle_model }}
                        @endif
                    @elseif($booking->vehicle_model)
                        {{ $booking->vehicle_model }}
                    @endif
                </p>
            </div>
            @endif
            
            @if($booking->notes)
            <div class="mb-6 p-4 bg-gray-50 dark:bg-[#3E3E3A] rounded-lg">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Additional Notes</h3>
                <p class="text-gray-700 dark:text-gray-300">{{ $booking->notes }}</p>
            </div>
            @endif
            
            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-3">
                <a href="{{ route('bookings.index') }}" class="flex-1 bg-gray-200 dark:bg-[#3E3E3A] text-gray-800 dark:text-white py-2 px-4 rounded-md hover:bg-gray-300 dark:hover:bg-[#4E4E4A] transition duration-300 text-center">
                    Back to Bookings
                </a>
                
                @if($booking->status != 'pending' && $booking->status != 'cancelled')
                <a href="{{ route('bookings.track', $booking) }}" class="flex-1 bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300 text-center">
                    <i class="fas fa-map-marker-alt mr-2"></i> Track Progress
                </a>
                @endif
                
                @if($booking->status == 'pending' && $booking->payment_status == 'pending')
                    <a href="{{ route('payments.checkout', $booking) }}" class="flex-1 bg-[#f53003] dark:bg-[#FF4433] text-white py-2 px-4 rounded-md hover:bg-[#d42500] dark:hover:bg-[#e03a2a] transition duration-300 text-center">
                        Proceed to Payment
                    </a>
                @elseif($booking->status == 'pending')
                    <button class="flex-1 bg-red-600 text-white py-2 px-4 rounded-md hover:bg-red-700 transition duration-300">
                        Cancel Booking
                    </button>
                @elseif($booking->status == 'confirmed' && $booking->payment_status == 'paid')
                    <button class="flex-1 bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700 transition duration-300">
                        <i class="fas fa-qrcode mr-2"></i> Show QR Code
                    </button>
                @endif
            </div>
            
            <!-- Progress Tracker -->
            @if($booking->status != 'pending')
            <div class="mt-8">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Booking Progress</h3>
                <div class="flex items-center justify-between relative">
                    <!-- Progress line -->
                    <div class="absolute top-4 left-0 right-0 h-1 bg-gray-200 dark:bg-[#3E3E3A] -z-10"></div>
                    <div class="absolute top-4 left-0 h-1 bg-[#f53003] dark:bg-[#FF4433] -z-10" 
                         style="width: 
                         @if($booking->status == 'pending') 0%
                         @elseif($booking->status == 'confirmed') 33%
                         @elseif($booking->status == 'completed') 100%
                         @else 0%
                         @endif;"></div>
                    
                    <!-- Progress steps -->
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center
                            @if($booking->status == 'pending' || $booking->status == 'confirmed' || $booking->status == 'completed') 
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
                            @if($booking->status == 'confirmed' || $booking->status == 'completed') 
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
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection