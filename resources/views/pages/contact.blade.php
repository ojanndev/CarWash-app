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
                        Contact Us
                    </h1>
                    <p class="mt-6 max-w-lg mx-auto text-xl text-gray-300">
                        We're here to help. Get in touch with us for any questions or concerns.
                    </p>
                </div>
            </div>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Contact Information -->
            <div class="lg:col-span-1">
                <div class="bg-white dark:bg-[#161615] rounded-lg shadow p-6 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Contact Information</h2>
                    
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 bg-[#f53003] dark:bg-[#FF4433] rounded-lg p-3">
                                <i class="fas fa-map-marker-alt text-white text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Our Location</h3>
                                <p class="mt-1 text-gray-600 dark:text-gray-300">
                                    123 Car Wash Street<br>
                                    Automotive District<br>
                                    City, State 12345
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="flex-shrink-0 bg-[#f53003] dark:bg-[#FF4433] rounded-lg p-3">
                                <i class="fas fa-phone-alt text-white text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Phone Number</h3>
                                <p class="mt-1 text-gray-600 dark:text-gray-300">
                                    (123) 456-7890
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="flex-shrink-0 bg-[#f53003] dark:bg-[#FF4433] rounded-lg p-3">
                                <i class="fas fa-envelope text-white text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Email Address</h3>
                                <p class="mt-1 text-gray-600 dark:text-gray-300">
                                    info@carwash.demo
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="flex-shrink-0 bg-[#f53003] dark:bg-[#FF4433] rounded-lg p-3">
                                <i class="fas fa-clock text-white text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Business Hours</h3>
                                <p class="mt-1 text-gray-600 dark:text-gray-300">
                                    Monday - Friday: 8:00 AM - 8:00 PM<br>
                                    Saturday: 9:00 AM - 6:00 PM<br>
                                    Sunday: 10:00 AM - 4:00 PM
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Map -->
                <div class="bg-white dark:bg-[#161615] rounded-lg shadow p-6">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Find Us</h2>
                    <div class="rounded-xl overflow-hidden w-full h-64">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126763.0705223744!2d106.6894291!3d-6.229728!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e5e9b1d8bf%3A0x301576d14febd70!2sJakarta!5e0!3m2!1sen!2sid!4v1695200000000!5m2!1sen!2sid" 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>                
            </div>
            </div>
            
            <!-- Contact Form -->
            <div class="lg:col-span-2">
                <div class="bg-white dark:bg-[#161615] rounded-lg shadow p-6">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Send us a Message</h2>
                    
                    <form>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Full Name</label>
                                <input type="text" id="name" required class="w-full px-3 py-2 border border-gray-300 dark:border-[#3E3E3A] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] bg-white dark:bg-[#161615] text-gray-900 dark:text-white">
                            </div>
                            
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email Address</label>
                                <input type="email" id="email" required class="w-full px-3 py-2 border border-gray-300 dark:border-[#3E3E3A] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] bg-white dark:bg-[#161615] text-gray-900 dark:text-white">
                            </div>
                        </div>
                        
                        <div class="mb-6">
                            <label for="subject" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Subject</label>
                            <input type="text" id="subject" required class="w-full px-3 py-2 border border-gray-300 dark:border-[#3E3E3A] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] bg-white dark:bg-[#161615] text-gray-900 dark:text-white">
                        </div>
                        
                        <div class="mb-6">
                            <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Message</label>
                            <textarea id="message" rows="5" required class="w-full px-3 py-2 border border-gray-300 dark:border-[#3E3E3A] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] bg-white dark:bg-[#161615] text-gray-900 dark:text-white"></textarea>
                        </div>
                        
                        <button type="submit" class="w-full bg-[#f53003] dark:bg-[#FF4433] text-white py-3 px-4 rounded-md hover:bg-[#d42500] dark:hover:bg-[#e03a2a] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] transition duration-300">
                            Send Message
                        </button>
                    </form>
                </div>
                
                <!-- Social Media -->
                <div class="mt-8 bg-white dark:bg-[#161615] rounded-lg shadow p-6">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Follow Us</h2>
                    <div class="flex space-x-4">
                        <a href="#" class="bg-blue-600 text-white p-3 rounded-full hover:bg-blue-700 transition duration-300">
                            <i class="fab fa-facebook-f text-xl"></i>
                        </a>
                        <a href="#" class="bg-blue-400 text-white p-3 rounded-full hover:bg-blue-500 transition duration-300">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                        <a href="#" class="bg-pink-600 text-white p-3 rounded-full hover:bg-pink-700 transition duration-300">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="#" class="bg-blue-700 text-white p-3 rounded-full hover:bg-blue-800 transition duration-300">
                            <i class="fab fa-linkedin-in text-xl"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection