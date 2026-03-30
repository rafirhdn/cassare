<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;

class ProductController extends Controller
{
    // Index
    public function index(Request $request)
    {
        $product = Product::with('category')
            ->where('id_admin', $request->user()->id_admin)
            ->get();

        return response()->json([
            'success' => true,
            'data'    => $product
        ], 200);
    }

    // Store
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'        => 'required|string|max:100|unique:product,name',
            'stock'       => 'required|integer|min:0',
            'price'       => 'required|string|min:0',
            'description' => 'required|string|max:255',
            'photo'       => 'required|image|mimes:jpg,jpeg,png|max:5120',
            'type'        => 'required|in:Pra-pesan,Siap-pesan',
            'status'      => 'required|in:Tersedia,Tidak Tersedia',
            'estimate'    => 'required|in:Langsung Ambil,7 Hari Kerja',
            'id_category' => 'required|exists:category,id_category',
        ], [
            'name.required'        => 'Nama produk wajib diisi!',
            'name.max'             => 'Nama produk melebihi batas!',
            'name.unique'          => 'Nama produk sudah digunakan!',
            'stock.required'       => 'Stok produk wajib diisi!',
            'stock.integer'        => 'Stok produk harus berupa angka!',
            'price.required'       => 'Harga produk wajib diisi!',
            'description.required' => 'Deskripsi produk wajib diisi!',
            'description.max'      => 'Deskripsi produk melebihi batas!',
            'photo.image'          => 'Foto produk wajib diupload!',
            'photo.mimes'          => 'Format foto produk harus jpg, jpeg, atau png!',
            'photo.max'            => 'Ukuran foto produk maksimal 5MB!',
            'type.required'        => 'Tipe produk wajib dipilih!',
            'status.required'      => 'Status produk wajib dipilih!',
            'estimate.required'    => 'Estimasi produk wajib dipilih!',
            'id_category.required' => 'Kategori produk wajib dipilih!',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors()
            ], 422);
        }

        $slugName  = Str::slug($request->name);
        $photoName = $slugName . '_' . time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('uploads/product'), $photoName);

        $barcode = 'PRD-' . str_pad(Product::count() + 1, 4, '0', STR_PAD_LEFT) . '-' . date('Ymd');

        $product = Product::create([
            'name'        => $request->name,
            'stock'       => $request->stock,
            'price'       => $request->price,
            'description' => $request->description,
            'photo'       => $photoName,
            'barcode'     => $barcode,
            'type'        => $request->type,
            'status'      => $request->status,
            'estimate'    => $request->estimate,
            'id_category' => $request->id_category,
            'id_admin'    => $request->user()->id_admin,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil ditambahkan!',
            'data'    => $product
        ], 201);
    }

    // Show
    public function show(Request $request)
    {
        $product = Product::find($request->id_product);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Produk tidak ditemukan!'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => $product
        ], 200);
    }

    // Update
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'        => 'required|string|max:100|unique:product,name,' . $request->id_product . ',id_product',
            'stock'       => 'required|integer|min:0',
            'price'       => 'required|string|min:0',
            'description' => 'required|string|max:255',
            'photo'       => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            'type'        => 'required|in:Pra-pesan,Siap-pesan',
            'status'      => 'required|in:Tersedia,Tidak Tersedia',
            'estimate'    => 'required|in:Langsung Ambil,7 Hari Kerja',
            'id_category' => 'required|exists:category,id_category',
        ], [
            'name.required'        => 'Nama produk wajib diisi!',
            'name.max'             => 'Nama produk melebihi batas!',
            'name.unique'          => 'Nama produk sudah digunakan!',
            'stock.required'       => 'Stok produk wajib diisi!',
            'stock.integer'        => 'Stok produk harus berupa angka!',
            'price.required'       => 'Harga produk wajib diisi!',
            'description.required' => 'Deskripsi produk wajib diisi!',
            'description.max'      => 'Deskripsi produk melebihi batas!',
            'photo.image'          => 'Foto produk wajib diupload!',
            'photo.mimes'          => 'Format foto produk harus jpg, jpeg, atau png!',
            'photo.max'            => 'Ukuran foto produk maksimal 5MB!',
            'type.required'        => 'Tipe produk wajib dipilih!',
            'status.required'      => 'Status produk wajib dipilih!',
            'estimate.required'    => 'Estimasi produk wajib dipilih!',
            'id_category.required' => 'Kategori produk wajib dipilih!',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors()
            ], 422);
        }

        $product = Product::find($request->id_product);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Produk tidak ditemukan!'
            ], 404);
        }

        if ($request->hasFile('photo')) {
            $oldPhoto = public_path('uploads/product/' . $product->photo);
            if (file_exists($oldPhoto)) {
                unlink($oldPhoto);
            }

            $slugName  = Str::slug($request->name);
            $photoName = $slugName . '_' . time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads/product/'), $photoName);
        } else {
            $photoName = $product->photo;
        }

        $product->update([
            'name'        => $request->name,
            'stock'       => $request->stock,
            'price'       => $request->price,
            'description' => $request->description,
            'photo'       => $photoName,
            'type'        => $request->type,
            'status'      => $request->status,
            'estimate'    => $request->estimate,
            'id_category' => $request->id_category,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil diupdate!',
            'data'    => $product
        ], 200);
    }

    // Destroy
    public function destroy(Request $request)
    {
        $product = Product::find($request->id_product);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Produk tidak ditemukan!'
            ], 404);
        }

        $oldPhoto = public_path('uploads/product/' . $product->photo);
        if (file_exists($oldPhoto)) {
            unlink($oldPhoto);
        }

        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil dihapus!'
        ], 200);
    }
}
