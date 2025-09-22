@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Reviews & Ratings</h1>
            <a href="{{ route('customer.dashboard') }}" class="bg-gray-200 dark:bg-[#3E3E3A] text-gray-800 dark:text-white py-2 px-4 rounded-md hover:bg-gray-300 dark:hover:bg-[#4E4E4A] transition duration-300">
                <i class="fas fa-arrow-left mr-2"></i> Back to Dashboard
            </a>
        </div>
        
        <!-- Reviews List -->
        <div class="bg-white dark:bg-[#161615] rounded-lg shadow overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-[#3E3E3A]">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">My Reviews</h2>
            </div>
            
            @if ($reviews->count() > 0)
                <div class="divide-y divide-gray-200 dark:divide-[#3E3E3A]">
                    @foreach ($reviews as $review)
                        <div class="p-6">
                            <div class="flex justify-between">
                                <div>
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">{{ $review->booking->service->name }}</h3>
                                    <p class="text-gray-600 dark:text-gray-300">{{ $review->booking->booking_date->format('M d, Y') }}</p>
                                </div>
                                <div class="flex">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $review->rating)
                                            <i class="fas fa-star text-yellow-400"></i>
                                        @else
                                            <i class="far fa-star text-gray-300"></i>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                            
                            @if ($review->comment)
                                <div class="mt-4">
                                    <p class="text-gray-700 dark:text-gray-300">{{ $review->comment }}</p>
                                </div>
                            @endif
                            
                            @if ($review->photos->count() > 0)
                                <div class="mt-4 grid grid-cols-3 gap-2">
                                    @foreach ($review->photos as $photo)
                                        <img src="{{ asset($photo->path) }}" alt="Review photo" class="rounded-lg object-cover h-24">
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <div class="p-6">
                    <p class="text-gray-600 dark:text-gray-300 text-center">You haven't submitted any reviews yet.</p>
                </div>
            @endif
        </div>
        
        <!-- Pending Reviews -->
        @if ($pendingReviews->count() > 0)
            <div class="mt-6 bg-white dark:bg-[#161615] rounded-lg shadow overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-[#3E3E3A]">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Pending Reviews</h2>
                </div>
                
                <div class="divide-y divide-gray-200 dark:divide-[#3E3E3A]">
                    @foreach ($pendingReviews as $booking)
                        <div class="p-6">
                            <div class="flex justify-between">
                                <div>
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">{{ $booking->service->name }}</h3>
                                    <p class="text-gray-600 dark:text-gray-300">{{ $booking->booking_date->format('M d, Y') }}</p>
                                </div>
                                <a href="{{ route('reviews.create', $booking) }}" class="bg-[#f53003] dark:bg-[#FF4433] text-white py-2 px-4 rounded-md hover:bg-[#d42500] dark:hover:bg-[#e03a2a] transition duration-300">
                                    Write Review
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection