@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-[#0a1a2f] to-[#1a3a5f] text-white">
    <!-- Promo Banner -->
    @if($promoCode && $promoCode->isValid())
    <div class="bg-[#f53003] dark:bg-[#FF4433] text-white py-2">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-center md:text-left">
                    <i class="fas fa-gift mr-2"></i>
                    <strong>Special Offer:</strong> 
                    @if($promoCode->type === 'percentage')
                        Get {{ $promoCode->value }}% off your first car wash! 
                    @else
                        Get ${{ $promoCode->value }} off your first car wash! 
                    @endif
                    Use code <span class="font-mono">{{ $promoCode->code }}</span>
                </p>
                <a href="{{ route('promotions') }}" class="mt-2 md:mt-0 inline-block bg-white text-[#f53003] dark:text-[#FF4433] py-1 px-4 rounded-full text-sm font-semibold hover:bg-gray-100 transition duration-300">
                    View All Offers
                </a>
            </div>
        </div>
    </div>
    @endif
    
    <!-- Hero Section -->
    <div class="relative overflow-hidden">
        <!-- Background decoration -->
        <div class="absolute inset-0 z-0">
            <div class="absolute top-0 right-0 w-1/2 h-full bg-gradient-to-r from-transparent to-[#f53003] opacity-10"></div>
            <div class="absolute bottom-0 left-0 w-full h-1/3 bg-gradient-to-t from-[#f53003] to-transparent opacity-5"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24 z-10">
            <div class="flex flex-col md:flex-row items-center justify-between gap-12">
                <!-- Left Content -->
                <div class="md:w-1/2 space-y-6 text-center md:text-left">
                    <h1 class="text-4xl md:text-6xl font-bold leading-tight">
                        <span class="block">Professional</span>
                        <span class="block text-[#f53003]">Car Wash & Detailing</span>
                    </h1>
                    <p class="text-lg text-gray-300 max-w-lg mx-auto md:mx-0">
                        Premium car care services that keep your vehicle looking showroom-fresh. 
                        Fast, reliable, and affordable cleaning solutions for all car types.
                    </p>

                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start mt-8">
                        @auth
                            @if(auth()->guard('web')->check() && auth()->user()->id == 1) <!-- Admin -->
                                <a href="{{ route('admin.dashboard') }}" class="inline-block bg-[#f53003] hover:bg-[#d42500] text-white font-bold py-3 px-8 rounded-lg transition duration-300 shadow-lg shadow-[#f53003]/30">
                                    Admin Dashboard
                                </a>
                            @elseif(auth()->guard('customer')->check())
                                <a href="{{ route('customer.dashboard') }}" class="inline-block bg-[#f53003] hover:bg-[#d42500] text-white font-bold py-3 px-8 rounded-lg transition duration-300 shadow-lg shadow-[#f53003]/30">
                                    My Dashboard
                                </a>
                            @endif
                        @else
                            <a href="{{ route('services.index') }}" class="inline-block bg-[#f53003] hover:bg-[#d42500] text-white font-bold py-3 px-8 rounded-lg transition duration-300 shadow-lg shadow-[#f53003]/30">
                                View Services
                            </a>
                            <a href="{{ route('register') }}" class="inline-block bg-transparent border-2 border-white hover:bg-white hover:text-[#0a1a2f] text-white font-bold py-3 px-8 rounded-lg transition duration-300">
                                Register Now
                            </a>
                        @endauth
                    </div>

                    <!-- Stats -->
                    <div class="mt-10 grid grid-cols-3 gap-4 max-w-md mx-auto md:mx-0">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-[#f53003]">10K+</div>
                            <div class="text-gray-300 text-sm">Happy Customers</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-[#f53003]">50+</div>
                            <div class="text-gray-300 text-sm">Expert Staff</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-[#f53003]">12</div>
                            <div class="text-gray-300 text-sm">Locations</div>
                        </div>
                    </div>
                </div>

                <!-- Right Content (Car Image) -->
                <div class="md:w-1/2 flex justify-center">
                    <div class="relative w-full max-w-2xl">
                        <div class="absolute -top-6 -right-6 w-72 h-72 bg-[#f53003] rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
                        <div class="absolute -bottom-6 -left-6 w-72 h-72 bg-[#FF4433] rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
                        
                        <div class="relative rounded-2xl overflow-hidden">
                            <img src="{{ asset('car-icon.png') }}" alt="Luxury Car" class="w-full h-auto object-contain scale-140">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Services Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Our Premium Services</h2>
            <p class="text-gray-300 max-w-2xl mx-auto">
                We offer a comprehensive range of car care services to keep your vehicle in pristine condition.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white/10 backdrop-blur-lg rounded-xl p-6 border border-white/20 hover:border-[#f53003] transition-all duration-300 hover:-translate-y-2">
                <div class="text-[#f53003] text-5xl mb-4">
                    <i class="fas fa-car"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">Exterior Wash</h3>
                <p class="text-gray-300 mb-4">
                    Thorough cleaning of your car's exterior including body, wheels, and windows.
                </p>
                <a href="{{ route('services.show', 1) }}" class="text-[#f53003] hover:text-white font-medium flex items-center">
                    Learn more
                    <i class="fas fa-arrow-right ml-2 text-sm"></i>
                </a>
            </div>
            
            <div class="bg-white/10 backdrop-blur-lg rounded-xl p-6 border border-white/20 hover:border-[#f53003] transition-all duration-300 hover:-translate-y-2">
                <div class="text-[#f53003] text-5xl mb-4">
                    <i class="fas fa-tint"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">Interior Cleaning</h3>
                <p class="text-gray-300 mb-4">
                    Deep cleaning of your car's interior including seats, dashboard, and carpets.
                </p>
                <a href="{{ route('services.show', 2) }}" class="text-[#f53003] hover:text-white font-medium flex items-center">
                    Learn more
                    <i class="fas fa-arrow-right ml-2 text-sm"></i>
                </a>
            </div>
            
            <div class="bg-white/10 backdrop-blur-lg rounded-xl p-6 border border-white/20 hover:border-[#f53003] transition-all duration-300 hover:-translate-y-2">
                <div class="text-[#f53003] text-5xl mb-4">
                    <i class="fas fa-gem"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">Premium Detailing</h3>
                <p class="text-gray-300 mb-4">
                    Complete detailing package including waxing, polishing, and protection.
                </p>
                <a href="{{ route('services.show', 3) }}" class="text-[#f53003] hover:text-white font-medium flex items-center">
                    Learn more
                    <i class="fas fa-arrow-right ml-2 text-sm"></i>
                </a>
            </div>
        </div>
        
        <div class="mt-12 text-center">
            <a href="{{ route('services.index') }}" class="inline-block bg-[#f53003] hover:bg-[#d42500] text-white font-bold py-3 px-8 rounded-lg transition duration-300 shadow-lg shadow-[#f53003]/30">
                View All Services
            </a>
        </div>
    </div>

    <!-- Features Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold mb-6">Why Choose Our Car Wash Services?</h2>
                <div class="space-y-6">
                    <div class="flex items-start">
                        <div class="text-[#f53003] text-2xl mr-4">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2">Eco-Friendly Products</h3>
                            <p class="text-gray-300">
                                We use biodegradable and environmentally safe cleaning products to protect your car and the planet.
                            </p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="text-[#f53003] text-2xl mr-4">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2">Expert Technicians</h3>
                            <p class="text-gray-300">
                                Our trained professionals handle your vehicle with care and attention to detail.
                            </p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="text-[#f53003] text-2xl mr-4">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2">Convenient Locations</h3>
                            <p class="text-gray-300">
                                With 12 locations across the nation, we're always nearby when you need us.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <div class="relative w-full max-w-md">
                    <div class="absolute -top-6 -left-6 w-48 h-48 bg-[#f53003] rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
                    <div class="relative bg-white/10 backdrop-blur-lg rounded-2xl p-8 border border-white/20">
                        <div class="text-center">
                            <div class="text-5xl font-bold text-[#f53003] mb-2">30%</div>
                            <div class="text-xl font-bold mb-4">OFF</div>
                            <div class="text-gray-300 mb-6">For First-Time Customers</div>
                            <div class="bg-white/20 rounded-lg py-2 px-4 inline-block">
                                <span class="font-mono">FIRST30</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonials -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">What Our Customers Say</h2>
            <p class="text-gray-300 max-w-2xl mx-auto">
                Don't just take our word for it - hear from our satisfied customers.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white/10 backdrop-blur-lg rounded-xl p-6 border border-white/20">
                <div class="flex items-center mb-4">
                    <div class="text-yellow-400 mr-1">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <p class="text-gray-300 mb-6">
                    "The detailing service transformed my 5-year-old car to look like new! Professional staff and excellent attention to detail."
                </p>
                <div class="flex items-center">
                <div class="w-12 h-12 mr-4 rounded-full overflow-hidden border-2 border-[#f53003] dark:border-[#FF4433]">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="David Chen" class="w-full h-full object-cover">
                </div>
                    <div>
                        <div class="font-bold">Michael Johnson</div>
                        <div class="text-gray-400 text-sm">Car Owner</div>
                    </div>
                </div>
            </div>
            
            <div class="bg-white/10 backdrop-blur-lg rounded-xl p-6 border border-white/20">
                <div class="flex items-center mb-4">
                    <div class="text-yellow-400 mr-1">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <p class="text-gray-300 mb-6">
                    "I've been using their services for over 2 years now. Consistently great quality and punctual service. Highly recommended!"
                </p>
                <div class="flex items-center">
                <div class="w-12 h-12 mr-4 rounded-full overflow-hidden border-2 border-[#f53003] dark:border-[#FF4433]">
                    <img src="https://randomuser.me/api/portraits/women/45.jpg" alt="Sarah Williams" class="w-full h-full object-cover">
                </div>
                    <div>
                        <div class="font-bold">Sarah Williams</div>
                        <div class="text-gray-400 text-sm">Regular Customer</div>
                    </div>
                </div>
            </div>
            
            <div class="bg-white/10 backdrop-blur-lg rounded-xl p-6 border border-white/20">
                <div class="flex items-center mb-4">
                    <div class="text-yellow-400 mr-1">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
                <p class="text-gray-300 mb-6">
                    "Quick, efficient, and affordable. My car always comes back spotl
                    ess. The interior cleaning is particularly impressive."
                </p>
                <div class="flex items-center">
                <div class="w-12 h-12 mr-4 rounded-full overflow-hidden border-2 border-[#f53003] dark:border-[#FF4433]">
                    <img src="https://randomuser.me/api/portraits/men/76.jpg" alt="Michael Johnson" class="w-full h-full object-cover">
                </div>
                    <div>
                        <div class="font-bold">David Chen</div>
                        <div class="text-gray-400 text-sm">Business Client</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom Styles -->
<style>
    @keyframes blob {
        0% {
            transform: translate(0px, 0px) scale(1);
        }
        33% {
            transform: translate(30px, -50px) scale(1.1);
        }
        66% {
            transform: translate(-20px, 20px) scale(0.9);
        }
        100% {
            transform: translate(0px, 0px) scale(1);
        }
    }
    .animate-blob {
        animation: blob 7s infinite;
    }
    .animation-delay-2000 {
        animation-delay: 2s;
    }
    .animation-delay-4000 {
        animation-delay: 4s;
    }
</style>

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection 