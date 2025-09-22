@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <div class="max-w-2xl mx-auto bg-white dark:bg-[#161615] rounded-lg shadow p-6">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Book Service: {{ $service->name }}</h2>
            
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <div class="mb-6 p-4 bg-gray-50 dark:bg-[#3E3E3A] rounded-lg">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Service Details</h3>
                <div class="flex justify-between">
                    <span class="text-gray-700 dark:text-gray-300">{{ $service->name }}</span>
                    <span class="font-bold text-[#f53003] dark:text-[#FF4433]">${{ number_format($service->price, 2) }}</span>
                </div>
                <div class="flex justify-between mt-1">
                    <span class="text-gray-700 dark:text-gray-300">Duration</span>
                    <span class="text-gray-700 dark:text-gray-300">{{ $service->duration }} minutes</span>
                </div>
            </div>
            
            <form method="POST" action="{{ route('bookings.store') }}">
                @csrf
                
                <input type="hidden" name="service_id" value="{{ $service->id }}">
                
                <div class="mb-4">
                    <label for="booking_date" class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2">Booking Date & Time</label>
                    <input type="datetime-local" name="booking_date" id="booking_date" required class="w-full px-3 py-2 border border-gray-300 dark:border-[#3E3E3A] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] bg-white dark:bg-[#161615] text-gray-900 dark:text-white">
                </div>
                
                <div class="mb-4">
                    <label for="vehicle_type" class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2">Vehicle Type</label>
                    <select name="vehicle_type" id="vehicle_type" required class="w-full px-3 py-2 border border-gray-300 dark:border-[#3E3E3A] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] bg-white dark:bg-[#161615] text-gray-900 dark:text-white">
                        <option value="">Select vehicle type</option>
                        <option value="sedan">Sedan</option>
                        <option value="suv">SUV</option>
                        <option value="truck">Truck</option>
                        <option value="van">Van</option>
                        <option value="coupe">Coupe</option>
                        <option value="convertible">Convertible</option>
                        <option value="wagon">Wagon</option>
                    </select>
                </div>
                
                <div class="mb-4">
                    <label for="vehicle_make" class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2">Vehicle Make (Optional)</label>
                    <input type="text" name="vehicle_make" id="vehicle_make" class="w-full px-3 py-2 border border-gray-300 dark:border-[#3E3E3A] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] bg-white dark:bg-[#161615] text-gray-900 dark:text-white">
                </div>
                
                <div class="mb-4">
                    <label for="vehicle_model" class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2">Vehicle Model (Optional)</label>
                    <input type="text" name="vehicle_model" id="vehicle_model" class="w-full px-3 py-2 border border-gray-300 dark:border-[#3E3E3A] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] bg-white dark:bg-[#161615] text-gray-900 dark:text-white">
                </div>
                
                <div class="mb-6">
                    <label for="notes" class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2">Additional Notes (Optional)</label>
                    <textarea name="notes" id="notes" rows="3" class="w-full px-3 py-2 border border-gray-300 dark:border-[#3E3E3A] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] bg-white dark:bg-[#161615] text-gray-900 dark:text-white"></textarea>
                </div>
                
                <button type="submit" class="w-full bg-[#f53003] dark:bg-[#FF4433] text-white py-2 px-4 rounded-md hover:bg-[#d42500] dark:hover:bg-[#e03a2a] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] transition duration-300">
                    Confirm Booking
                </button>
            </form>
        </div>
    </div>
</div>
@endsection