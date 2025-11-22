<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'category', 'description', 'price', 'stock', 'image'
    ];

    // Fitur Filter & Search
    public function scopeFilter($query, array $filters)
    {
        // Filter by Category
        if (isset($filters['category']) ? $filters['category'] : false) {
            $query->where('category', request('category'));
        }

        // Filter by Search (Nama Produk)
        if (isset($filters['search']) ? $filters['search'] : false) {
            $query->where('name', 'like', '%' . request('search') . '%')
                  ->orWhere('description', 'like', '%' . request('search') . '%');
        }
    }
}
