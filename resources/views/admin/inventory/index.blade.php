@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Inventory Management</h1>
            <button onclick="openModal('addItemModal')" class="bg-[#f53003] dark:bg-[#FF4433] text-white py-2 px-4 rounded-md hover:bg-[#d42500] dark:hover:bg-[#e03a2a] transition duration-300">
                <i class="fas fa-plus mr-2"></i> Add Item
            </button>
        </div>
        
        <!-- Inventory Overview -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div class="bg-white dark:bg-[#161615] rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Total Items</h3>
                <p class="text-3xl font-bold text-[#f53003] dark:text-[#FF4433]">0</p>
            </div>
            
            <div class="bg-white dark:bg-[#161615] rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Low Stock Items</h3>
                <p class="text-3xl font-bold text-yellow-500">0</p>
            </div>
            
            <div class="bg-white dark:bg-[#161615] rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Out of Stock</h3>
                <p class="text-3xl font-bold text-red-500">0</p>
            </div>
        </div>
        
        <!-- Inventory List -->
        <div class="bg-white dark:bg-[#161615] rounded-lg shadow overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-[#3E3E3A]">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Inventory Items</h2>
            </div>
            
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-[#3E3E3A]">
                    <thead class="bg-gray-50 dark:bg-[#3E3E3A]">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Item Name</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Category</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Quantity</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Reorder Level</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Status</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-[#161615] divide-y divide-gray-200 dark:divide-[#3E3E3A]">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900 dark:text-white">No inventory items found</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900 dark:text-white"></div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900 dark:text-white"></div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900 dark:text-white"></div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"></span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <button class="text-blue-500 hover:text-blue-700 mr-3">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="text-red-500 hover:text-red-700">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Add Item Modal -->
<div id="addItemModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white dark:bg-[#161615] rounded-lg shadow-xl w-full max-w-md">
        <div class="px-6 py-4 border-b border-gray-200 dark:border-[#3E3E3A]">
            <h3 class="text-lg font-medium text-gray-900 dark:text-white">Add Inventory Item</h3>
        </div>
        <form>
            <div class="px-6 py-4">
                <div class="mb-4">
                    <label for="item_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Item Name</label>
                    <input type="text" id="item_name" class="w-full px-3 py-2 border border-gray-300 dark:border-[#3E3E3A] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] bg-white dark:bg-[#161615] text-gray-900 dark:text-white">
                </div>
                <div class="mb-4">
                    <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Category</label>
                    <select id="category" class="w-full px-3 py-2 border border-gray-300 dark:border-[#3E3E3A] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] bg-white dark:bg-[#161615] text-gray-900 dark:text-white">
                        <option value="">Select Category</option>
                        <option value="cleaning_supplies">Cleaning Supplies</option>
                        <option value="waxes_polishes">Waxes & Polishes</option>
                        <option value="tools_equipment">Tools & Equipment</option>
                        <option value="accessories">Accessories</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="quantity" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Quantity</label>
                    <input type="number" id="quantity" class="w-full px-3 py-2 border border-gray-300 dark:border-[#3E3E3A] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] bg-white dark:bg-[#161615] text-gray-900 dark:text-white">
                </div>
                <div class="mb-4">
                    <label for="reorder_level" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Reorder Level</label>
                    <input type="number" id="reorder_level" class="w-full px-3 py-2 border border-gray-300 dark:border-[#3E3E3A] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] bg-white dark:bg-[#161615] text-gray-900 dark:text-white">
                </div>
            </div>
            <div class="px-6 py-4 border-t border-gray-200 dark:border-[#3E3E3A] flex justify-end">
                <button type="button" onclick="closeModal('addItemModal')" class="bg-gray-200 dark:bg-[#3E3E3A] text-gray-800 dark:text-white py-2 px-4 rounded-md hover:bg-gray-300 dark:hover:bg-[#4E4E4A] transition duration-300 mr-2">
                    Cancel
                </button>
                <button type="submit" class="bg-[#f53003] dark:bg-[#FF4433] text-white py-2 px-4 rounded-md hover:bg-[#d42500] dark:hover:bg-[#e03a2a] transition duration-300">
                    Add Item
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script>
    function openModal(modalId) {
        document.getElementById(modalId).classList.remove('hidden');
        document.getElementById(modalId).classList.add('flex');
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