<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = "cart"; // Name Table

    protected $primaryKey = "id_cart"; // Primary Key

    public $incrementing = true; // Incrementing

    public $timestamps = true; // Timestamps

    protected $fillable = ['id_cart', 'price', 'time', 'id_admin', 'id_product']; // Field Table

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product', 'id_product');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin', 'id_admin'); // ← tambah ini
    }
}
