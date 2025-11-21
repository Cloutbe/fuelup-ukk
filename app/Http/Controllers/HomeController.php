<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * HALAMAN HOME (LANDING PAGE)
     * Lokasi View: resources/views/client/index.blade.php
     */
    public function index()
    {
        // Data Trending (Sama seperti sebelumnya)
        $trendingProducts = [
            ['name' => 'Espresso', 'desc' => 'Rich and bold espresso shot', 'price' => 3.50, 'rating' => 5, 'image' => 'https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd?w=400'],
            ['name' => 'Cappuccino', 'desc' => 'Espresso with steamed milk and foam', 'price' => 4.50, 'rating' => 5, 'image' => 'https://images.unsplash.com/photo-1572442388796-11668a67e53d?w=400'],
            ['name' => 'Latte Art', 'desc' => 'Smooth latte with beautiful art', 'price' => 5.00, 'rating' => 5, 'image' => 'https://images.unsplash.com/photo-1551024601-5602474dd411?w=400']
        ];

        // Perhatikan titik (.) itu artinya masuk folder
        return view('client.home', compact('trendingProducts'));
    }

    /**
     * HALAMAN DASHBOARD (SETELAH LOGIN)
     * Lokasi View: resources/views/client/dashboard.blade.php
     */
    public function dashboard()
    {
        $trendingProducts = [
            ['name' => 'Espresso', 'desc' => 'Rich and bold espresso shot', 'price' => 3.50, 'rating' => 5, 'image' => 'https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd?w=400'],
            ['name' => 'Cappuccino', 'desc' => 'Espresso with steamed milk and foam', 'price' => 4.50, 'rating' => 5, 'image' => 'https://images.unsplash.com/photo-1572442388796-11668a67e53d?w=400'],
            ['name' => 'Latte Art', 'desc' => 'Smooth latte with beautiful art', 'price' => 5.00, 'rating' => 5, 'image' => 'https://images.unsplash.com/photo-1551024601-5602474dd411?w=400']
        ];

        return view('client.dashboard', compact('trendingProducts'));
    }

    /**
     * HALAMAN MENU
     * Lokasi View: resources/views/client/menu.blade.php
     */
    public function menu()
    {
        $categories = ['All', 'Hot Coffee', 'Cold Coffee', 'Specialty', 'Bakery'];
        $products = [
            ['name' => 'Espresso', 'desc' => 'Rich and bold espresso shot', 'price' => 3.50, 'rating' => 5, 'tag' => 'Hot Coffee', 'image' => 'https://images.unsplash.com/photo-1510591509098-f4fdc6d0ff04?w=400'],
            ['name' => 'Cappuccino', 'desc' => 'Espresso with steamed milk and foam', 'price' => 4.50, 'rating' => 5, 'tag' => 'Hot Coffee', 'image' => 'https://images.unsplash.com/photo-1572442388796-11668a67e53d?w=400'],
            ['name' => 'Latte Art', 'desc' => 'Smooth latte with beautiful art', 'price' => 5.00, 'rating' => 5, 'tag' => 'Hot Coffee', 'image' => 'https://images.unsplash.com/photo-1551024601-5602474dd411?w=400'],
            ['name' => 'Iced Coffee', 'desc' => 'Refreshing cold brew over ice', 'price' => 4.00, 'rating' => 4, 'tag' => 'Cold Coffee', 'image' => 'https://images.unsplash.com/photo-1517701550927-30cf4ba1dba5?w=400'],
            ['name' => 'Americano', 'desc' => 'Espresso with hot water', 'price' => 3.75, 'rating' => 4, 'tag' => 'Hot Coffee', 'image' => 'https://images.unsplash.com/photo-1556742049-0cfed4f7a07d?w=400'],
            ['name' => 'Mocha', 'desc' => 'Espresso with chocolate and milk', 'price' => 5.50, 'rating' => 5, 'tag' => 'Specialty', 'image' => 'https://images.unsplash.com/photo-1594756202469-9ff9799b3e4f?w=400'],
        ];

        return view('client.menu', compact('products', 'categories'));
    }

    /**
     * HALAMAN ABOUT
     * Lokasi View: resources/views/client/about.blade.php
     */
    public function about()
    {
        $values = [
            ['icon' => 'mug-hot', 'color' => 'text-blue-500', 'bg' => 'bg-blue-50', 'title' => 'Quality First', 'desc' => 'We never compromise on quality.'],
            ['icon' => 'leaf', 'color' => 'text-green-500', 'bg' => 'bg-green-50', 'title' => 'Sustainability', 'desc' => 'Committed to eco-friendly practices.'],
            ['icon' => 'medal', 'color' => 'text-orange-500', 'bg' => 'bg-orange-50', 'title' => 'Excellence', 'desc' => 'Award-winning coffee crafted by experts.'],
            ['icon' => 'users', 'color' => 'text-purple-500', 'bg' => 'bg-purple-50', 'title' => 'Community', 'desc' => 'Building connections, one cup at a time.']
        ];
        $team = [
            ['name' => 'Sarah Johnson', 'role' => 'Head Barista', 'image' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=400'],
            ['name' => 'Michael Chen', 'role' => 'Coffee Master', 'image' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=400'],
            ['name' => 'Emily Rodriguez', 'role' => 'Store Manager', 'image' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=400']
        ];

        return view('client.about', compact('values', 'team'));
    }

    /**
     * HALAMAN CONTACT
     * Lokasi View: resources/views/client/contact.blade.php
     */
    public function contact()
    {
        $contactInfo = [
            ['icon' => 'map-marker-alt', 'title' => 'Address', 'details' => ['123 Coffee Street', 'Jakarta, Indonesia 12345'], 'color' => 'text-blue-600', 'bg' => 'bg-blue-100'],
            ['icon' => 'phone', 'title' => 'Phone', 'details' => ['+62 812-3456-7890', 'Mon-Sun 7:00 AM - 10:00 PM'], 'color' => 'text-green-600', 'bg' => 'bg-green-100'],
            ['icon' => 'envelope', 'title' => 'Email', 'details' => ['hello@fuelup.com', 'support@fuelup.com'], 'color' => 'text-orange-600', 'bg' => 'bg-orange-100'],
            ['icon' => 'clock', 'title' => 'Opening Hours', 'details' => ['Monday - Friday: 7:00 AM - 10:00 PM', 'Saturday - Sunday: 8:00 AM - 11:00 PM'], 'color' => 'text-purple-600', 'bg' => 'bg-purple-100']
        ];

        return view('client.contact', compact('contactInfo'));
    }

    /**
     * HALAMAN CART
     * Lokasi View: resources/views/client/cart.blade.php
     */
    public function cart()
    {
        return view('client.cart');
    }

    /**
     * HALAMAN LOGIN
     * Lokasi View: resources/views/client/login.blade.php
     */
    public function login()
    {
        return view('client.login');
    }

    public function loginPost(Request $request)
    {
        return redirect('/dashboard');
    }
}