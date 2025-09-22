@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Reports & Analytics</h1>
            <a href="{{ route('admin.dashboard') }}" class="bg-gray-200 dark:bg-[#3E3E3A] text-gray-800 dark:text-white py-2 px-4 rounded-md hover:bg-gray-300 dark:hover:bg-[#4E4E4A] transition duration-300">
                Back to Dashboard
            </a>
        </div>
        
        <!-- Reports Overview -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
            <!-- Bookings Chart -->
            <div class="bg-white dark:bg-[#161615] rounded-lg shadow p-6">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Bookings by Month</h2>
                <div class="h-64 flex items-center justify-center">
                    <canvas id="bookingsChart"></canvas>
                </div>
                <div class="mt-4">
                    <p class="text-gray-600 dark:text-gray-300">
                        This chart shows the number of bookings per month. You can use this data to identify peak seasons and plan accordingly.
                    </p>
                </div>
            </div>
            
            <!-- Revenue Chart -->
            <div class="bg-white dark:bg-[#161615] rounded-lg shadow p-6">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Revenue by Month</h2>
                <div class="h-64 flex items-center justify-center">
                    <canvas id="revenueChart"></canvas>
                </div>
                <div class="mt-4">
                    <p class="text-gray-600 dark:text-gray-300">
                        This chart shows revenue generated per month. Use this data to track business performance and identify growth trends.
                    </p>
                </div>
            </div>
        </div>
        
        <!-- Detailed Reports -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
            <!-- Service Popularity -->
            <div class="bg-white dark:bg-[#161615] rounded-lg shadow p-6">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Service Popularity</h2>
                <div class="space-y-4">
                    @foreach($servicePopularity as $service)
                        <div class="flex items-center justify-between">
                            <span class="text-gray-700 dark:text-gray-300">{{ $service->name }}</span>
                            <span class="font-medium text-gray-900 dark:text-white">{{ $service->bookings_count }} bookings</span>
                        </div>
                        <div class="w-full bg-gray-200 dark:bg-[#3E3E3A] rounded-full h-2">
                            <div class="bg-[#f53003] dark:bg-[#FF4433] h-2 rounded-full" 
                                 style="width: {{ $servicePopularity->max()->bookings_count > 0 ? ($service->bookings_count / $servicePopularity->max()->bookings_count) * 100 : 0 }}%"></div>
                        </div>
                    @endforeach
                </div>
            </div>
            
            <!-- Worker Performance -->
            <div class="bg-white dark:bg-[#161615] rounded-lg shadow p-6">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Top Performing Workers</h2>
                <div class="space-y-4">
                    @foreach($workerPerformance as $worker)
                        <div class="flex items-center justify-between">
                            <span class="text-gray-700 dark:text-gray-300">{{ $worker->name }}</span>
                            <span class="font-medium text-gray-900 dark:text-white">{{ $worker->bookings_count }} services</span>
                        </div>
                        <div class="w-full bg-gray-200 dark:bg-[#3E3E3A] rounded-full h-2">
                            <div class="bg-[#f53003] dark:bg-[#FF4433] h-2 rounded-full" 
                                 style="width: {{ $workerPerformance->max()->bookings_count > 0 ? ($worker->bookings_count / $workerPerformance->max()->bookings_count) * 100 : 0 }}%"></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        
        <!-- Customer Metrics -->
        <div class="bg-white dark:bg-[#161615] rounded-lg shadow p-6 mb-6">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Customer Metrics</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-gray-50 dark:bg-[#3E3E3A] rounded-lg p-4 text-center">
                    <div class="text-3xl font-bold text-[#f53003] dark:text-[#FF4433]">{{ $customerRetention }}</div>
                    <div class="text-gray-600 dark:text-gray-300 mt-2">Repeat Customers</div>
                </div>
                
                <div class="bg-gray-50 dark:bg-[#3E3E3A] rounded-lg p-4 text-center">
                    <div class="text-3xl font-bold text-[#f53003] dark:text-[#FF4433]">{{ number_format($retentionRate, 1) }}%</div>
                    <div class="text-gray-600 dark:text-gray-300 mt-2">Retention Rate</div>
                </div>
                
                <div class="bg-gray-50 dark:bg-[#3E3E3A] rounded-lg p-4 text-center">
                        <div class="text-3xl font-bold text-[#f53003] dark:text-[#FF4433]">{{ \App\Models\Customer::count() }}</div>
                        <div class="text-gray-600 dark:text-gray-300 mt-2">Total Customers</div>
                    </div>
            </div>
        </div>
        
        <!-- Detailed Reports -->
        <div class="bg-white dark:bg-[#161615] rounded-lg shadow overflow-hidden mb-6">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-[#3E3E3A]">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Detailed Reports</h2>
            </div>
            
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <a href="#" class="block bg-gray-50 dark:bg-[#3E3E3A] rounded-lg p-4 hover:bg-gray-100 dark:hover:bg-[#4E4E4A] transition duration-300">
                        <div class="flex items-center">
                            <div class="text-[#f53003] dark:text-[#FF4433] text-2xl mr-3">
                                <i class="fas fa-file-invoice"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 dark:text-white">Service Popularity</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Most requested services</p>
                            </div>
                        </div>
                    </a>
                    
                    <a href="#" class="block bg-gray-50 dark:bg-[#3E3E3A] rounded-lg p-4 hover:bg-gray-100 dark:hover:bg-[#4E4E4A] transition duration-300">
                        <div class="flex items-center">
                            <div class="text-[#f53003] dark:text-[#FF4433] text-2xl mr-3">
                                <i class="fas fa-user-clock"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 dark:text-white">Customer Retention</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Repeat customer analysis</p>
                            </div>
                        </div>
                    </a>
                    
                    <a href="#" class="block bg-gray-50 dark:bg-[#3E3E3A] rounded-lg p-4 hover:bg-gray-100 dark:hover:bg-[#4E4E4A] transition duration-300">
                        <div class="flex items-center">
                            <div class="text-[#f53003] dark:text-[#FF4433] text-2xl mr-3">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 dark:text-white">Peak Hours</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Busiest times of day</p>
                            </div>
                        </div>
                    </a>
                    
                    <a href="#" class="block bg-gray-50 dark:bg-[#3E3E3A] rounded-lg p-4 hover:bg-gray-100 dark:hover:bg-[#4E4E4A] transition duration-300">
                        <div class="flex items-center">
                            <div class="text-[#f53003] dark:text-[#FF4433] text-2xl mr-3">
                                <i class="fas fa-users"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 dark:text-white">Worker Performance</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Employee productivity metrics</p>
                            </div>
                        </div>
                    </a>
                    
                    <a href="#" class="block bg-gray-50 dark:bg-[#3E3E3A] rounded-lg p-4 hover:bg-gray-100 dark:hover:bg-[#4E4E4A] transition duration-300">
                        <div class="flex items-center">
                            <div class="text-[#f53003] dark:text-[#FF4433] text-2xl mr-3">
                                <i class="fas fa-box"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 dark:text-white">Inventory Usage</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Supply consumption tracking</p>
                            </div>
                        </div>
                    </a>
                    
                    <a href="#" class="block bg-gray-50 dark:bg-[#3E3E3A] rounded-lg p-4 hover:bg-gray-100 dark:hover:bg-[#4E4E4A] transition duration-300">
                        <div class="flex items-center">
                            <div class="text-[#f53003] dark:text-[#FF4433] text-2xl mr-3">
                                <i class="fas fa-file-invoice-dollar"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 dark:text-white">Financial Summary</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Revenue and expenses report</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Export Options -->
        <div class="bg-white dark:bg-[#161615] rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Export Reports</h2>
            <div class="flex flex-wrap gap-3">
                <button class="bg-[#f53003] dark:bg-[#FF4433] text-white py-2 px-4 rounded-md hover:bg-[#d42500] dark:hover:bg-[#e03a2a] transition duration-300">
                    <i class="fas fa-file-pdf mr-2"></i> Export as PDF
                </button>
                <button class="bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600 transition duration-300">
                    <i class="fas fa-file-excel mr-2"></i> Export as Excel
                </button>
                <button class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300">
                    <i class="fas fa-file-csv mr-2"></i> Export as CSV
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script>
    // Bookings Chart
    const bookingsCtx = document.getElementById('bookingsChart').getContext('2d');
    const bookingsChart = new Chart(bookingsCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Bookings',
                data: [
                    {{ $bookingsByMonth[1] ?? 0 }}, 
                    {{ $bookingsByMonth[2] ?? 0 }}, 
                    {{ $bookingsByMonth[3] ?? 0 }}, 
                    {{ $bookingsByMonth[4] ?? 0 }}, 
                    {{ $bookingsByMonth[5] ?? 0 }}, 
                    {{ $bookingsByMonth[6] ?? 0 }}, 
                    {{ $bookingsByMonth[7] ?? 0 }}, 
                    {{ $bookingsByMonth[8] ?? 0 }}, 
                    {{ $bookingsByMonth[9] ?? 0 }}, 
                    {{ $bookingsByMonth[10] ?? 0 }}, 
                    {{ $bookingsByMonth[11] ?? 0 }}, 
                    {{ $bookingsByMonth[12] ?? 0 }}
                ],
                borderColor: '#f53003',
                backgroundColor: 'rgba(245, 48, 3, 0.1)',
                tension: 0.3,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.1)'
                    }
                },
                x: {
                    grid: {
                        color: 'rgba(0, 0, 0, 0.1)'
                    }
                }
            }
        }
    });
    
    // Revenue Chart
    const revenueCtx = document.getElementById('revenueChart').getContext('2d');
    const revenueChart = new Chart(revenueCtx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Revenue ($)',
                data: [
                    {{ $revenueByMonth[1] ?? 0 }}, 
                    {{ $revenueByMonth[2] ?? 0 }}, 
                    {{ $revenueByMonth[3] ?? 0 }}, 
                    {{ $revenueByMonth[4] ?? 0 }}, 
                    {{ $revenueByMonth[5] ?? 0 }}, 
                    {{ $revenueByMonth[6] ?? 0 }}, 
                    {{ $revenueByMonth[7] ?? 0 }}, 
                    {{ $revenueByMonth[8] ?? 0 }}, 
                    {{ $revenueByMonth[9] ?? 0 }}, 
                    {{ $revenueByMonth[10] ?? 0 }}, 
                    {{ $revenueByMonth[11] ?? 0 }}, 
                    {{ $revenueByMonth[12] ?? 0 }}
                ],
                backgroundColor: '#f53003',
                borderColor: '#d42500',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.1)'
                    }
                },
                x: {
                    grid: {
                        color: 'rgba(0, 0, 0, 0.1)'
                    }
                }
            }
        }
    });
</script>
@endsection