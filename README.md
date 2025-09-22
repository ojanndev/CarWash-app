# CarWash Booking System

A comprehensive car wash booking system built with Laravel.
<br>
**Created by [ojanndev](https://github.com/ojanndev)**  
📷 Instagram: [@ojann.ae](https://www.instagram.com/ojann.ae/)

## Table of Contents
- [Features](#features)
- [Tech Stacks](#tech-stacks)
- [Requirements](#requirements)
- [Installation](#installation)
- [How to Use the Application](#how-to-use-the-application)
  - [For Customers](#for-customers)
  - [For Admin](#for-admin)
- [Project Structure](#project-structure)
- [License](#license)

## Features

- Customer registration and authentication
- Service browsing and selection
- Online booking with date/time selection
- Vehicle management
- Admin dashboard for managing bookings, services, and customers
- Worker management
- Inventory tracking
- Promo code system
- Review and rating system
- Notification system

## Tech Stacks

This project is built using the following technologies:

### Backend
- **Laravel 12** - PHP framework for web application development
- **PHP 8.2+** - Server-side scripting language
- **MySQL** - Relational database management system

### Frontend
- **Tailwind CSS** - Utility-first CSS framework for styling
- **Alpine.js** - Lightweight JavaScript framework for interactivity
- **Font Awesome** - Icon toolkit
- **Chart.js** - JavaScript library for data visualization

### Development Tools
- **Composer** - Dependency manager for PHP
- **NPM** - Package manager for Node.js
- **Vite** - Frontend build tool
- **Artisan** - Laravel command-line interface

### Additional Libraries
- **Intervention Image** - Image manipulation library (if used)
- **Laravel Cashier** - Subscription billing (if used)

## Requirements

- PHP 8.2 or higher
- Composer
- MySQL or PostgreSQL database
- Node.js and NPM

## Installation

1. Clone the repository:
   ```
   git clone https://github.com/yourusername/carwash-app.git
   ```

2. Navigate to the project directory:
   ```
   cd carwash-app
   ```

3. Install PHP dependencies:
   ```
   composer install
   ```

4. Install Node dependencies:
   ```
   npm install
   ```

5. Create a copy of the `.env` file:
   ```
   cp .env.example .env
   ```

6. Generate application key:
   ```
   php artisan key:generate
   ```

7. Configure your database settings in the `.env` file

8. Run database migrations:
   ```
   php artisan migrate
   ```

9. Seed the database with sample data:
   ```
   php artisan db:seed
   ```

10. Compile assets:
    ```
    npm run dev
    ```

11. Start the development server:
    ```
    php artisan serve
    ```

## How to Use the Application

### For Customers

#### Registration and Login
1. Visit the homepage at `http://localhost:8000`
2. Click on "Register" to create a new account or "Login" if you already have an account
3. Fill in your details and submit the registration form
4. After registration, you'll be automatically logged in and redirected to your dashboard

#### Browsing Services
1. From the navigation menu, click on "Services" to view all available car wash services
2. You can see details of each service including pricing, duration, and description
3. Click on a specific service to view more detailed information

#### Making a Booking
1. From the services page or service detail page, click "Book Now"
2. Select your vehicle (you can add a new vehicle if needed)
3. Choose an available date and time slot
4. Add any special notes or requests
5. Review your booking details and click "Confirm Booking"
6. Proceed to payment (if paying online) or confirm for offline payment

#### Managing Your Account
1. Click on your profile icon in the top right corner and select "Dashboard" to access your customer dashboard
2. In the dashboard, you can:
   - View your upcoming and past bookings
   - Manage your vehicles
   - View and update your profile information
   - Check notifications
   - Leave reviews for completed services

#### Viewing Booking History
1. From your dashboard or by clicking "My Bookings" in the navigation menu
2. You can view all your past and upcoming bookings
3. Click on a specific booking to view details, track progress, or leave a review

### For Admin

#### Login
1. Visit the admin login page at `http://localhost:8000/login`
2. Use the default admin credentials:
   - Email: `admin@example.com`
   - Password: `password`

#### Admin Dashboard
After logging in, you'll be redirected to the admin dashboard which provides:
- Overview of bookings and revenue
- Quick access to recent activities
- System status indicators

#### Managing Services
1. Navigate to "Services" in the admin sidebar
2. Here you can:
   - View all services
   - Add new services
   - Edit existing services
   - Delete services

#### Managing Bookings
1. Navigate to "Bookings" in the admin sidebar
2. You can:
   - View all bookings
   - Update booking status (pending, confirmed, completed, cancelled)
   - Update payment status
   - Assign workers to bookings
   - View booking details

#### Managing Customers
1. Navigate to "Customers" in the admin sidebar
2. You can:
   - View all registered customers
   - See customer booking history
   - Manage customer accounts

#### Managing Workers
1. Navigate to "Workers" in the admin sidebar
2. You can:
   - View all workers
   - Add new workers
   - Update worker information
   - Manage worker assignments

#### Managing Inventory
1. Navigate to "Inventory" in the admin sidebar
2. You can:
   - View current inventory levels
   - Add new inventory items
   - Update stock levels
   - Set reorder points

#### Viewing Reports
1. Navigate to "Reports" in the admin sidebar
2. You can view:
   - Booking statistics
   - Revenue reports
   - Service popularity
   - Worker performance metrics
   - Customer retention data

#### System Management
- **Promo Codes**: Manage promotional codes and discounts
- **Notifications**: Send system-wide notifications
- **Reviews**: Moderate customer reviews

## Project Structure

```
carwash-app/
├── app/                  # Application logic
│   ├── Http/             # Controllers, middleware, requests
│   ├── Models/           # Eloquent models
│   ├── Providers/         # Service providers
│   └── ...
├── config/               # Configuration files
├── database/             # Database migrations and seeds
├── resources/             # Views, assets, lang files
│   ├── views/           # Blade templates
│   ├── css/              # CSS files
│   └── js/               # JavaScript files
├── routes/               # Route definitions
├── storage/              # File storage
├── tests/                # Automated tests
└── vendor/              # Composer dependencies
```

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
