@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Write a Review</h1>
            <a href="{{ route('customer.dashboard') }}" class="bg-gray-200 dark:bg-[#3E3E3A] text-gray-800 dark:text-white py-2 px-4 rounded-md hover:bg-gray-300 dark:hover:bg-[#4E4E4A] transition duration-300">
                <i class="fas fa-arrow-left mr-2"></i> Back to Dashboard
            </a>
        </div>
        
        <!-- Review Form -->
        <div class="bg-white dark:bg-[#161615] rounded-lg shadow p-6">
            <div class="mb-6 p-4 bg-gray-50 dark:bg-[#3E3E3A] rounded-lg">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Service Details</h3>
                <div class="flex justify-between">
                    <span class="text-gray-700 dark:text-gray-300">{{ $booking->service->name }}</span>
                    <span class="font-bold text-[#f53003] dark:text-[#FF4433]">${{ number_format($booking->service->price, 2) }}</span>
                </div>
                <div class="flex justify-between mt-1">
                    <span class="text-gray-700 dark:text-gray-300">Date & Time</span>
                    <span class="text-gray-700 dark:text-gray-300">{{ $booking->booking_date->format('M d, Y g:i A') }}</span>
                </div>
            </div>
            
            <form method="POST" action="{{ route('reviews.store', $booking) }}" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Rating</label>
                    <div class="flex items-center">
                        @for ($i = 1; $i <= 5; $i++)
                            <input type="radio" name="rating" id="rating{{ $i }}" value="{{ $i }}" class="hidden" required>
                            <label for="rating{{ $i }}" class="cursor-pointer text-3xl mr-1">
                                <i class="far fa-star text-gray-300 hover:text-yellow-400"></i>
                            </label>
                        @endfor
                    </div>
                </div>
                
                <div class="mb-6">
                    <label for="comment" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Comment</label>
                    <textarea name="comment" id="comment" rows="4" class="w-full px-3 py-2 border border-gray-300 dark:border-[#3E3E3A] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] bg-white dark:bg-[#161615] text-gray-900 dark:text-white"></textarea>
                </div>
                
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Photos (Optional)</label>
                    <div class="flex items-center justify-center w-full">
                        <label for="photos" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 dark:border-[#3E3E3A] border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-[#161615]">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-2"></i>
                                <p class="text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG, GIF (MAX. 5MB)</p>
                            </div>
                            <input id="photos" type="file" name="photos[]" multiple class="hidden" accept="image/*">
                        </label>
                    </div>
                </div>
                
                <div class="flex justify-end">
                    <button type="submit" class="bg-[#f53003] dark:bg-[#FF4433] text-white py-2 px-4 rounded-md hover:bg-[#d42500] dark:hover:bg-[#e03a2a] transition duration-300">
                        Submit Review
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script>
    // Rating stars functionality
    const stars = document.querySelectorAll('label[for^="rating"]');
    stars.forEach((star, index) => {
        star.addEventListener('click', () => {
            // Reset all stars
            stars.forEach(s => {
                s.innerHTML = '<i class="far fa-star text-gray-300 hover:text-yellow-400"></i>';
            });
            
            // Fill stars up to clicked one
            for (let i = 0; i <= index; i++) {
                stars[i].innerHTML = '<i class="fas fa-star text-yellow-400"></i>';
            }
            
            // Set radio button value
            document.getElementById(`rating${index + 1}`).checked = true;
        });
    });
</script>
@endsection