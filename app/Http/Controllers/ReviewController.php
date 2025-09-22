<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\Review;
use App\Models\ReviewPhoto;

class ReviewController extends Controller
{
    public function index()
    {
        $customer = Auth::guard('customer')->user();
        $reviews = $customer->reviews()->with(['booking.service', 'photos'])->latest()->get();
        $pendingReviews = $customer->bookings()
            ->where('status', 'completed')
            ->whereDoesntHave('reviews')
            ->get();
        
        return view('customers.reviews.index', compact('reviews', 'pendingReviews'));
    }
    
    public function create(Booking $booking)
    {
        $customer = Auth::guard('customer')->user();
        
        // Ensure booking belongs to customer and is completed
        if ($booking->customer_id != $customer->id || $booking->status != 'completed') {
            abort(403);
        }
        
        // Ensure booking doesn't already have a review
        if ($booking->reviews()->exists()) {
            return redirect()->route('customer.reviews')->with('info', 'This booking has already been reviewed.');
        }
        
        return view('customers.reviews.create', compact('booking'));
    }
    
    public function store(Request $request, Booking $booking)
    {
        $customer = Auth::guard('customer')->user();
        
        // Ensure booking belongs to customer and is completed
        if ($booking->customer_id != $customer->id || $booking->status != 'completed') {
            abort(403);
        }
        
        // Ensure booking doesn't already have a review
        if ($booking->reviews()->exists()) {
            return redirect()->route('customer.reviews')->with('info', 'This booking has already been reviewed.');
        }
        
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
            'photos' => 'nullable|array',
            'photos.*' => 'image|max:5120' // 5MB max
        ]);
        
        $review = new Review();
        $review->customer_id = $customer->id;
        $review->booking_id = $booking->id;
        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->save();
        
        // Handle photo uploads
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('review_photos', 'public');
                
                $reviewPhoto = new ReviewPhoto();
                $reviewPhoto->review_id = $review->id;
                $reviewPhoto->path = $path;
                $reviewPhoto->save();
            }
        }
        
        return redirect()->route('customer.reviews')->with('success', 'Thank you for your review!');
    }
}