<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['product_name', 'category_id', 'product_code', 'description', 'price', 'unit', 'discount_amount', 'stock', 'image',];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function productCirculations()
    {
        return $this->hasMany(ProductCirculation::class);
    }

    public function saleDetails()
    {
        return $this->hasMany(SaleDetail::class);
    }

    public function purchaseDetails()
    {
        return $this->hasMany(PurchaseDetail::class);
    }
}
