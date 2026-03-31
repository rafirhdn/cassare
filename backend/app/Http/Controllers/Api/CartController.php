<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class CartController extends Controller
{
    // Store
    public function store(Request $request)
    {
        $request->validate([
            'id_product' => 'required|integer|exists:product,id_product',
            'price'      => 'required|numeric|min:0',
            'amount'     => 'required|integer|min:1',
        ]);

        $product = Product::find($request->id_product);

        if ($product->stock < $request->amount) {
            return response()->json([
                'success' => false,
                'message' => "Stok {$product->name} tidak mencukupi! Sisa stok: {$product->stock}",
            ], 422);
        }

        $product->decrement('stock', $request->amount);

        $cart = Cart::create([
            'id_product' => $request->id_product,
            'price'      => $request->price,
            'time'       => now(),
            'id_admin'   => $request->user()->id_admin,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil ditambahkan ke keranjang!',
            'data'    => $cart,
        ], 201);
    }

    // Destroy
    public function destroy(Request $request)
    {
        $cart = Cart::find($request->id_cart);

        if (!$cart) {
            return response()->json([
                'success' => false,
                'message' => 'Item keranjang tidak ditemukan!'
            ], 404);
        }

        $cart->delete();

        return response()->json([
            'success' => true,
            'message' => 'Item berhasil dihapus dari keranjang!'
        ], 200);
    }
}
