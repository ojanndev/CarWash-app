@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Edit Service</h1>
            <a href="{{ route('admin.services') }}" class="bg-gray-200 dark:bg-[#3E3E3A] text-gray-800 dark:text-white py-2 px-4 rounded-md hover:bg-gray-300 dark:hover:bg-[#4E4E4A] transition duration-300">
                Back to Services
            </a>
        </div>
        
        <!-- Service Form -->
        <div class="bg-white dark:bg-[#161615] rounded-lg shadow p-6">
            <form method="POST" action="{{ route('admin.services.update', $service) }}">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Service Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $service->name) }}" required class="w-full px-3 py-2 border border-gray-300 dark:border-[#3E3E3A] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] bg-white dark:bg-[#161615] text-gray-900 dark:text-white">
                    </div>
                    
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Price ($)</label>
                        <input type="number" name="price" id="price" step="0.01" min="0" value="{{ old('price', $service->price) }}" required class="w-full px-3 py-2 border border-gray-300 dark:border-[#3E3E3A] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] bg-white dark:bg-[#161615] text-gray-900 dark:text-white">
                    </div>
                    
                    <div>
                        <label for="duration" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Duration (minutes)</label>
                        <input type="number" name="duration" id="duration" min="1" value="{{ old('duration', $service->duration) }}" required class="w-full px-3 py-2 border border-gray-300 dark:border-[#3E3E3A] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] bg-white dark:bg-[#161615] text-gray-900 dark:text-white">
                    </div>
                    
                    <div>
                        <label for="is_available" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Status</label>
                        <select name="is_available" id="is_available" class="w-full px-3 py-2 border border-gray-300 dark:border-[#3E3E3A] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] bg-white dark:bg-[#161615] text-gray-900 dark:text-white">
                            <option value="1" {{ old('is_available', $service->is_available) ? 'selected' : '' }}>Available</option>
                            <option value="0" {{ old('is_available', $service->is_available) ? '' : 'selected' }}>Unavailable</option>
                        </select>
                    </div>
                </div>
                
                <div class="mt-6">
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Description</label>
                    <textarea name="description" id="description" rows="4" class="w-full px-3 py-2 border border-gray-300 dark:border-[#3E3E3A] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] bg-white dark:bg-[#161615] text-gray-900 dark:text-white">{{ old('description', $service->description) }}</textarea>
                </div>
                
                <div class="mt-6 flex justify-end">
                    <button type="submit" class="bg-[#f53003] dark:bg-[#FF4433] text-white py-2 px-4 rounded-md hover:bg-[#d42500] dark:hover:bg-[#e03a2a] transition duration-300">
                        Update Service
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection