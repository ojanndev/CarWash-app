@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <!-- Hero Section -->
        <div 
             class="relative bg-cover bg-center bg-no-repeat rounded-lg shadow-xl overflow-hidden mb-12"
            style="background-image: url('https://images.unsplash.com/photo-1678166011375-6958c4785b5f?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MzB8fHByaXZhY3klMjBnYXJhZ2V8ZW58MHx8MHx8fDA%3D'); background-color: #0a1a2f;">            
            <div class="absolute inset-0 bg-black opacity-50"></div>
            <div class="relative max-w-7xl mx-auto px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
                <div class="text-center">
                    <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">
                        Terms & Conditions
                    </h1>
                    <p class="mt-6 max-w-lg mx-auto text-xl text-gray-300">
                        Please read these terms and conditions carefully before using our services.
                    </p>
                </div>
            </div>
        </div>
        
        <!-- Terms Content -->
        <div class="bg-white dark:bg-[#161615] rounded-lg shadow p-6">
            <div class="prose prose-lg max-w-none">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">1. Introduction</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-6">
                    Welcome to Car Wash Services. These terms and conditions outline the rules and regulations for the use of our services. By booking any service through our website or app, you accept these terms and conditions in full. If you disagree with these terms and conditions or any part of these terms and conditions, you must not use our services.
                </p>
                
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">2. Services</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-6">
                    We provide professional car wash and detailing services. All services are subject to availability and may vary by location. We reserve the right to modify, suspend, or discontinue any service at any time without prior notice.
                </p>
                
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">3. Booking & Payment</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-6">
                    All bookings are subject to confirmation. Payment is required at the time of booking unless otherwise specified. We accept various payment methods including credit cards, debit cards, PayPal, bank transfers, and QRIS payments. Prices are subject to change without prior notice.
                </p>
                
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">4. Cancellation & Rescheduling</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-6">
                    You may cancel or reschedule your booking up to 24 hours before the scheduled time without charge. Cancellations made within 24 hours of the scheduled time may incur a cancellation fee. No-shows will be charged the full service amount.
                </p>
                
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">5. Vehicle Care</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-6">
                    We use professional-grade, eco-friendly products and equipment. While we take great care in handling all vehicles, we are not responsible for pre-existing damage, missing items, or damage caused by extreme weather conditions. We recommend removing all personal belongings from your vehicle before service.
                </p>
                
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">6. Liability</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-6">
                    Our liability for any claim arising out of the provision of services is limited to the cost of the service provided. We are not liable for any indirect, incidental, special, or consequential damages arising out of the use of our services.
                </p>
                
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">7. Privacy</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-6">
                    We are committed to protecting your privacy. Please refer to our Privacy Policy for information on how we collect, use, and protect your personal information.
                </p>
                
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">8. Changes to Terms</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-6">
                    We reserve the right to modify these terms and conditions at any time. Changes will be effective immediately upon posting on our website. Your continued use of our services after any such changes constitutes your acceptance of the new terms and conditions.
                </p>
                
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">9. Governing Law</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-6">
                    These terms and conditions are governed by and construed in accordance with the laws of the State of [Your State], and you irrevocably submit to the exclusive jurisdiction of the courts in that State.
                </p>
                
                <div class="mt-8 p-4 bg-gray-50 dark:bg-[#3E3E3A] rounded-lg">
                    <p class="text-gray-600 dark:text-gray-300">
                        <strong>Last Updated:</strong> {{ date('F d, Y') }}
                    </p>
                    <p class="text-gray-600 dark:text-gray-300 mt-2">
                        If you have any questions about these terms and conditions, please contact us at <a href="mailto:info@carwash.demo" class="text-[#f53003] dark:text-[#FF4433] hover:underline">info@carwash.demo</a> or call us at (123) 456-7890.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection