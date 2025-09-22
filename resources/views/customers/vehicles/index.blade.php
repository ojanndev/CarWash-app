@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">My Vehicles</h1>
            <a href="{{ route('customer.dashboard') }}" class="bg-gray-200 dark:bg-[#3E3E3A] text-gray-800 dark:text-white py-2 px-4 rounded-md hover:bg-gray-300 dark:hover:bg-[#4E4E4A] transition duration-300">
                <i class="fas fa-arrow-left mr-2"></i> Back to Dashboard
            </a>
        </div>
        
        <!-- Success Message -->
        @if(session('success'))
        <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
            {{ session('success') }}
        </div>
        @endif
        
        <!-- Add Vehicle Form -->
        <div class="bg-white dark:bg-[#161615] rounded-lg shadow p-6 mb-6">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Add New Vehicle</h2>
            
            <form method="POST" action="{{ route('customer.vehicles.add') }}">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="make" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Make</label>
                        <input type="text" name="make" id="make" required class="w-full px-3 py-2 border border-gray-300 dark:border-[#3E3E3A] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] bg-white dark:bg-[#161615] text-gray-900 dark:text-white">
                    </div>
                    
                    <div>
                        <label for="model" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Model</label>
                        <input type="text" name="model" id="model" required class="w-full px-3 py-2 border border-gray-300 dark:border-[#3E3E3A] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] bg-white dark:bg-[#161615] text-gray-900 dark:text-white">
                    </div>
                    
                    <div>
                        <label for="year" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Year</label>
                        <input type="number" name="year" id="year" min="1900" max="{{ date('Y') + 1 }}" required class="w-full px-3 py-2 border border-gray-300 dark:border-[#3E3E3A] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] bg-white dark:bg-[#161615] text-gray-900 dark:text-white">
                    </div>
                    
                    <div>
                        <label for="color" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Color</label>
                        <input type="text" name="color" id="color" class="w-full px-3 py-2 border border-gray-300 dark:border-[#3E3E3A] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] bg-white dark:bg-[#161615] text-gray-900 dark:text-white">
                    </div>
                    
                    <div>
                        <label for="license_plate" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">License Plate</label>
                        <input type="text" name="license_plate" id="license_plate" class="w-full px-3 py-2 border border-gray-300 dark:border-[#3E3E3A] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] bg-white dark:bg-[#161615] text-gray-900 dark:text-white">
                    </div>
                </div>
                
                <div class="mt-6">
                    <button type="submit" class="bg-[#f53003] dark:bg-[#FF4433] text-white py-2 px-4 rounded-md hover:bg-[#d42500] dark:hover:bg-[#e03a2a] transition duration-300">
                        Add Vehicle
                    </button>
                </div>
            </form>
        </div>
        
        <!-- Vehicles List -->
        <div class="bg-white dark:bg-[#161615] rounded-lg shadow overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-[#3E3E3A]">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">My Vehicles</h2>
            </div>
            
            @if ($vehicles->count() > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-[#3E3E3A]">
                        <thead class="bg-gray-50 dark:bg-[#3E3E3A]">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Make</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Model</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Year</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Color</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">License Plate</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-[#161615] divide-y divide-gray-200 dark:divide-[#3E3E3A]">
                            @foreach ($vehicles as $vehicle)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $vehicle->make }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900 dark:text-white">{{ $vehicle->model }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900 dark:text-white">{{ $vehicle->year }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900 dark:text-white">{{ $vehicle->color ?? 'N/A' }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900 dark:text-white">{{ $vehicle->license_plate ?? 'N/A' }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <button onclick="openEditModal({{ $vehicle->id }}, '{{ $vehicle->make }}', '{{ $vehicle->model }}', {{ $vehicle->year }}, '{{ $vehicle->color ?? '' }}', '{{ $vehicle->license_plate ?? '' }}')" class="text-blue-500 hover:text-blue-700 mr-3">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <form method="POST" action="{{ route('customer.vehicles.delete', $vehicle) }}" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Are you sure you want to delete this vehicle?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="p-6">
                    <p class="text-gray-600 dark:text-gray-300 text-center">You haven't added any vehicles yet.</p>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Edit Vehicle Modal -->
<div id="editVehicleModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white dark:bg-[#161615] rounded-lg shadow-xl w-full max-w-md">
        <div class="px-6 py-4 border-b border-gray-200 dark:border-[#3E3E3A]">
            <h3 class="text-lg font-medium text-gray-900 dark:text-white">Edit Vehicle</h3>
        </div>
        <form id="editVehicleForm" method="POST">
            @csrf
            @method('PUT')
            
            <div class="px-6 py-4">
                <input type="hidden" name="vehicle_id" id="edit_vehicle_id">
                
                <div class="mb-4">
                    <label for="edit_make" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Make</label>
                    <input type="text" name="make" id="edit_make" required class="w-full px-3 py-2 border border-gray-300 dark:border-[#3E3E3A] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] bg-white dark:bg-[#161615] text-gray-900 dark:text-white">
                </div>
                
                <div class="mb-4">
                    <label for="edit_model" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Model</label>
                    <input type="text" name="model" id="edit_model" required class="w-full px-3 py-2 border border-gray-300 dark:border-[#3E3E3A] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] bg-white dark:bg-[#161615] text-gray-900 dark:text-white">
                </div>
                
                <div class="mb-4">
                    <label for="edit_year" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Year</label>
                    <input type="number" name="year" id="edit_year" min="1900" max="{{ date('Y') + 1 }}" required class="w-full px-3 py-2 border border-gray-300 dark:border-[#3E3E3A] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] bg-white dark:bg-[#161615] text-gray-900 dark:text-white">
                </div>
                
                <div class="mb-4">
                    <label for="edit_color" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Color</label>
                    <input type="text" name="color" id="edit_color" class="w-full px-3 py-2 border border-gray-300 dark:border-[#3E3E3A] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] bg-white dark:bg-[#161615] text-gray-900 dark:text-white">
                </div>
                
                <div class="mb-4">
                    <label for="edit_license_plate" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">License Plate</label>
                    <input type="text" name="license_plate" id="edit_license_plate" class="w-full px-3 py-2 border border-gray-300 dark:border-[#3E3E3A] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] bg-white dark:bg-[#161615] text-gray-900 dark:text-white">
                </div>
            </div>
            
            <div class="px-6 py-4 border-t border-gray-200 dark:border-[#3E3E3A] flex justify-end">
                <button type="button" onclick="closeModal('editVehicleModal')" class="bg-gray-200 dark:bg-[#3E3E3A] text-gray-800 dark:text-white py-2 px-4 rounded-md hover:bg-gray-300 dark:hover:bg-[#4E4E4A] transition duration-300 mr-2">
                    Cancel
                </button>
                <button type="submit" class="bg-[#f53003] dark:bg-[#FF4433] text-white py-2 px-4 rounded-md hover:bg-[#d42500] dark:hover:bg-[#e03a2a] transition duration-300">
                    Update Vehicle
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script>
    function openEditModal(id, make, model, year, color, licensePlate) {
        document.getElementById('edit_vehicle_id').value = id;
        document.getElementById('edit_make').value = make;
        document.getElementById('edit_model').value = model;
        document.getElementById('edit_year').value = year;
        document.getElementById('edit_color').value = color;
        document.getElementById('edit_license_plate').value = licensePlate;
        
        // Set form action
        document.getElementById('editVehicleForm').action = '/customer/vehicles/' + id;
        
        document.getElementById('editVehicleModal').classList.remove('hidden');
        document.getElementById('editVehicleModal').classList.add('flex');
    }
    
    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
        document.getElementById(modalId).classList.remove('flex');
    }
    
    // Close modal when clicking outside
    window.onclick = function(event) {
        if (event.target.classList.contains('modal')) {
            event.target.classList.add('hidden');
            event.target.classList.remove('flex');
        }
    }
</script>
@endsection