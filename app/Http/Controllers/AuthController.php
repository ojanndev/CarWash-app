<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        // Try to authenticate as customer first
        if (Auth::guard('customer')->attempt($credentials)) {
            $request->session()->regenerate();
            
            // Check if the authenticated user is an admin (ID = 1 or specific email)
            $customer = Auth::guard('customer')->user();
            if ($customer && ($customer->id == 1 || $customer->email == 'admin@example.com')) {
                // This is an admin user, redirect to admin dashboard
                return redirect()->intended('/admin/dashboard');
            }
            
            // Regular customer
            return redirect()->intended('/customer/dashboard');
        }

        // If authentication fails, return with error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                function ($attribute, $value, $fail) {
                    // Check if email exists in customers table
                    $customerExists = \App\Models\Customer::where('email', $value)->exists();
                    
                    if ($customerExists) {
                        $fail('The email has already been taken.');
                    }
                },
            ],
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create customer (all registrations are customers)
        $customer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('customer')->login($customer);

        // Check if this is an admin user
        if ($customer->id == 1 || $customer->email == 'admin@example.com') {
            return redirect('/admin/dashboard');
        }

        return redirect('/customer/dashboard');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        Auth::guard('customer')->logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
