<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class CartController extends Controller
{
    // Index All
    public function indexAll()
    {
        $carts = Cart::with('product', 'admin')
            ->get()
            ->map(function ($cart) {
                return [
                    'id_cart'      => $cart->id_cart,
                    'id_product'   => $cart->id_product,
                    'payment'      => $cart->payment,
                    'price'        => $cart->price,
                    'change'       => $cart->change,
                    'time'         => $cart->time,
                    'admin_name'   => $cart->admin->name ?? null,
                    'product_name' => $cart->product->name ?? null,
                    'product_type' => $cart->product->type ?? null,
                    'product_estimate' => $cart->product->estimate ?? null,
                ];
            });

        return response()->json([
            'success' => true,
            'data'    => $carts,
        ]);
    }

    // Index
    public function index(Request $request)
    {
        $user = $request->user();

        $query = Cart::with('product', 'admin');

        if ($user->level !== 'Admin') {
            $query->where('id_admin', $user->id_admin);
        }

        $carts = $query->get()->map(function ($cart) {
            return [
                'id_cart'      => $cart->id_cart,
                'id_product'   => $cart->id_product,
                'payment'      => $cart->payment,
                'price'        => $cart->price,
                'change'       => $cart->change,
                'time'         => $cart->time,
                'admin_name'   => $cart->admin->name ?? null,
                'product_name' => $cart->product->name ?? null,
                'product_type' => $cart->product->type ?? null,
                'product_estimate' => $cart->product->estimate ?? null,
            ];
        });

        return response()->json([
            'success' => true,
            'data'    => $carts,
        ]);
    }

    // Store
    public function store(Request $request)
    {
        $request->validate([
            'id_product' => 'required|integer|exists:product,id_product',
            'payment'    => 'required|string|max:255',
            'price'      => 'required|string|max:255',
            'change'     => 'required|string|max:255',
            'stock'      => 'required|integer|min:1',
        ]);
        $product = Product::find($request->id_product);
        if ($product->stock < $request->stock) {
            return response()->json([
                'success' => false,
                'message' => "Stok {$product->name} tidak mencukupi! Sisa stok: {$product->stock}",
            ], 422);
        }
        $product->decrement('stock', $request->stock);
        if ($product->fresh()->stock <= 0) {
            $product->update(['status' => 'Tidak Tersedia']);
        }
        $cart = Cart::create([
            'id_product' => $request->id_product,
            'payment'    => $request->payment,
            'price'      => $request->price,
            'change'     => $request->change,
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
