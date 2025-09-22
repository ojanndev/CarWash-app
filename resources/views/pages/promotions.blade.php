@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <!-- Hero Section -->
        <div 
             class="relative bg-cover bg-center bg-no-repeat rounded-lg shadow-xl overflow-hidden mb-12"
            style="background-image: url('https://images.unsplash.com/photo-1607860108855-64acf2078ed9?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTF8fHByb21vdGlvbiUyMGNhcndhc2h8ZW58MHx8MHx8fDA%3D'); background-color: #0a1a2f;">            
            <div class="absolute inset-0 bg-black opacity-50"></div>
            <div class="relative max-w-7xl mx-auto px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
                <div class="text-center">
                    <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">
                        Special Offers & Promotions
                    </h1>
                    <p class="mt-6 max-w-lg mx-auto text-xl text-gray-300">
                        Take advantage of our limited-time offers and save on premium car care services.
                    </p>
                </div>
            </div>
        </div>
        
        <!-- Current Promotions -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-8 text-center">Current Promotions</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($promos as $promo)
                <div class="bg-white dark:bg-[#161615] rounded-lg shadow overflow-hidden transform transition duration-300 hover:scale-105">
                    <div class="bg-gradient-to-r from-[#f53003] to-[#FF4433] p-6 text-white">
                        <h3 class="text-2xl font-bold mb-2">{{ $promo->name }}</h3>
                        <div class="text-4xl font-bold">
                            @if($promo->type === 'percentage')
                                {{ $promo->value }}% OFF
                            @else
                                ${{ $promo->value }} OFF
                            @endif
                        </div>
                        <p class="mt-2">{{ $promo->description }}</p>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-600 dark:text-gray-300 mb-4">
                            {{ $promo->description }}
                        </p>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-sm text-gray-500 dark:text-gray-400">Valid until</span>
                            <span class="font-semibold">
                                @if($promo->end_date)
                                    {{ $promo->end_date->format('M d, Y') }}
                                @else
                                    Ongoing
                                @endif
                            </span>
                        </div>
                        <div class="bg-gray-100 dark:bg-[#3E3E3A] rounded-lg p-3">
                            <p class="text-center font-mono text-lg">{{ $promo->code }}</p>
                        </div>
                        <a href="{{ route('services.index') }}" class="mt-4 inline-block w-full bg-[#f53003] dark:bg-[#FF4433] text-white py-2 px-4 rounded-md hover:bg-[#d42500] dark:hover:bg-[#e03a2a] transition duration-300 text-center">
                            Redeem Now
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-span-3">
                    <div class="bg-white dark:bg-[#161615] rounded-lg shadow p-8 text-center">
                        <i class="fas fa-gift text-5xl text-gray-300 mb-4"></i>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">No Current Promotions</h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            Check back later for exciting offers and discounts!
                        </p>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
        
        <!-- How It Works -->
        <div class="bg-white dark:bg-[#161615] rounded-lg shadow p-6 mb-12">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6 text-center">How to Redeem Offers</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 bg-[#f53003] dark:bg-[#FF4433] rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-ticket-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Get Promo Code</h3>
                    <p class="text-gray-600 dark:text-gray-300">
                        Find a promotion that interests you and copy the promo code.
                    </p>
                </div>
                
                <div class="text-center">
                    <div class="w-16 h-16 bg-[#f53003] dark:bg-[#FF4433] rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-calendar-check text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Book Service</h3>
                    <p class="text-gray-600 dark:text-gray-300">
                        Book your preferred service and enter the promo code during checkout.
                    </p>
                </div>
                
                <div class="text-center">
                    <div class="w-16 h-16 bg-[#f53003] dark:bg-[#FF4433] rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-car text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Enjoy Savings</h3>
                    <p class="text-gray-600 dark:text-gray-300">
                        Arrive for your appointment and enjoy your discounted service.
                    </p>
                </div>
            </div>
        </div>
        
        <!-- Referral Program -->
        <div class="bg-gradient-to-r from-[#0a1a2f] to-[#1a3a5f] rounded-lg shadow p-8 text-white">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                <div>
                    <h2 class="text-3xl font-bold mb-4">Refer a Friend</h2>
                    <p class="text-gray-300 mb-6">
                        Share your love for our services and earn rewards! For every friend you refer who books a service, you'll both receive $10 off your next visit.
                    </p>
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-[#f53003] dark:bg-[#FF4433] rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-gift text-white"></i>
                        </div>
                        <span>Get $10 credit for each successful referral</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-[#f53003] dark:bg-[#FF4433] rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-share-alt text-white"></i>
                        </div>
                        <span>Share via email, social media, or direct link</span>
                    </div>
                </div>
                <div class="bg-white/10 backdrop-blur-lg rounded-xl p-6 border border-white/20">
                    <h3 class="text-xl font-bold mb-4">Your Referral Link</h3>
                    <div class="bg-white/20 rounded-lg p-3 mb-4">
                        <p class="font-mono text-sm break-all">
                            @auth('customer')
                                {{ url('/referral/' . Auth::guard('customer')->id()) }}
                            @else
                                Please log in to get your referral link
                            @endauth
                        </p>
                    </div>
                    <div class="flex space-x-3">
                        @auth('customer')
                            <button class="flex-1 bg-[#f53003] dark:bg-[#FF4433] text-white py-2 px-4 rounded-md hover:bg-[#d42500] dark:hover:bg-[#e03a2a] transition duration-300" onclick="copyToClipboard('{{ url('/referral/' . Auth::guard('customer')->id()) }}')">
                                <i class="fas fa-copy mr-2"></i> Copy Link
                            </button>
                            <button class="flex-1 bg-white text-[#0a1a2f] py-2 px-4 rounded-md hover:bg-gray-100 transition duration-300">
                                <i class="fas fa-share mr-2"></i> Share
                            </button>
                        @else
                            <a href="{{ route('login') }}" class="flex-1 bg-[#f53003] dark:bg-[#FF4433] text-white py-2 px-4 rounded-md hover:bg-[#d42500] dark:hover:bg-[#e03a2a] transition duration-300 text-center">
                                <i class="fas fa-sign-in-alt mr-2"></i> Login to Get Link
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script>
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(function() {
            alert('Referral link copied to clipboard!');
        }).catch(function(error) {
            console.error('Failed to copy: ', error);
        });
    }
</script>
@endsection