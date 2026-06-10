<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function create()
    {
        $menus = Menu::all();

        return view('admin.transactions.create', compact('menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'table_number' => 'required',
            'menu_id' => 'required',
            'quantity' => 'required|integer|min:1',
            'note' => 'nullable',
        ]);

        $menu = Menu::findOrFail($request->menu_id);

        DB::transaction(function () use ($request, $menu) {

            $subtotal = $menu->price * $request->quantity;

            $order = Order::create([
                'table_number' => $request->table_number,
                'total_price' => $subtotal,
                'status' => 'pending',
            ]);

            OrderDetail::create([
                'order_id' => $order->id,
                'menu_id' => $menu->id,
                'quantity' => $request->quantity,
                'note' => $request->note,
                'price' => $menu->price,
                'subtotal' => $subtotal,
            ]);
        });

        return redirect()
            ->route('orders.index')
            ->with('success', 'Transaksi berhasil ditambahkan.');
    }
}