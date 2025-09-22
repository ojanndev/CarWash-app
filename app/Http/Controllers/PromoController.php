<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PromoCode;
use App\Models\Booking;
use App\Models\PromoCodeUsage;
use Illuminate\Support\Facades\Auth;

class PromoController extends Controller
{
    public function index()
    {
        $promos = PromoCode::where('is_active', true)
            ->where(function ($query) {
                $query->whereNull('start_date')
                    ->orWhere('start_date', '<=', now());
            })
            ->where(function ($query) {
                $query->whereNull('end_date')
                    ->orWhere('end_date', '>=', now());
            })
            ->get();
            
        return view('pages.promotions', compact('promos'));
    }
    
    public function validatePromoCode(Request $request)
    {
        $request->validate([
            'code' => 'required|string',
            'booking_id' => 'required|exists:bookings,id'
        ]);
        
        $promoCode = PromoCode::where('code', $request->code)->first();
        
        if (!$promoCode) {
            return response()->json(['valid' => false, 'message' => 'Invalid promo code']);
        }
        
        if (!$promoCode->isValid()) {
            return response()->json(['valid' => false, 'message' => 'Promo code is not valid']);
        }
        
        $booking = Booking::findOrFail($request->booking_id);
        
        // Check if booking already has a promo code
        if ($booking->promoCodeUsage) {
            return response()->json(['valid' => false, 'message' => 'Booking already has a promo code applied']);
        }
        
        $discount = $promoCode->applyDiscount($booking->total_price);
        
        return response()->json([
            'valid' => true,
            'message' => 'Promo code is valid',
            'discount' => $discount,
            'new_total' => $booking->total_price - $discount
        ]);
    }
    
    public function applyPromoCode(Request $request)
    {
        $request->validate([
            'code' => 'required|string',
            'booking_id' => 'required|exists:bookings,id'
        ]);
        
        $promoCode = PromoCode::where('code', $request->code)->first();
        
        if (!$promoCode || !$promoCode->isValid()) {
            return back()->withErrors(['promo_code' => 'Invalid or expired promo code']);
        }
        
        $booking = Booking::findOrFail($request->booking_id);
        
        // Check if booking already has a promo code
        if ($booking->promoCodeUsage) {
            return back()->withErrors(['promo_code' => 'Booking already has a promo code applied']);
        }
        
        $discount = $promoCode->applyDiscount($booking->total_price);
        
        if ($discount <= 0) {
            return back()->withErrors(['promo_code' => 'Promo code cannot be applied to this booking']);
        }
        
        // Create promo code usage record
        PromoCodeUsage::create([
            'promo_code_id' => $promoCode->id,
            'customer_id' => Auth::guard('customer')->id(),
            'booking_id' => $booking->id,
            'discount_amount' => $discount
        ]);
        
        // Update promo code usage count
        $promoCode->increment('used_count');
        
        // Update booking total price
        $booking->update([
            'total_price' => $booking->total_price - $discount
        ]);
        
        return back()->with('success', 'Promo code applied successfully!');
    }
}