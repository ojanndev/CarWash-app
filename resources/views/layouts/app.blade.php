<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CarWash') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="shortcut icon" sizes="192x192" href="/logo.png" type="image/x-icon">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Alpine.js for dropdown functionality -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] min-h-screen">
    <div class="min-h-screen flex flex-col">
        <!-- Navigation -->
        <nav class="bg-white dark:bg-[#161615] shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="flex-shrink-0 flex items-center">
                        <a href="{{ url('/') }}" class="flex items-center">
                            <img src="{{ asset('logo.png') }}" alt="Car Wash Logo" class="h-16 md:h-20 w-auto">
                        </a>
                        </div>
                        <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                            <a href="{{ route('services.index') }}" class="border-[#f53003] dark:border-[#FF4433] text-gray-900 dark:text-white inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                Services
                            </a>
                            <a href="{{ route('promotions') }}" class="border-transparent text-gray-500 dark:text-gray-400 hover:border-gray-300 hover:text-gray-700 dark:hover:text-gray-300 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                Promotions
                            </a>
                            <a href="{{ route('about') }}" class="border-transparent text-gray-500 dark:text-gray-400 hover:border-gray-300 hover:text-gray-700 dark:hover:text-gray-300 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                About
                            </a>
                            <a href="{{ route('faq') }}" class="border-transparent text-gray-500 dark:text-gray-400 hover:border-gray-300 hover:text-gray-700 dark:hover:text-gray-300 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                FAQ
                            </a>
                            <a href="{{ route('contact') }}" class="border-transparent text-gray-500 dark:text-gray-400 hover:border-gray-300 hover:text-gray-700 dark:hover:text-gray-300 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                Contact
                            </a>
                        </div>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:items-center">
                        @auth
                            @if(auth()->guard('web')->check() && auth()->user()->id == 1) <!-- Admin user -->
                                <!-- Admin Navigation -->
                                <div x-data="{ open: false }" class="relative ml-4">
                                    <button @click="open = !open" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white flex items-center bg-gray-100 dark:bg-[#3E3E3A]">
                                        <i class="fas fa-user mr-2"></i> 
                                        <span class="hidden md:inline">{{ auth()->user()->name }}</span>
                                        <i class="fas fa-caret-down ml-1"></i>
                                    </button>
                                    
                                    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-56 bg-white dark:bg-[#161615] rounded-md shadow-lg py-1 z-50 border border-gray-200 dark:border-[#3E3E3A]">
                                        <div class="px-4 py-2 text-xs text-gray-500 dark:text-gray-400 border-b border-gray-200 dark:border-[#3E3E3A]">
                                            <i class="fas fa-user-shield mr-1"></i> Administrator
                                        </div>
                                        <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#3E3E3A]">
                                            <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                                        </a>
                                        <a href="{{ route('admin.bookings') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#3E3E3A]">
                                            <i class="fas fa-calendar-alt mr-2"></i> Bookings
                                        </a>
                                        <a href="{{ route('admin.services') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#3E3E3A]">
                                            <i class="fas fa-concierge-bell mr-2"></i> Services
                                        </a>
                                        <a href="{{ route('admin.customers') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#3E3E3A]">
                                            <i class="fas fa-users mr-2"></i> Customers
                                        </a>
                                        <a href="{{ route('admin.workers') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#3E3E3A]">
                                            <i class="fas fa-user-hard-hat mr-2"></i> Workers
                                        </a>
                                        <a href="{{ route('admin.inventory') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#3E3E3A]">
                                            <i class="fas fa-box mr-2"></i> Inventory
                                        </a>
                                        <a href="{{ route('admin.reports') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#3E3E3A]">
                                            <i class="fas fa-chart-bar mr-2"></i> Reports
                                        </a>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#3E3E3A]">
                                                <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @elseif(auth()->guard('customer')->check())
                                <!-- Customer Navigation -->
                                <div x-data="{ open: false }" class="relative ml-4">
                                    <button @click="open = !open" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white flex items-center bg-gray-100 dark:bg-[#3E3E3A]">
                                        <i class="fas fa-user mr-2"></i> 
                                        <span class="hidden md:inline">{{ auth()->guard('customer')->user()->name }}</span>
                                        <i class="fas fa-caret-down ml-1"></i>
                                    </button>
                                    
                                    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-56 bg-white dark:bg-[#161615] rounded-md shadow-lg py-1 z-50 border border-gray-200 dark:border-[#3E3E3A]">
                                        <div class="px-4 py-2 text-xs text-gray-500 dark:text-gray-400 border-b border-gray-200 dark:border-[#3E3E3A]">
                                            <i class="fas fa-user mr-1"></i> Customer
                                        </div>
                                        <a href="{{ route('customer.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#3E3E3A]">
                                            <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                                        </a>
                                        <a href="{{ route('bookings.index') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#3E3E3A]">
                                            <i class="fas fa-calendar-alt mr-2"></i> My Bookings
                                        </a>
                                        <a href="{{ route('customer.vehicles') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#3E3E3A]">
                                            <i class="fas fa-car mr-2"></i> My Vehicles
                                        </a>
                                        <a href="{{ route('customer.reviews') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#3E3E3A]">
                                            <i class="fas fa-star mr-2"></i> My Reviews
                                        </a>
                                        <a href="{{ route('customer.notifications') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#3E3E3A] relative">
                                            <i class="fas fa-bell mr-2"></i> Notifications
                                            @php
                                                $unreadCount = auth()->guard('customer')->user()->notifications()->where('is_read', false)->count();
                                            @endphp
                                            @if($unreadCount > 0)
                                                <span class="absolute right-4 bg-[#f53003] dark:bg-[#FF4433] text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">
                                                    {{ $unreadCount }}
                                                </span>
                                            @endif
                                        </a>
                                        <a href="{{ route('customer.profile') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#3E3E3A]">
                                            <i class="fas fa-user mr-2"></i> Profile
                                        </a>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#3E3E3A]">
                                                <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">
                                <i class="fas fa-sign-in-alt mr-1"></i> Login
                            </a>
                            <a href="{{ route('register') }}" class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">
                                <i class="fas fa-user-plus mr-1"></i> Register
                            </a>
                        @endauth
                    </div>
                    <!-- Mobile menu button -->
                    <div class="flex items-center sm:hidden">
                        <div x-data="{ mobileMenuOpen: false }" class="relative">
                            <button @click="mobileMenuOpen = !mobileMenuOpen" class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-[#3E3E3A] focus:outline-none">
                                <i class="fas fa-bars text-xl"></i>
                            </button>
                            
                            <div x-show="mobileMenuOpen" @click.away="mobileMenuOpen = false" class="absolute right-0 mt-2 w-48 bg-white dark:bg-[#161615] rounded-md shadow-lg py-1 z-50 border border-gray-200 dark:border-[#3E3E3A]">
                                <a href="{{ route('services.index') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#3E3E3A]">
                                    <i class="fas fa-concierge-bell mr-2"></i> Services
                                </a>
                                <a href="{{ route('promotions') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#3E3E3A]">
                                    <i class="fas fa-tag mr-2"></i> Promotions
                                </a>
                                <a href="{{ route('about') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#3E3E3A]">
                                    <i class="fas fa-info-circle mr-2"></i> About
                                </a>
                                <a href="{{ route('faq') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#3E3E3A]">
                                    <i class="fas fa-question-circle mr-2"></i> FAQ
                                </a>
                                <a href="{{ route('contact') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#3E3E3A]">
                                    <i class="fas fa-envelope mr-2"></i> Contact
                                </a>
                                
                                <div class="border-t border-gray-200 dark:border-[#3E3E3A] my-1"></div>
                                
                                @auth
                                    @if(auth()->guard('web')->check() && auth()->user()->id == 1) <!-- Admin user -->
                                    <div class="px-4 py-2 text-xs text-gray-500 dark:text-gray-400">
                                        <i class="fas fa-user-shield mr-1"></i> Administrator
                                    </div>
                                    <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#3E3E3A]">
                                        <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                                    </a>
                                    <a href="{{ route('admin.bookings') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#3E3E3A]">
                                        <i class="fas fa-calendar-alt mr-2"></i> Bookings
                                    </a>
                                    <a href="{{ route('admin.services') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#3E3E3A]">
                                        <i class="fas fa-concierge-bell mr-2"></i> Services
                                    </a>
                                    <a href="{{ route('admin.customers') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#3E3E3A]">
                                        <i class="fas fa-users mr-2"></i> Customers
                                    </a>
                                    <a href="{{ route('admin.workers') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#3E3E3A]">
                                        <i class="fas fa-user-hard-hat mr-2"></i> Workers
                                    </a>
                                    <a href="{{ route('admin.inventory') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#3E3E3A]">
                                        <i class="fas fa-box mr-2"></i> Inventory
                                    </a>
                                    <a href="{{ route('admin.reports') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#3E3E3A]">
                                        <i class="fas fa-chart-bar mr-2"></i> Reports
                                    </a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#3E3E3A]">
                                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                        </button>
                                    </form>
                                    @elseif(auth()->guard('customer')->check())
                                    <div class="px-4 py-2 text-xs text-gray-500 dark:text-gray-400">
                                        <i class="fas fa-user mr-1"></i> Customer
                                    </div>
                                    <a href="{{ route('customer.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#3E3E3A]">
                                        <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                                    </a>
                                    <a href="{{ route('bookings.index') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#3E3E3A]">
                                        <i class="fas fa-calendar-alt mr-2"></i> My Bookings
                                    </a>
                                    <a href="{{ route('customer.vehicles') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#3E3E3A]">
                                        <i class="fas fa-car mr-2"></i> My Vehicles
                                    </a>
                                    <a href="{{ route('customer.reviews') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#3E3E3A]">
                                        <i class="fas fa-star mr-2"></i> My Reviews
                                    </a>
                                    <a href="{{ route('customer.notifications') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#3E3E3A] relative">
                                        <i class="fas fa-bell mr-2"></i> Notifications
                                        @php
                                            $unreadCount = auth()->guard('customer')->user()->notifications()->where('is_read', false)->count();
                                        @endphp
                                        @if($unreadCount > 0)
                                            <span class="absolute right-4 bg-[#f53003] dark:bg-[#FF4433] text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">
                                                {{ $unreadCount }}
                                            </span>
                                        @endif
                                    </a>
                                    <a href="{{ route('customer.profile') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#3E3E3A]">
                                        <i class="fas fa-user mr-2"></i> Profile
                                    </a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#3E3E3A]">
                                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                        </button>
                                    </form>
                                    @endif
                                @else
                                    <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#3E3E3A]">
                                        <i class="fas fa-sign-in-alt mr-2"></i> Login
                                    </a>
                                    <a href="{{ route('register') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#3E3E3A]">
                                        <i class="fas fa-user-plus mr-2"></i> Register
                                    </a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="flex-grow">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-white dark:bg-[#161615] border-t border-gray-200 dark:border-[#3E3E3A]">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Car Wash Services</h3>
                        <ul class="space-y-2">
                            <li><a href="{{ route('services.index') }}" class="text-gray-600 dark:text-gray-400 hover:text-[#f53003] dark:hover:text-[#FF4433]">All Services</a></li>
                            <li><a href="{{ route('services.show', 1) }}" class="text-gray-600 dark:text-gray-400 hover:text-[#f53003] dark:hover:text-[#FF4433]">Exterior Wash</a></li>
                            <li><a href="{{ route('services.show', 2) }}" class="text-gray-600 dark:text-gray-400 hover:text-[#f53003] dark:hover:text-[#FF4433]">Interior Cleaning</a></li>
                            <li><a href="{{ route('services.show', 3) }}" class="text-gray-600 dark:text-gray-400 hover:text-[#f53003] dark:hover:text-[#FF4433]">Premium Detailing</a></li>
                        </ul>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Company</h3>
                        <ul class="space-y-2">
                            <li><a href="{{ route('about') }}" class="text-gray-600 dark:text-gray-400 hover:text-[#f53003] dark:hover:text-[#FF4433]">About Us</a></li>
                            <li><a href="{{ route('contact') }}" class="text-gray-600 dark:text-gray-400 hover:text-[#f53003] dark:hover:text-[#FF4433]">Contact</a></li>
                            <li><a href="{{ route('faq') }}" class="text-gray-600 dark:text-gray-400 hover:text-[#f53003] dark:hover:text-[#FF4433]">FAQ</a></li>
                        </ul>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Customer Service</h3>
                        <ul class="space-y-2">
                            <li><a href="{{ route('bookings.index') }}" class="text-gray-600 dark:text-gray-400 hover:text-[#f53003] dark:hover:text-[#FF4433]">My Bookings</a></li>
                            <li><a href="{{ route('customer.profile') }}" class="text-gray-600 dark:text-gray-400 hover:text-[#f53003] dark:hover:text-[#FF4433]">My Account</a></li>
                            <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-[#f53003] dark:hover:text-[#FF4433]">Support Center</a></li>
                        </ul>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Contact Info</h3>
                        <ul class="space-y-2 text-gray-600 dark:text-gray-400">
                            <li class="flex items-start">
                                <i class="fas fa-map-marker-alt mt-1 mr-2 text-[#f53003] dark:text-[#FF4433]"></i>
                                <span>123 Car Wash Street, City, State 12345</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-phone-alt mt-1 mr-2 text-[#f53003] dark:text-[#FF4433]"></i>
                                <span>(123) 456-7890</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-envelope mt-1 mr-2 text-[#f53003] dark:text-[#FF4433]"></i>
                                <span>info@carwash.demo</span>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="mt-8 pt-8 border-t border-gray-200 dark:border-[#3E3E3A] flex flex-col md:flex-row justify-between items-center">
                    <p class="text-center text-sm text-gray-500 dark:text-gray-400">
                        &copy; {{ date('Y') }} Car Wash App. All rights reserved.
                    </p>
                    <div class="mt-4 md:mt-0 flex space-x-6">
                        <a href="{{ route('terms') }}" class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 text-sm">
                            Terms & Conditions
                        </a>
                        <a href="{{ route('privacy') }}" class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 text-sm">
                            Privacy Policy
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</body>
</html>