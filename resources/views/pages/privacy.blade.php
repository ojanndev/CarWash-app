@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <!-- Hero Section -->
        <div 
             class="relative bg-cover bg-center bg-no-repeat rounded-lg shadow-xl overflow-hidden mb-12"
            style="background-image: url('https://images.unsplash.com/photo-1749498891468-88f77a8d745b?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8ZmFxJTIwZ2FyYWdlfGVufDB8fDB8fHww'); background-color: #0a1a2f;">            
            <div class="absolute inset-0 bg-black opacity-50"></div>
            <div class="relative max-w-7xl mx-auto px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
                <div class="text-center">
                    <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">
                        Privacy Policy
                    </h1>
                    <p class="mt-6 max-w-lg mx-auto text-xl text-gray-300">
                        Your privacy is important to us. This policy explains how we collect, use, and protect your information.
                    </p>
                </div>
            </div>
        </div>
        
        <!-- Privacy Policy Content -->
        <div class="bg-white dark:bg-[#161615] rounded-lg shadow p-6">
            <div class="prose prose-lg max-w-none">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">1. Information We Collect</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-6">
                    We collect information you provide directly to us, such as when you create an account, book a service, or contact us. This may include your name, email address, phone number, vehicle information, and payment details.
                </p>
                <p class="text-gray-600 dark:text-gray-300 mb-6">
                    We also collect information automatically when you use our services, such as your IP address, browser type, device information, and usage data.
                </p>
                
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">2. How We Use Your Information</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-6">
                    We use your information to:
                </p>
                <ul class="list-disc pl-6 text-gray-600 dark:text-gray-300 mb-6">
                    <li>Provide, maintain, and improve our services</li>
                    <li>Process and confirm your bookings</li>
                    <li>Communicate with you about your bookings and services</li>
                    <li>Send you promotional materials and updates</li>
                    <li>Process payments and prevent fraud</li>
                    <li>Comply with legal obligations</li>
                </ul>
                
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">3. Information Sharing</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-6">
                    We do not sell, trade, or otherwise transfer your personal information to third parties without your consent. We may share your information with:
                </p>
                <ul class="list-disc pl-6 text-gray-600 dark:text-gray-300 mb-6">
                    <li>Service providers who assist us in operating our business</li>
                    <li>Payment processors to facilitate transactions</li>
                    <li>Legal authorities when required by law</li>
                    <li>Business partners with your explicit consent</li>
                </ul>
                
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">4. Data Security</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-6">
                    We implement appropriate technical and organizational measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction. However, no method of transmission over the Internet or electronic storage is 100% secure.
                </p>
                
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">5. Data Retention</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-6">
                    We retain your personal information for as long as necessary to provide our services and comply with legal obligations. When we no longer need your information, we will securely delete it.
                </p>
                
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">6. Your Rights</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-6">
                    You have the right to:
                </p>
                <ul class="list-disc pl-6 text-gray-600 dark:text-gray-300 mb-6">
                    <li>Access and receive a copy of your personal information</li>
                    <li>Correct or update inaccurate personal information</li>
                    <li>Delete your personal information</li>
                    <li>Object to or restrict the processing of your personal information</li>
                    <li>Withdraw your consent at any time</li>
                </ul>
                
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">7. Cookies</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-6">
                    We use cookies and similar tracking technologies to enhance your experience on our website. You can control cookies through your browser settings.
                </p>
                
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">8. Children's Privacy</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-6">
                    Our services are not intended for children under 13 years of age. We do not knowingly collect personal information from children under 13.
                </p>
                
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">9. Changes to This Policy</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-6">
                    We may update this privacy policy from time to time. We will notify you of any changes by posting the new policy on this page and updating the "Last Updated" date.
                </p>
                
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">10. Contact Us</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-6">
                    If you have any questions about this privacy policy, please contact us at:
                </p>
                <div class="bg-gray-50 dark:bg-[#3E3E3A] p-4 rounded-lg">
                    <p class="text-gray-600 dark:text-gray-300">
                        <strong>Email:</strong> <a href="mailto:privacy@carwash.demo" class="text-[#f53003] dark:text-[#FF4433] hover:underline">privacy@carwash.demo</a>
                    </p>
                    <p class="text-gray-600 dark:text-gray-300 mt-2">
                        <strong>Phone:</strong> (123) 456-7890
                    </p>
                    <p class="text-gray-600 dark:text-gray-300 mt-2">
                        <strong>Address:</strong> 123 Car Wash Street, City, State 12345
                    </p>
                </div>
                
                <div class="mt-8 p-4 bg-gray-50 dark:bg-[#3E3E3A] rounded-lg">
                    <p class="text-gray-600 dark:text-gray-300">
                        <strong>Last Updated:</strong> {{ date('F d, Y') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection