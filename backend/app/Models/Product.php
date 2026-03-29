<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product"; // Name Table

    protected $primaryKey = "id_product"; // Primary Key

    public $incrementing = true; // Incrementing

    public $timestamps = true; // Timestamps

    protected $fillable = ['id_product', 'name', 'stock', 'price', 'photo', 'barcode', 'description', 'type', 'status', 'estimate', 'id_category', 'id_admin']; // Field Table
}
