<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $query = Service::where('is_available', true);
        
        // Search filter
        if ($request->has('search') && $request->search) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }
        
        // Vehicle type filter
        if ($request->has('vehicle_type') && $request->vehicle_type) {
            // In a real application, you would have a vehicle_types table
            // For now, we'll just demonstrate the concept
        }
        
        // Sorting
        if ($request->has('sort_by')) {
            switch ($request->sort_by) {
                case 'price_low':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_high':
                    $query->orderBy('price', 'desc');
                    break;
                case 'duration':
                    $query->orderBy('duration', 'asc');
                    break;
                case 'name':
                default:
                    $query->orderBy('name', 'asc');
                    break;
            }
        } else {
            $query->orderBy('name', 'asc');
        }
        
        $services = $query->paginate(9);
        return view('services.index', compact('services'));
    }

    public function show(Service $service)
    {
        return view('services.show', compact('service'));
    }
}
