@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <div class="bg-white dark:bg-[#161615] rounded-lg shadow overflow-hidden">
            <div class="p-6">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">{{ $service->name }}</h1>
                        <div class="mt-2 flex items-center">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="ml-2 text-gray-600 dark:text-gray-300">4.7 (128 reviews)</span>
                        </div>
                    </div>
                    <span class="bg-[#f53003] dark:bg-[#FF4433] text-white text-sm font-semibold px-3 py-1 rounded">
                        {{ $service->duration }} minutes
                    </span>
                </div>
                
                <p class="text-gray-600 dark:text-gray-300 mb-6">{{ $service->description }}</p>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    <div class="bg-gray-50 dark:bg-[#3E3E3A] rounded-lg p-4">
                        <div class="flex items-center">
                            <div class="text-[#f53003] dark:text-[#FF4433] text-xl mr-3">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Price</p>
                                <p class="text-xl font-bold text-[#f53003] dark:text-[#FF4433]">${{ number_format($service->price, 2) }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-gray-50 dark:bg-[#3E3E3A] rounded-lg p-4">
                        <div class="flex items-center">
                            <div class="text-[#f53003] dark:text-[#FF4433] text-xl mr-3">
                                <i class="fas fa-car"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Vehicle Types</p>
                                <p class="text-xl font-bold text-gray-900 dark:text-white">All Types</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-gray-50 dark:bg-[#3E3E3A] rounded-lg p-4">
                        <div class="flex items-center">
                            <div class="text-[#f53003] dark:text-[#FF4433] text-xl mr-3">
                                <i class="fas fa-tools"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Includes</p>
                                <p class="text-xl font-bold text-gray-900 dark:text-white">Premium Care</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="border-t border-gray-200 dark:border-[#3E3E3A] pt-6">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">What's Included</h2>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span class="text-gray-700 dark:text-gray-300">Exterior wash and dry</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span class="text-gray-700 dark:text-gray-300">Wheel and tire cleaning</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span class="text-gray-700 dark:text-gray-300">Window cleaning</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span class="text-gray-700 dark:text-gray-300">Interior vacuuming</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span class="text-gray-700 dark:text-gray-300">Dashboard and console wipe down</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span class="text-gray-700 dark:text-gray-300">Door jam cleaning</span>
                        </li>
                    </ul>
                </div>
                
                <div class="mt-8 flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('bookings.create', $service) }}" class="flex-1 bg-[#f53003] dark:bg-[#FF4433] text-white py-3 px-6 rounded-md hover:bg-[#d42500] dark:hover:bg-[#e03a2a] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] transition duration-300 text-center">
                        <i class="fas fa-calendar-check mr-2"></i> Book This Service
                    </a>
                    <a href="{{ route('services.index') }}" class="flex-1 bg-gray-200 dark:bg-[#3E3E3A] text-gray-800 dark:text-white py-3 px-6 rounded-md hover:bg-gray-300 dark:hover:bg-[#4E4E4A] transition duration-300 text-center">
                        <i class="fas fa-arrow-left mr-2"></i> Back to Services
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Customer Reviews -->
        <div class="mt-6 bg-white dark:bg-[#161615] rounded-lg shadow overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-[#3E3E3A]">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Customer Reviews</h2>
            </div>
            
            <div class="divide-y divide-gray-200 dark:divide-[#3E3E3A]">
                <div class="p-6">
                    <div class="flex items-center mb-4">
                    <div class="flex-shrink-0">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" 
                         alt="Michael Johnson" 
                         class="w-12 h-12 rounded-full object-cover border-2 border-gray-300">
                    </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white">Michael Johnson</h3>
                            <div class="flex items-center">
                                <div class="flex text-yellow-400">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <span class="ml-2 text-gray-500 dark:text-gray-400 text-sm">2 days ago</span>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-700 dark:text-gray-300">
                        "Exceptional service! My car has never looked better. The attention to detail is impressive, 
                        especially on the interior cleaning. Will definitely be coming back."
                    </p>
                </div>
                
                <div class="p-6">
                    <div class="flex items-center mb-4">
                    <div class="flex-shrink-0">
                    <img src="https://randomuser.me/api/portraits/women/44.jpg" 
                         alt="Sarah Williams" 
                         class="w-12 h-12 rounded-full object-cover border-2 border-gray-300">
                </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white">Sarah Williams</h3>
                            <div class="flex items-center">
                                <div class="flex text-yellow-400">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <span class="ml-2 text-gray-500 dark:text-gray-400 text-sm">1 week ago</span>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-700 dark:text-gray-300">
                        "Great value for money. The team was professional and efficient. My SUV was cleaned 
                        thoroughly inside and out. The wheel detailing was particularly impressive."
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection