<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;
use App\Models\Booking;
use App\Models\Worker;

class BookingController extends Controller
{
    public function create(Service $service)
    {
        return view('bookings.create', compact('service'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'booking_date' => 'required|date|after:now',
            'vehicle_type' => 'required|string|max:255',
            'vehicle_make' => 'nullable|string|max:255',
            'vehicle_model' => 'nullable|string|max:255',
            'notes' => 'nullable|string'
        ]);

        $service = Service::findOrFail($request->service_id);
        
        $booking = new Booking();
        $booking->customer_id = Auth::guard('customer')->id();
        $booking->service_id = $request->service_id;
        $booking->booking_date = $request->booking_date;
        $booking->vehicle_type = $request->vehicle_type;
        $booking->vehicle_make = $request->vehicle_make;
        $booking->vehicle_model = $request->vehicle_model;
        $booking->total_price = $service->price;
        $booking->notes = $request->notes;
        $booking->save();

        // Send notification to customer
        $booking->customer->notifications()->create([
            'title' => 'Booking Confirmed',
            'message' => "Your booking for " . $service->name . " on " . $request->booking_date . " has been confirmed.",
            'type' => 'booking',
            'data' => ['booking_id' => $booking->id]
        ]);

        return redirect()->route('bookings.show', $booking)->with('success', 'Booking created successfully!');
    }

    public function show(Booking $booking)
    {
        // Ensure the booking belongs to the authenticated customer
        if (Auth::guard('customer')->id() != $booking->customer_id) {
            abort(403);
        }
        
        // Get worker assigned to this booking (if any)
        $worker = $booking->workers()->first();
        
        return view('bookings.show', compact('booking', 'worker'));
    }

    public function index()
    {
        $bookings = Booking::where('customer_id', Auth::guard('customer')->id())->get();
        return view('bookings.index', compact('bookings'));
    }
    
    // Real-time tracking methods
    public function track(Booking $booking)
    {
        // Ensure the booking belongs to the authenticated customer
        if (Auth::guard('customer')->id() != $booking->customer_id) {
            abort(403);
        }
        
        // Get worker assigned to this booking (if any)
        $worker = $booking->workers()->first();
        
        // Get all workers for assignment
        $workers = Worker::where('is_active', true)->get();
        
        return view('bookings.track', compact('booking', 'worker', 'workers'));
    }
    
    public function updateProgress(Request $request, Booking $booking)
    {
        // Ensure the booking belongs to the authenticated admin
        if (!Auth::guard('web')->check()) {
            abort(403);
        }
        
        $request->validate([
            'status' => 'required|in:pending,confirmed,in_progress,completed',
            'worker_id' => 'nullable|exists:workers,id'
        ]);
        
        $booking->update(['status' => $request->status]);
        
        // Assign worker if provided
        if ($request->worker_id) {
            $worker = Worker::findOrFail($request->worker_id);
            $booking->workers()->syncWithoutDetaching([$worker->id => ['task_status' => $request->status]]);
        }
        
        // Send notification to customer
        $statusLabels = [
            'pending' => 'is pending',
            'confirmed' => 'has been confirmed',
            'in_progress' => 'is in progress',
            'completed' => 'has been completed'
        ];
        
        $booking->customer->notifications()->create([
            'title' => 'Booking Status Updated',
            'message' => "Your booking for " . $booking->service->name . " " . $statusLabels[$request->status] . ".",
            'type' => 'booking',
            'data' => ['booking_id' => $booking->id]
        ]);
        
        return response()->json(['success' => true, 'message' => 'Booking status updated successfully']);
    }
}
