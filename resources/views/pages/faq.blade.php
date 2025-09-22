@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <!-- Hero Section -->
        <div 
             class="relative bg-cover bg-center bg-no-repeat rounded-lg shadow-xl overflow-hidden mb-12"
            style="background-image: url('https://images.unsplash.com/photo-1694025893767-9a212606fbc5?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8Z2FyYWdlJTIwd2FzaHxlbnwwfHwwfHx8MA%3D%3D'); background-color: #0a1a2f;">
            <div class="absolute inset-0 bg-black opacity-50"></div>
            <div class="relative max-w-7xl mx-auto px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
                <div class="text-center">
                    <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">
                        Frequently Asked Questions
                    </h1>
                    <p class="mt-6 max-w-lg mx-auto text-xl text-gray-300">
                        Find answers to common questions about our car wash services.
                    </p>
                </div>
            </div>
        </div>
        
        <!-- FAQ Content -->
        <div class="bg-white dark:bg-[#161615] rounded-lg shadow p-6">
            <div class="space-y-8">
                <!-- General Questions -->
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">General Questions</h2>
                    <div class="space-y-4">
                        <div class="border border-gray-200 dark:border-[#3E3E3A] rounded-lg">
                            <button class="flex justify-between items-center w-full p-4 text-left focus:outline-none faq-button">
                                <span class="text-lg font-medium text-gray-900 dark:text-white">What services do you offer?</span>
                                <i class="fas fa-chevron-down text-gray-500 dark:text-gray-400 transform transition-transform duration-300"></i>
                            </button>
                            <div class="px-4 pb-4 text-gray-600 dark:text-gray-300 faq-content hidden">
                                <p>We offer a comprehensive range of car care services including exterior wash, interior cleaning, premium detailing, waxing, polishing, and more. Visit our Services page for a complete list of offerings.</p>
                            </div>
                        </div>
                        
                        <div class="border border-gray-200 dark:border-[#3E3E3A] rounded-lg">
                            <button class="flex justify-between items-center w-full p-4 text-left focus:outline-none faq-button">
                                <span class="text-lg font-medium text-gray-900 dark:text-white">How long does a typical car wash take?</span>
                                <i class="fas fa-chevron-down text-gray-500 dark:text-gray-400 transform transition-transform duration-300"></i>
                            </button>
                            <div class="px-4 pb-4 text-gray-600 dark:text-gray-300 faq-content hidden">
                                <p>Our basic exterior wash takes about 15-20 minutes, while our premium detailing service can take 2-4 hours depending on the vehicle size and condition. You can see the estimated duration for each service on our booking page.</p>
                            </div>
                        </div>
                        
                        <div class="border border-gray-200 dark:border-[#3E3E3A] rounded-lg">
                            <button class="flex justify-between items-center w-full p-4 text-left focus:outline-none faq-button">
                                <span class="text-lg font-medium text-gray-900 dark:text-white">Do you offer mobile services?</span>
                                <i class="fas fa-chevron-down text-gray-500 dark:text-gray-400 transform transition-transform duration-300"></i>
                            </button>
                            <div class="px-4 pb-4 text-gray-600 dark:text-gray-300 faq-content hidden">
                                <p>Currently, we operate from our fixed locations. However, we're exploring mobile service options for corporate clients. Please contact us for more information about potential mobile services in your area.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Booking & Payment -->
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Booking & Payment</h2>
                    <div class="space-y-4">
                        <div class="border border-gray-200 dark:border-[#3E3E3A] rounded-lg">
                            <button class="flex justify-between items-center w-full p-4 text-left focus:outline-none faq-button">
                                <span class="text-lg font-medium text-gray-900 dark:text-white">How do I book a service?</span>
                                <i class="fas fa-chevron-down text-gray-500 dark:text-gray-400 transform transition-transform duration-300"></i>
                            </button>
                            <div class="px-4 pb-4 text-gray-600 dark:text-gray-300 faq-content hidden">
                                <p>You can book a service through our website by selecting a service, choosing your vehicle type, picking a convenient date and time, and completing the booking process. You'll receive a confirmation email with all the details.</p>
                            </div>
                        </div>
                        
                        <div class="border border-gray-200 dark:border-[#3E3E3A] rounded-lg">
                            <button class="flex justify-between items-center w-full p-4 text-left focus:outline-none faq-button">
                                <span class="text-lg font-medium text-gray-900 dark:text-white">What payment methods do you accept?</span>
                                <i class="fas fa-chevron-down text-gray-500 dark:text-gray-400 transform transition-transform duration-300"></i>
                            </button>
                            <div class="px-4 pb-4 text-gray-600 dark:text-gray-300 faq-content hidden">
                                <p>We accept all major credit cards, debit cards, PayPal, bank transfers, and QRIS (QR Code) payments. For your convenience, you can also pay in cash upon arrival for certain services.</p>
                            </div>
                        </div>
                        
                        <div class="border border-gray-200 dark:border-[#3E3E3A] rounded-lg">
                            <button class="flex justify-between items-center w-full p-4 text-left focus:outline-none faq-button">
                                <span class="text-lg font-medium text-gray-900 dark:text-white">Can I cancel or reschedule my booking?</span>
                                <i class="fas fa-chevron-down text-gray-500 dark:text-gray-400 transform transition-transform duration-300"></i>
                            </button>
                            <div class="px-4 pb-4 text-gray-600 dark:text-gray-300 faq-content hidden">
                                <p>Yes, you can cancel or reschedule your booking up to 24 hours before the scheduled time without any charge. Cancellations made within 24 hours may incur a fee. Please contact our customer service team to make changes to your booking.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Vehicle Care -->
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Vehicle Care</h2>
                    <div class="space-y-4">
                        <div class="border border-gray-200 dark:border-[#3E3E3A] rounded-lg">
                            <button class="flex justify-between items-center w-full p-4 text-left focus:outline-none faq-button">
                                <span class="text-lg font-medium text-gray-900 dark:text-white">Are your products safe for all vehicle types?</span>
                                <i class="fas fa-chevron-down text-gray-500 dark:text-gray-400 transform transition-transform duration-300"></i>
                            </button>
                            <div class="px-4 pb-4 text-gray-600 dark:text-gray-300 faq-content hidden">
                                <p>Yes, we use pH-balanced, eco-friendly products that are safe for all vehicle types including cars, SUVs, trucks, and motorcycles. Our products are specially formulated to clean effectively without damaging paint, chrome, or other surfaces.</p>
                            </div>
                        </div>
                        
                        <div class="border border-gray-200 dark:border-[#3E3E3A] rounded-lg">
                            <button class="flex justify-between items-center w-full p-4 text-left focus:outline-none faq-button">
                                <span class="text-lg font-medium text-gray-900 dark:text-white">How often should I get my car detailed?</span>
                                <i class="fas fa-chevron-down text-gray-500 dark:text-gray-400 transform transition-transform duration-300"></i>
                            </button>
                            <div class="px-4 pb-4 text-gray-600 dark:text-gray-300 faq-content hidden">
                                <p>We recommend a basic wash every 1-2 weeks and a full detail every 3-6 months, depending on your driving conditions and personal preferences. Cars exposed to harsh weather or heavy use may benefit from more frequent detailing.</p>
                            </div>
                        </div>
                        
                        <div class="border border-gray-200 dark:border-[#3E3E3A] rounded-lg">
                            <button class="flex justify-between items-center w-full p-4 text-left focus:outline-none faq-button">
                                <span class="text-lg font-medium text-gray-900 dark:text-white">Do you offer any warranties on your services?</span>
                                <i class="fas fa-chevron-down text-gray-500 dark:text-gray-400 transform transition-transform duration-300"></i>
                            </button>
                            <div class="px-4 pb-4 text-gray-600 dark:text-gray-300 faq-content hidden">
                                <p>We guarantee our workmanship. If you're not satisfied with any service, please contact us within 7 days, and we'll re-perform the service at no additional cost. Some of our premium services come with extended warranties - please ask for details.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Still Have Questions -->
            <div class="mt-12 p-6 bg-gray-50 dark:bg-[#3E3E3A] rounded-lg">
                <div class="text-center">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Still Have Questions?</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">Our customer support team is ready to help you.</p>
                    <div class="flex flex-col sm:flex-row justify-center gap-3">
                        <a href="{{ route('contact') }}" class="inline-block bg-[#f53003] dark:bg-[#FF4433] text-white py-2 px-4 rounded-md hover:bg-[#d42500] dark:hover:bg-[#e03a2a] transition duration-300">
                            <i class="fas fa-envelope mr-2"></i> Contact Us
                        </a>
                        <a href="tel:+1234567890" class="inline-block bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300">
                            <i class="fas fa-phone mr-2"></i> Call Us
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script>
    // FAQ accordion functionality
    document.addEventListener('DOMContentLoaded', function() {
        const faqButtons = document.querySelectorAll('.faq-button');
        
        faqButtons.forEach(button => {
            button.addEventListener('click', function() {
                const content = this.nextElementSibling;
                const icon = this.querySelector('i');
                
                // Toggle the current FAQ
                content.classList.toggle('hidden');
                icon.classList.toggle('fa-chevron-down');
                icon.classList.toggle('fa-chevron-up');
                
                // Rotate the icon for visual feedback
                icon.style.transform = content.classList.contains('hidden') ? 'rotate(0deg)' : 'rotate(180deg)';
            });
        });
    });
</script>
@endsection