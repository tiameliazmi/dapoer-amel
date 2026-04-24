<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function menu()
    {
        $menus = Menu::orderBy('category')->get()->groupBy('category');

        return view('customer.menu', compact('menus'));
    }

    public function add(Request $request, Menu $menu)
    {
        $cart = session()->get('cart', []);

        $cart[] = [
            'id' => uniqid(),
            'menu_id' => $menu->id,
            'name' => $menu->name,
            'price' => $menu->price,
            'quantity' => $request->quantity,
            'note' => $request->note,
            'subtotal' => $menu->price * $request->quantity,
        ];

        session()->put('cart', $cart);

        // 🔥 TIDAK PINDAH HALAMAN, BALIK KE MENU + POPUP
        return redirect()->route('customer.menu')
            ->with('success', $menu->name . ' berhasil ditambahkan ke keranjang! 🛒');
    }

    public function index()
    {
        $cart = session()->get('cart', []);
        $total = collect($cart)->sum('subtotal');

        return view('customer.cart', compact('cart', 'total'));
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        $cart = collect($cart)->reject(function ($item) use ($id) {
            return $item['id'] == $id;
        })->values()->toArray();

        session()->put('cart', $cart);

        return redirect()->route('cart.index')
            ->with('success', 'Pesanan berhasil dihapus.');
    }
}