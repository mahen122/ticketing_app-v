<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Event;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        $categories = Kategori::all();
        $totalEvent = Event::count();
        $totalKategori = Kategori::count();
        $totalTransaksi = Order::count();

        return view('pages.admin.dashboard', compact('categories', 'totalEvent', 'totalKategori', 'totalTransaksi'));
    }
}