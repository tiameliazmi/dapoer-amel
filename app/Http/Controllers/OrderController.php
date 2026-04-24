<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        $request->validate([
            'table_number' => 'required',
        ]);

        $cart = session()->get('cart', []);

        if (count($cart) == 0) {
            return redirect()->route('customer.menu')->with('success', 'Keranjang masih kosong.');
        }

        $orderId = DB::transaction(function () use ($request, $cart) {
            $total = collect($cart)->sum('subtotal');

            $order = Order::create([
                'table_number' => $request->table_number,
                'total_price' => $total,
                'status' => 'pending',
            ]);

            foreach ($cart as $item) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'menu_id' => $item['menu_id'],
                    'quantity' => $item['quantity'],
                    'note' => $item['note'],
                    'price' => $item['price'],
                    'subtotal' => $item['subtotal'],
                ]);
            }

            return $order->id;
        });

        session()->forget('cart');

        return redirect()->route('checkout.success', $orderId);
    }

    public function success(Order $order)
    {
        $order->load('details.menu');

        return view('customer.success', compact('order'));
    }

    public function index()
    {
        $orders = Order::latest()->get();

        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load('details.menu');

        return view('admin.orders.show', compact('order'));
    }
}