<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Kategori;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        $totalEvents = Event::count();
        $totalCategories = Kategori::count();
        $totalOrders = Order::count();
        $recentEvents = Event::with('kategori')->latest()->take(5)->get();
        $categories = Kategori::all();

        return view('pages.admin.dashboard', compact('totalEvents', 'totalCategories', 'totalOrders', 'recentEvents', 'categories'));
    }
}
