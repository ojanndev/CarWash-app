<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\PromoCode;

class PaymentController extends Controller
{
    public function showPaymentForm(Booking $booking)
    {
        // Ensure the booking belongs to the authenticated customer
        if (Auth::guard('customer')->id() != $booking->customer_id) {
            abort(403);
        }

        // Check if booking is already paid
        if ($booking->payment_status == 'paid') {
            return redirect()->route('bookings.show', $booking)->with('info', 'This booking has already been paid.');
        }

        return view('payments.checkout', compact('booking'));
    }

    public function processPayment(Request $request, Booking $booking)
    {
        // Ensure the booking belongs to the authenticated customer
        if (Auth::guard('customer')->id() != $booking->customer_id) {
            abort(403);
        }

        // Validate payment method
        $request->validate([
            'payment_method' => 'required|in:credit_card,paypal,bank_transfer,cash_on_delivery,qris',
            'promo_code' => 'nullable|string|exists:promo_codes,code'
        ]);

        // Process payment based on method
        $paymentResult = $this->processPaymentByMethod($request->payment_method, $booking);

        if ($paymentResult['success']) {
            // Update booking payment status
            $booking->update([
                'payment_status' => 'paid',
                'payment_method' => $request->payment_method,
                'payment_date' => now(),
            ]);

            // Send notification to customer
            $booking->customer->notifications()->create([
                'title' => 'Payment Successful',
                'message' => "Your payment of $" . number_format($booking->total_price, 2) . " for booking #" . $booking->id . " has been processed successfully.",
                'type' => 'payment',
                'data' => ['booking_id' => $booking->id]
            ]);

            return redirect()->route('bookings.show', $booking)->with('success', 'Payment processed successfully!');
        } else {
            return back()->withErrors(['payment' => $paymentResult['message']]);
        }
    }

    private function processPaymentByMethod($method, $booking)
    {
        // In a real application, this would integrate with actual payment gateways
        // For demo purposes, we'll simulate successful payments
        
        switch ($method) {
            case 'credit_card':
                // Simulate credit card processing
                return ['success' => true, 'message' => 'Credit card payment processed successfully'];
                
            case 'paypal':
                // Simulate PayPal processing
                return ['success' => true, 'message' => 'PayPal payment processed successfully'];
                
            case 'bank_transfer':
                // Simulate bank transfer processing
                return ['success' => true, 'message' => 'Bank transfer initiated successfully. Please complete the transfer within 24 hours.'];
                
            case 'cash_on_delivery':
                // Cash on delivery doesn't need processing now
                return ['success' => true, 'message' => 'Cash on delivery selected. Please pay when you arrive.'];
                
            case 'qris':
                // Simulate QRIS payment processing
                return ['success' => true, 'message' => 'QRIS payment processed successfully'];
                
            default:
                return ['success' => false, 'message' => 'Invalid payment method'];
        }
    }
}
