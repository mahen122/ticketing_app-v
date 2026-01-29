<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use App\Models\Order;
use App\Models\DetailOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request, Tiket $tiket)
    {
        if ($tiket->stok <= 0) {
            return back()->with('error', 'Tiket sudah habis!');
        }

        // Buat order
        $order = Order::create([
            'user_id' => Auth::id(),
            'event_id' => $tiket->event_id,
            'order_date' => now(),
            'total_harga' => $tiket->harga,
        ]);

        // Detail order
        DetailOrder::create([
            'order_id' => $order->id,
            'tiket_id' => $tiket->id,
            'jumlah' => 1,
            'subtotal_harga' => $tiket->harga,
        ]);

        // Kurangi stok tiket
        $tiket->decrement('stok');

        return redirect()->route('home')->with('success', 'Tiket berhasil dipesan!');
    }

    public function show(Order $order)
    {
        $detailOrders = DetailOrder::where('order_id', $order->id)->with('tiket')->get();
        return view('order.show', compact('order', 'detailOrders'));
    }
}
