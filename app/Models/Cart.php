<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    /** @use HasFactory<\Database\Factories\CartFactory> */
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'product_id',
        'bill_id',
        'title',
        'sn',
        'price',
        'category',
        'amount',
    ];

    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
