@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-4">Detail Order #{{ $order->id }}</h1>
    <div class="mb-4">
        <strong>Tanggal Order:</strong> {{ $order->order_date }}<br>
        <strong>Total:</strong> Rp{{ number_format($order->total_harga, 0, ',', '.') }}
    </div>
    <h2 class="text-xl font-semibold mb-2">Tiket Dipesan</h2>
    <table class="min-w-full bg-white border">
        <thead>
            <tr>
                <th class="py-2 px-4 border">Nama Tiket</th>
                <th class="py-2 px-4 border">Jumlah</th>
                <th class="py-2 px-4 border">Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach($detailOrders as $detail)
            <tr>
                <td class="py-2 px-4 border">{{ $detail->tiket->tipe ?? '-' }}</td>
                <td class="py-2 px-4 border">{{ $detail->jumlah }}</td>
                <td class="py-2 px-4 border">Rp{{ number_format($detail->subtotal_harga, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection