@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <!-- Hero Section -->
        <div 
             class="relative bg-cover bg-center bg-no-repeat rounded-lg shadow-xl overflow-hidden mb-12"
            style="background-image: url('https://images.unsplash.com/photo-1540311891702-404c17e773df?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTZ8fGFib3V0JTIwZ2FyYWdlJTIwY2Fyd2FzaHxlbnwwfHwwfHx8MA%3D%3D'); background-color: #0a1a2f;">            
            <div class="absolute inset-0 bg-black opacity-50"></div>
            <div class="relative max-w-7xl mx-auto px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
                <div class="text-center">
                    <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">
                        About Our Car Wash
                    </h1>
                    <p class="mt-6 max-w-lg mx-auto text-xl text-gray-300">
                        Providing premium car care services with attention to detail and customer satisfaction.
                    </p>
                </div>
            </div>
        </div>
        
        <!-- Company Story -->
        <div class="bg-white dark:bg-[#161615] rounded-lg shadow p-6 mb-12">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Our Story</h2>
                        <p class="text-gray-600 dark:text-gray-300 mb-4">
                            Founded in 2010, our car wash has been dedicated to providing exceptional vehicle care services 
                            to our community. What started as a small family business has grown into a trusted name in 
                            automotive detailing.
                        </p>
                        <p class="text-gray-600 dark:text-gray-300 mb-4">
                            Our commitment to quality, eco-friendly practices, and customer satisfaction has made us the 
                            preferred choice for car owners who demand the best for their vehicles.
                        </p>
                        <p class="text-gray-600 dark:text-gray-300">
                            Today, we operate 12 locations across the region, each equipped with state-of-the-art equipment 
                            and staffed by certified professionals who are passionate about cars and customer service.
                        </p>
                    </div>
                    <div class="relative w-full h-96 rounded-xl overflow-hidden">
                        <!-- Gambar di sisi kanan -->
                        <img 
                            src="https://images.unsplash.com/photo-1720095326582-272eed78fa40?w=1200&auto=format&fit=crop&q=80&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fG91ciUyMHN0b3J5JTIwZ2FyYWdlfGVufDB8fDB8fHww" 
                            alt="Our Story - Car Wash" 
                            class="w-full h-full object-cover object-[center_75%]"
                        />
                    </div>
                </div>
            </div>
        
        <!-- Mission & Values -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
            <div class="bg-white dark:bg-[#161615] rounded-lg shadow p-6">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Our Mission</h2>
                <p class="text-gray-600 dark:text-gray-300">
                    To deliver unparalleled car care services that exceed our customers' expectations while promoting 
                    environmental responsibility and supporting our local community.
                </p>
            </div>
            
            <div class="bg-white dark:bg-[#161615] rounded-lg shadow p-6">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Our Values</h2>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span class="text-gray-600 dark:text-gray-300">Quality in every detail</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span class="text-gray-600 dark:text-gray-300">Environmental responsibility</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span class="text-gray-600 dark:text-gray-300">Customer satisfaction</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span class="text-gray-600 dark:text-gray-300">Community involvement</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span class="text-gray-600 dark:text-gray-300">Continuous improvement</span>
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- Team -->
        <div class="bg-white dark:bg-[#161615] rounded-lg shadow p-6 mb-12">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-8 text-center">Meet Our Team</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                <div class="mx-auto w-32 h-32 mb-4 rounded-full overflow-hidden border-4  ">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="John Smith" class="w-full h-full object-cover">
                </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">John Smith</h3>
                    <p class="text-[#f53003] dark:text-[#FF4433]">Founder & CEO</p>
                    <p class="text-gray-600 dark:text-gray-300 mt-2">20+ years in automotive care</p>
                </div>
                
                <div class="text-center">
                <div class="mx-auto w-32 h-32 mb-4 rounded-full overflow-hidden border-4  ">
                    <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8cGVyc29ufGVufDB8fDB8fHww" alt="John Smith" class="w-full h-full object-cover">
                </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Sarah Johnson</h3>
                    <p class="text-[#f53003] dark:text-[#FF4433]">Operations Manager</p>
                    <p class="text-gray-600 dark:text-gray-300 mt-2">15+ years in customer service</p>
                </div>
                
                <div class="text-center">
                <div class="mx-auto w-32 h-32 mb-4 rounded-full overflow-hidden border-4  ">
                    <img src="https://plus.unsplash.com/premium_photo-1671656349322-41de944d259b?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTN8fHBlcnNvbnxlbnwwfHwwfHx8MA%3D%3D" alt="John Smith" class="w-full h-full object-cover">
                </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Michael Brown</h3>
                    <p class="text-[#f53003] dark:text-[#FF4433]">Head Technician</p>
                    <p class="text-gray-600 dark:text-gray-300 mt-2">Certified detailing specialist</p>
                </div>
                
                <div class="text-center">
                <div class="mx-auto w-32 h-32 mb-4 rounded-full overflow-hidden border-4  ">
                    <img src="https://images.unsplash.com/photo-1554151228-14d9def656e4?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjB8fHBlcnNvbnxlbnwwfHwwfHx8MA%3D%3D" alt="John Smith" class="w-full h-full object-cover">
                </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Emily Davis</h3>
                    <p class="text-[#f53003] dark:text-[#FF4433]">Customer Relations</p>
                    <p class="text-gray-600 dark:text-gray-300 mt-2">Dedicated to customer satisfaction</p>
                </div>
            </div>
        </div>
        
        <!-- Stats -->
        <div class="bg-gradient-to-r from-[#0a1a2f] to-[#1a3a5f] rounded-lg shadow p-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                <div>
                    <div class="text-4xl font-bold text-white mb-2">10K+</div>
                    <div class="text-gray-300">Happy Customers</div>
                </div>
                
                <div>
                    <div class="text-4xl font-bold text-white mb-2">50+</div>
                    <div class="text-gray-300">Expert Staff</div>
                </div>
                
                <div>
                    <div class="text-4xl font-bold text-white mb-2">12</div>
                    <div class="text-gray-300">Locations</div>
                </div>
                
                <div>
                    <div class="text-4xl font-bold text-white mb-2">14</div>
                    <div class="text-gray-300">Years of Service</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection