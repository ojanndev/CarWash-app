<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\Worker;
use App\Models\Inventory;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Basic counts
        $servicesCount = Service::count();
        $bookingsCount = Booking::count();
        $customersCount = Customer::count();
        $workersCount = Worker::count();
        
        // Recent bookings
        $recentBookings = Booking::with(['customer', 'service'])->latest()->take(10)->get();
        
        // Bookings by status
        $pendingBookings = Booking::where('status', 'pending')->count();
        $confirmedBookings = Booking::where('status', 'confirmed')->count();
        $completedBookings = Booking::where('status', 'completed')->count();
        $cancelledBookings = Booking::where('status', 'cancelled')->count();
        
        // Today's bookings
        $todayBookings = Booking::whereDate('booking_date', Carbon::today())->count();
        
        // Revenue data
        $totalRevenue = Booking::where('payment_status', 'paid')->sum('total_price');
        $todayRevenue = Booking::where('payment_status', 'paid')
            ->whereDate('payment_date', Carbon::today())
            ->sum('total_price');
        
        // Upcoming bookings
        $upcomingBookings = Booking::where('booking_date', '>', Carbon::now())
            ->where('status', 'confirmed')
            ->orderBy('booking_date')
            ->take(5)
            ->get();
        
        // Workers data
        $availableWorkers = Worker::where('is_active', true)->count();
        
        // Inventory low stock
        $lowStockItems = Inventory::where('quantity', '<=', DB::raw('reorder_level'))->count();
        
        return view('admin.dashboard', compact(
            'servicesCount', 
            'bookingsCount', 
            'customersCount', 
            'workersCount',
            'recentBookings',
            'pendingBookings',
            'confirmedBookings',
            'completedBookings',
            'cancelledBookings',
            'todayBookings',
            'totalRevenue',
            'todayRevenue',
            'upcomingBookings',
            'availableWorkers',
            'lowStockItems'
        ));
    }

    public function services()
    {
        $services = Service::paginate(10);
        return view('admin.services.index', compact('services'));
    }

    public function createService()
    {
        return view('admin.services.create');
    }

    public function storeService(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
            'is_available' => 'boolean'
        ]);

        Service::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'duration' => $request->duration,
            'is_available' => $request->has('is_available')
        ]);

        return redirect()->route('admin.services')->with('success', 'Service created successfully!');
    }

    public function editService(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function updateService(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
            'is_available' => 'boolean'
        ]);

        $service->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'duration' => $request->duration,
            'is_available' => $request->has('is_available')
        ]);

        return redirect()->route('admin.services')->with('success', 'Service updated successfully!');
    }

    public function deleteService(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services')->with('success', 'Service deleted successfully!');
    }

    public function bookings()
    {
        $bookings = Booking::with(['customer', 'service'])->get();
        return view('admin.bookings.index', compact('bookings'));
    }

    public function updateBookingStatus(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled'
        ]);

        $booking->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Booking status updated successfully!');
    }

    public function updateBookingPaymentStatus(Request $request, Booking $booking)
    {
        $request->validate([
            'payment_status' => 'required|in:pending,paid'
        ]);

        $booking->update(['payment_status' => $request->payment_status]);

        return redirect()->back()->with('success', 'Booking payment status updated successfully!');
    }

    public function customers()
    {
        $customers = Customer::all();
        return view('admin.customers.index', compact('customers'));
    }
    
    // New methods for additional features
    
    public function workers()
    {
        $workers = Worker::all();
        return view('admin.workers.index', compact('workers'));
    }
    
    public function inventory()
    {
        $inventories = Inventory::all();
        return view('admin.inventory.index', compact('inventories'));
    }
    
    public function reports()
    {
        // Get data for reports
        $bookingsByMonth = Booking::select(
            DB::raw('MONTH(booking_date) as month'),
            DB::raw('COUNT(*) as count')
        )
        ->groupBy('month')
        ->pluck('count', 'month');
        
        $revenueByMonth = Booking::select(
            DB::raw('MONTH(payment_date) as month'),
            DB::raw('SUM(total_price) as revenue')
        )
        ->where('payment_status', 'paid')
        ->groupBy('month')
        ->pluck('revenue', 'month');
        
        // Service popularity
        $servicePopularity = Service::withCount('bookings')
            ->orderBy('bookings_count', 'desc')
            ->take(5)
            ->get();
        
        // Customer retention
        $customerRetention = Customer::has('bookings', '>=', 2)->count();
        $totalCustomers = Customer::count();
        $retentionRate = $totalCustomers > 0 ? ($customerRetention / $totalCustomers) * 100 : 0;
        
        // Worker performance
        $workerPerformance = Worker::withCount('bookings')
            ->orderBy('bookings_count', 'desc')
            ->take(5)
            ->get();
        
        return view('admin.reports.index', compact(
            'bookingsByMonth', 
            'revenueByMonth', 
            'servicePopularity', 
            'customerRetention', 
            'retentionRate',
            'workerPerformance'
        ));
    }
}
