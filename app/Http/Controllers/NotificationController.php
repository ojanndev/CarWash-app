<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function index()
    {
        $customer = Auth::guard('customer')->user();
        $notifications = $customer->notifications()->latest()->paginate(10);
        
        return view('customers.notifications.index', compact('notifications'));
    }
    
    public function markAsRead(Notification $notification)
    {
        $customer = Auth::guard('customer')->user();
        
        // Ensure notification belongs to customer
        if ($notification->customer_id != $customer->id) {
            abort(403);
        }
        
        $notification->update(['is_read' => true]);
        
        return response()->json(['success' => true]);
    }
    
    public function markAllAsRead()
    {
        $customer = Auth::guard('customer')->user();
        $customer->notifications()->where('is_read', false)->update(['is_read' => true]);
        
        return response()->json(['success' => true]);
    }
}