@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">Our Services</h1>
        
        <!-- Search and Filter -->
        <div class="bg-white dark:bg-[#161615] rounded-lg shadow p-6 mb-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label for="search" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Search</label>
                    <input type="text" id="search" placeholder="Search services..." class="w-full px-3 py-2 border border-gray-300 dark:border-[#3E3E3A] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] bg-white dark:bg-[#161615] text-gray-900 dark:text-white">
                </div>
                
                <div>
                    <label for="vehicle_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Vehicle Type</label>
                    <select id="vehicle_type" class="w-full px-3 py-2 border border-gray-300 dark:border-[#3E3E3A] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] bg-white dark:bg-[#161615] text-gray-900 dark:text-white">
                        <option value="">All Vehicles</option>
                        <option value="sedan">Sedan</option>
                        <option value="suv">SUV</option>
                        <option value="truck">Truck</option>
                        <option value="van">Van</option>
                        <option value="coupe">Coupe</option>
                        <option value="convertible">Convertible</option>
                        <option value="wagon">Wagon</option>
                    </select>
                </div>
                
                <div>
                    <label for="sort_by" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Sort By</label>
                    <select id="sort_by" class="w-full px-3 py-2 border border-gray-300 dark:border-[#3E3E3A] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] bg-white dark:bg-[#161615] text-gray-900 dark:text-white">
                        <option value="name">Name</option>
                        <option value="price_low">Price: Low to High</option>
                        <option value="price_high">Price: High to Low</option>
                        <option value="duration">Duration</option>
                    </select>
                </div>
                
                <div class="flex items-end">
                    <button class="w-full bg-[#f53003] dark:bg-[#FF4433] text-white py-2 px-4 rounded-md hover:bg-[#d42500] dark:hover:bg-[#e03a2a] transition duration-300">
                        <i class="fas fa-filter mr-2"></i> Filter
                    </button>
                </div>
            </div>
        </div>
        
        @if ($services->isEmpty())
            <div class="bg-white dark:bg-[#161615] rounded-lg shadow p-6 text-center">
                <p class="text-gray-600 dark:text-gray-300">No services available at the moment.</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($services as $service)
                    <div class="bg-white dark:bg-[#161615] rounded-lg shadow overflow-hidden hover:shadow-lg transition duration-300">
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">{{ $service->name }}</h3>
                                <span class="bg-[#f53003] dark:bg-[#FF4433] text-white text-xs font-semibold px-2.5 py-0.5 rounded">
                                    {{ $service->duration }} min
                                </span>
                            </div>
                            <p class="text-gray-600 dark:text-gray-300 mb-4">{{ $service->description }}</p>
                            <div class="flex justify-between items-center mb-4">
                                <span class="text-lg font-bold text-[#f53003] dark:text-[#FF4433]">${{ number_format($service->price, 2) }}</span>
                                <span class="text-sm text-gray-500 dark:text-gray-400">
                                    <i class="fas fa-star text-yellow-400"></i>
                                    <span>4.8</span>
                                </span>
                            </div>
                            <a href="{{ route('bookings.create', $service) }}" class="w-full bg-[#f53003] dark:bg-[#FF4433] text-white py-2 px-4 rounded-md hover:bg-[#d42500] dark:hover:bg-[#e03a2a] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] transition duration-300 text-center block">
                                Book Now
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            <div class="mt-6">
                {{ $services->links() }}
            </div>
        @endif
    </div>
</div>

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection