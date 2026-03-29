<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = "cart"; // Name Table

    protected $primaryKey = "id_transaction"; // Primary Key

    public $incrementing = true; // Incrementing

    public $timestamps = true; // Timestamps

    protected $fillable = ['id_cart', 'price', 'time', 'id_admin', 'id_product']; // Field Table
}
