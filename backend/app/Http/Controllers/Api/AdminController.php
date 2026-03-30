<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Admin;

class AdminController extends Controller
{
    // Index
    public function index()
    {
        $admins = Admin::where('level', 'Kasir')->get();

        foreach ($admins as $admin) {
            try {
                $admin->password = decrypt($admin->password);
            } catch (\Exception $e) {
                $admin->password = '';
            }
        }

        return response()->json([
            'success' => true,
            'data'    => $admins
        ], 200);
    }

    // Store
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:50',
            'email'    => 'required|email|max:100|unique:admin',
            'password' => 'required|string|min:8',
        ], [
            'name.required'     => 'Nama kasir wajib diisi!',
            'name.max'          => 'Nama kasir melebihi batas!',
            'email.required'    => 'Email kasir wajib diisi!',
            'email.email'       => 'Format email tidak valid!',
            'email.unique'      => 'Email kasir sudah digunakan!',
            'password.required' => 'Password kasir wajib diisi!',
            'password.min'      => 'Password minimal 8 karakter!',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors()
            ], 422);
        }

        $admin = Admin::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => encrypt($request->password),
            'role'     => 'cashier',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Kasir berhasil ditambahkan!',
            'data'    => $admin
        ], 201);
    }

    // Show
    public function show(Request $request)
    {
        $admin = Admin::find($request->id_admin);

        if (!$admin) {
            return response()->json([
                'success' => false,
                'message' => 'Kasir tidak ditemukan!'
            ], 404);
        }

        try {
            $admin->password = decrypt($admin->password);
        } catch (\Exception $e) {
            $admin->password = '';
        }

        return response()->json([
            'success' => true,
            'data'    => $admin
        ], 200);
    }

    // Update
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:50',
            'email'    => 'required|email|max:100|unique:admins,email,' . $request->id_admin . ',id_admin',
            'password' => 'nullable|string|min:8',
            'status'   => 'required|in:active,inactive',
        ], [
            'name.required'  => 'Nama kasir wajib diisi!',
            'name.max'       => 'Nama kasir melebihi batas!',
            'email.required' => 'Email kasir wajib diisi!',
            'email.email'    => 'Format email tidak valid!',
            'email.unique'   => 'Email kasir sudah digunakan!',
            'password.min'   => 'Password minimal 8 karakter!',
            'status.required' => 'Status kasir wajib diisi!',
            'status.in'      => 'Status kasir tidak valid!',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors()
            ], 422);
        }

        $admin = Admin::find($request->id_admin);

        if (!$admin) {
            return response()->json([
                'success' => false,
                'message' => 'Kasir tidak ditemukan!'
            ], 404);
        }

        $admin->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => $request->password ? encrypt($request->password) : $admin->password,
            'status'   => $request->status,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Kasir berhasil diupdate!',
            'data'    => $admin
        ], 200);
    }

    // Destroy
    public function destroy(Request $request)
    {
        $admin = Admin::find($request->id_admin);

        if (!$admin) {
            return response()->json([
                'success' => false,
                'message' => 'Kasir tidak ditemukan!'
            ], 404);
        }

        $admin->delete();

        return response()->json([
            'success' => true,
            'message' => 'Kasir berhasil dihapus!'
        ], 200);
    }
}
