<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\NotificationController;

// Public routes
Route::get('/', function () {
    $promoCode = \App\Models\PromoCode::where('code', 'FIRST30')->first();
    return view('welcome', compact('promoCode'));
});

Route::get('/referral/{id}', function ($id) {
    // In a real application, you would track the referral and possibly give a discount
    // For now, we'll just redirect to the registration page with a referral parameter
    return redirect()->route('register', ['ref' => $id]);
})->name('referral');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/faq', function () {
    return view('pages.faq');
})->name('faq');

Route::get('/terms', function () {
    return view('pages.terms');
})->name('terms');

Route::get('/privacy', function () {
    return view('pages.privacy');
})->name('privacy');

Route::get('/promotions', [PromoController::class, 'index'])->name('promotions');

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{service}', [ServiceController::class, 'show'])->name('services.show');

// Promo code routes
Route::post('/promo/validate', [PromoController::class, 'validatePromoCode'])->name('promo.validate');
Route::post('/promo/apply', [PromoController::class, 'applyPromoCode'])->name('promo.apply');

// Authentication routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Customer routes (protected)
Route::middleware(['customer'])->group(function () {
    Route::get('/customer/dashboard', [CustomerController::class, 'dashboard'])->name('customer.dashboard');
    Route::get('/customer/profile', [CustomerController::class, 'profile'])->name('customer.profile');
    Route::put('/customer/profile', [CustomerController::class, 'updateProfile'])->name('customer.profile.update');
    
    // Vehicle management
    Route::get('/customer/vehicles', [CustomerController::class, 'vehicles'])->name('customer.vehicles');
    Route::post('/customer/vehicles', [CustomerController::class, 'addVehicle'])->name('customer.vehicles.add');
    Route::put('/customer/vehicles/{vehicle}', [CustomerController::class, 'updateVehicle'])->name('customer.vehicles.update');
    Route::delete('/customer/vehicles/{vehicle}', [CustomerController::class, 'deleteVehicle'])->name('customer.vehicles.delete');
    
    // Review management
    Route::get('/customer/reviews', [ReviewController::class, 'index'])->name('customer.reviews');
    Route::get('/customer/reviews/create/{booking}', [ReviewController::class, 'create'])->name('reviews.create');
    Route::post('/customer/reviews/store/{booking}', [ReviewController::class, 'store'])->name('reviews.store');
    
    // Notification management
    Route::get('/customer/notifications', [NotificationController::class, 'index'])->name('customer.notifications');
    Route::post('/customer/notifications/{notification}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');
    Route::post('/customer/notifications/read-all', [NotificationController::class, 'markAllAsRead'])->name('notifications.readAll');
    
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/create/{service}', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');
    Route::get('/bookings/{booking}/track', [BookingController::class, 'track'])->name('bookings.track');
    
    // Payment routes
    Route::get('/bookings/{booking}/payment', [PaymentController::class, 'showPaymentForm'])->name('payments.checkout');
    Route::post('/bookings/{booking}/payment', [PaymentController::class, 'processPayment'])->name('payments.process');
});

// Admin routes (protected)
Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // Services management
    Route::get('/admin/services', [AdminController::class, 'services'])->name('admin.services');
    Route::get('/admin/services/create', [AdminController::class, 'createService'])->name('admin.services.create');
    Route::post('/admin/services', [AdminController::class, 'storeService'])->name('admin.services.store');
    Route::get('/admin/services/{service}/edit', [AdminController::class, 'editService'])->name('admin.services.edit');
    Route::put('/admin/services/{service}', [AdminController::class, 'updateService'])->name('admin.services.update');
    Route::delete('/admin/services/{service}', [AdminController::class, 'deleteService'])->name('admin.services.delete');
    
    // Bookings management
    Route::get('/admin/bookings', [AdminController::class, 'bookings'])->name('admin.bookings');
    Route::put('/admin/bookings/{booking}/status', [AdminController::class, 'updateBookingStatus'])->name('admin.bookings.updateStatus');
    Route::put('/admin/bookings/{booking}/payment-status', [AdminController::class, 'updateBookingPaymentStatus'])->name('admin.bookings.updatePaymentStatus');
    Route::put('/admin/bookings/{booking}/progress', [BookingController::class, 'updateProgress'])->name('admin.bookings.updateProgress');
    
    // Customers management
    Route::get('/admin/customers', [AdminController::class, 'customers'])->name('admin.customers');
    
    // Workers management
    Route::get('/admin/workers', [AdminController::class, 'workers'])->name('admin.workers');
    
    // Inventory management
    Route::get('/admin/inventory', [AdminController::class, 'inventory'])->name('admin.inventory');
    
    // Reports
    Route::get('/admin/reports', [AdminController::class, 'reports'])->name('admin.reports');
});
