<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'total_price',
        'table_number',
        'status',
        'payment_proof',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    // Order punya BANYAK items
    public function orderItems() {
        return $this->hasMany(OrderItem::class);
    }

    // Helper untuk ambil produk pertama (opsional, buat display di admin list biar gak error)
    public function product() {
        return $this->hasOneThrough(Product::class, OrderItem::class, 'order_id', 'id', 'id', 'product_id');
    }
}
