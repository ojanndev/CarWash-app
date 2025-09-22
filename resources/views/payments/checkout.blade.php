@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <div class="max-w-2xl mx-auto bg-white dark:bg-[#161615] rounded-lg shadow p-6">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Payment for Booking #{{ $booking->id }}</h2>
            
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
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Booking Details</h3>
                <div class="flex justify-between">
                    <span class="text-gray-700 dark:text-gray-300">Service</span>
                    <span class="font-bold text-[#f53003] dark:text-[#FF4433]">{{ $booking->service->name }}</span>
                </div>
                <div class="flex justify-between mt-1">
                    <span class="text-gray-700 dark:text-gray-300">Date & Time</span>
                    <span class="text-gray-700 dark:text-gray-300">{{ $booking->booking_date->format('M d, Y H:i') }}</span>
                </div>
                <div class="flex justify-between mt-1">
                    <span class="text-gray-700 dark:text-gray-300">Vehicle</span>
                    <span class="text-gray-700 dark:text-gray-300">{{ ucfirst($booking->vehicle_type) }}</span>
                </div>
                <div class="flex justify-between mt-2 pt-2 border-t border-gray-200 dark:border-[#4E4E4A]">
                    <span class="text-lg font-semibold text-gray-900 dark:text-white">Total Amount</span>
                    <span class="text-lg font-bold text-[#f53003] dark:text-[#FF4433]">${{ number_format($booking->total_price, 2) }}</span>
                </div>
            </div>
            
            <form method="POST" action="{{ route('payments.process', $booking) }}">
                @csrf
                
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Payment Method</h3>
                    
                    <div class="space-y-3">
                        <div class="flex items-center border border-gray-300 dark:border-[#3E3E3A] rounded-lg p-4 hover:border-[#f53003] dark:hover:border-[#FF4433] cursor-pointer">
                            <input type="radio" name="payment_method" id="credit_card" value="credit_card" class="h-4 w-4 text-[#f53003] dark:text-[#FF4433] focus:ring-[#f53003] dark:focus:ring-[#FF4433] border-gray-300 dark:border-[#3E3E3A]" required>
                            <label for="credit_card" class="ml-3 block text-gray-700 dark:text-gray-300 flex items-center w-full cursor-pointer">
                                <i class="fab fa-cc-visa text-2xl mr-3 text-blue-600"></i>
                                <i class="fab fa-cc-mastercard text-2xl mr-3 text-red-600"></i>
                                <span>Credit/Debit Card</span>
                            </label>
                        </div>
                        
                        <div class="flex items-center border border-gray-300 dark:border-[#3E3E3A] rounded-lg p-4 hover:border-[#f53003] dark:hover:border-[#FF4433] cursor-pointer">
                            <input type="radio" name="payment_method" id="paypal" value="paypal" class="h-4 w-4 text-[#f53003] dark:text-[#FF4433] focus:ring-[#f53003] dark:focus:ring-[#FF4433] border-gray-300 dark:border-[#3E3E3A]">
                            <label for="paypal" class="ml-3 block text-gray-700 dark:text-gray-300 flex items-center w-full cursor-pointer">
                                <i class="fab fa-paypal text-2xl mr-3 text-blue-500"></i>
                                <span>PayPal</span>
                            </label>
                        </div>
                        
                        <div class="flex items-center border border-gray-300 dark:border-[#3E3E3A] rounded-lg p-4 hover:border-[#f53003] dark:hover:border-[#FF4433] cursor-pointer">
                            <input type="radio" name="payment_method" id="bank_transfer" value="bank_transfer" class="h-4 w-4 text-[#f53003] dark:text-[#FF4433] focus:ring-[#f53003] dark:focus:ring-[#FF4433] border-gray-300 dark:border-[#3E3E3A]">
                            <label for="bank_transfer" class="ml-3 block text-gray-700 dark:text-gray-300 flex items-center w-full cursor-pointer">
                                <i class="fas fa-university text-2xl mr-3 text-green-600"></i>
                                <span>Bank Transfer</span>
                            </label>
                        </div>
                        
                        <div class="flex items-center border border-gray-300 dark:border-[#3E3E3A] rounded-lg p-4 hover:border-[#f53003] dark:hover:border-[#FF4433] cursor-pointer">
                            <input type="radio" name="payment_method" id="cash_on_delivery" value="cash_on_delivery" class="h-4 w-4 text-[#f53003] dark:text-[#FF4433] focus:ring-[#f53003] dark:focus:ring-[#FF4433] border-gray-300 dark:border-[#3E3E3A]">
                            <label for="cash_on_delivery" class="ml-3 block text-gray-700 dark:text-gray-300 flex items-center w-full cursor-pointer">
                                <i class="fas fa-money-bill-wave text-2xl mr-3 text-green-600"></i>
                                <span>Cash on Delivery</span>
                            </label>
                        </div>
                        
                        <div class="flex items-center border border-gray-300 dark:border-[#3E3E3A] rounded-lg p-4 hover:border-[#f53003] dark:hover:border-[#FF4433] cursor-pointer">
                            <input type="radio" name="payment_method" id="qris" value="qris" class="h-4 w-4 text-[#f53003] dark:text-[#FF4433] focus:ring-[#f53003] dark:focus:ring-[#FF4433] border-gray-300 dark:border-[#3E3E3A]">
                            <label for="qris" class="ml-3 block text-gray-700 dark:text-gray-300 flex items-center w-full cursor-pointer">
                                <i class="fas fa-qrcode text-2xl mr-3 text-purple-600"></i>
                                <span>QRIS (QR Code)</span>
                            </label>
                        </div>
                    </div>
                </div>
                
                <!-- Credit Card Form (Hidden by default) -->
                <div id="creditCardForm" class="mb-6 hidden">
                    <div class="bg-gray-50 dark:bg-[#3E3E3A] rounded-lg p-4">
                        <h4 class="text-md font-semibold text-gray-900 dark:text-white mb-3">Card Information</h4>
                        
                        <div class="mb-3">
                            <label for="card_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Card Number</label>
                            <input type="text" id="card_number" placeholder="1234 5678 9012 3456" class="w-full px-3 py-2 border border-gray-300 dark:border-[#3E3E3A] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] bg-white dark:bg-[#161615] text-gray-900 dark:text-white">
                        </div>
                        
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label for="expiry_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Expiry Date</label>
                                <input type="text" id="expiry_date" placeholder="MM/YY" class="w-full px-3 py-2 border border-gray-300 dark:border-[#3E3E3A] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] bg-white dark:bg-[#161615] text-gray-900 dark:text-white">
                            </div>
                            
                            <div>
                                <label for="cvv" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">CVV</label>
                                <input type="text" id="cvv" placeholder="123" class="w-full px-3 py-2 border border-gray-300 dark:border-[#3E3E3A] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] bg-white dark:bg-[#161615] text-gray-900 dark:text-white">
                            </div>
                        </div>
                        
                        <div class="mt-3">
                            <label for="card_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Cardholder Name</label>
                            <input type="text" id="card_name" placeholder="John Doe" class="w-full px-3 py-2 border border-gray-300 dark:border-[#3E3E3A] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] bg-white dark:bg-[#161615] text-gray-900 dark:text-white">
                        </div>
                    </div>
                </div>
                
                <!-- Promo Code -->
                <div class="mb-6">
                    <label for="promo_code" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Promo Code (Optional)</label>
                    <div class="flex">
                        <input type="text" id="promo_code" name="promo_code" placeholder="Enter promo code" class="flex-1 px-3 py-2 border border-gray-300 dark:border-[#3E3E3A] rounded-l-md focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] bg-white dark:bg-[#161615] text-gray-900 dark:text-white" value="{{ old('promo_code') }}">
                        <button type="button" id="applyPromoBtn" class="bg-gray-200 dark:bg-[#3E3E3A] text-gray-800 dark:text-white px-4 rounded-r-md hover:bg-gray-300 dark:hover:bg-[#4E4E4A] transition duration-300">
                            Apply
                        </button>
                    </div>
                    <div id="promoMessage" class="mt-2 text-sm"></div>
                </div>
                
                <div class="flex justify-between">
                    <a href="{{ route('bookings.show', $booking) }}" class="bg-gray-200 dark:bg-[#3E3E3A] text-gray-800 dark:text-white py-2 px-4 rounded-md hover:bg-gray-300 dark:hover:bg-[#4E4E4A] transition duration-300">
                        Back to Booking
                    </a>
                    <button type="submit" class="bg-[#f53003] dark:bg-[#FF4433] text-white py-2 px-4 rounded-md hover:bg-[#d42500] dark:hover:bg-[#e03a2a] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] transition duration-300">
                        Process Payment
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script>
    // Show credit card form when credit card option is selected
    document.getElementById('credit_card').addEventListener('change', function() {
        if (this.checked) {
            document.getElementById('creditCardForm').classList.remove('hidden');
        } else {
            document.getElementById('creditCardForm').classList.add('hidden');
        }
    });
    
    // Hide credit card form when other options are selected
    const otherOptions = ['paypal', 'bank_transfer', 'cash_on_delivery', 'qris'];
    otherOptions.forEach(option => {
        document.getElementById(option).addEventListener('change', function() {
            document.getElementById('creditCardForm').classList.add('hidden');
        });
    });
    
    // Promo code functionality
    document.getElementById('applyPromoBtn').addEventListener('click', function() {
        const promoCode = document.getElementById('promo_code').value;
        const bookingId = {{ $booking->id }};
        const messageDiv = document.getElementById('promoMessage');
        
        if (!promoCode) {
            messageDiv.innerHTML = '<span class="text-red-500">Please enter a promo code</span>';
            return;
        }
        
        // Send AJAX request to validate promo code
        fetch('{{ route('promo.validate') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                code: promoCode,
                booking_id: bookingId
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.valid) {
                messageDiv.innerHTML = `
                    <span class="text-green-500">
                        Promo code applied! You save ${data.discount.toFixed(2)}. 
                        New total: ${data.new_total.toFixed(2)}
                    </span>
                `;
                // Update the total amount display
                document.querySelector('.text-[#f53003].dark\\:text-\\[\\#FF4433\\]').textContent = ' + data.new_total.toFixed(2);
            } else {
                messageDiv.innerHTML = `<span class="text-red-500">${data.message}</span>`;
            }
        })
        .catch(error => {
            messageDiv.innerHTML = '<span class="text-red-500">An error occurred. Please try again.</span>';
        });
    });
</script>
@endsection