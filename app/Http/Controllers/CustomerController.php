<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\Vehicle;

class CustomerController extends Controller
{
    public function dashboard()
    {
        $customer = Auth::guard('customer')->user();
        $unreadNotificationsCount = $customer->notifications()->where('is_read', false)->count();
        return view('customers.dashboard', compact('customer', 'unreadNotificationsCount'));
    }

    public function profile()
    {
        $customer = Auth::guard('customer')->user();
        return view('customers.profile', compact('customer'));
    }

    public function updateProfile(Request $request)
    {
        $customer = Auth::guard('customer')->user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:customers,email,' . $customer->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255'
        ]);

        $customer->update($request->only(['name', 'email', 'phone', 'address']));

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
    
    // Vehicle management
    public function vehicles()
    {
        $customer = Auth::guard('customer')->user();
        $vehicles = $customer->vehicles;
        return view('customers.vehicles.index', compact('customer', 'vehicles'));
    }
    
    public function addVehicle(Request $request)
    {
        $customer = Auth::guard('customer')->user();
        
        $request->validate([
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'color' => 'nullable|string|max:50',
            'license_plate' => 'nullable|string|max:20'
        ]);
        
        $customer->vehicles()->create($request->all());
        
        return redirect()->back()->with('success', 'Vehicle added successfully!');
    }
    
    public function updateVehicle(Request $request, Vehicle $vehicle)
    {
        $customer = Auth::guard('customer')->user();
        
        // Ensure vehicle belongs to customer
        if ($vehicle->customer_id != $customer->id) {
            abort(403);
        }
        
        $request->validate([
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'color' => 'nullable|string|max:50',
            'license_plate' => 'nullable|string|max:20'
        ]);
        
        $vehicle->update($request->all());
        
        return redirect()->back()->with('success', 'Vehicle updated successfully!');
    }
    
    public function deleteVehicle(Vehicle $vehicle)
    {
        $customer = Auth::guard('customer')->user();
        
        // Ensure vehicle belongs to customer
        if ($vehicle->customer_id != $customer->id) {
            abort(403);
        }
        
        $vehicle->delete();
        
        return redirect()->back()->with('success', 'Vehicle deleted successfully!');
    }
}
