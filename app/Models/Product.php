<?php

namespace App\Models;

use App\Models\ProductType;
use App\Models\Size;
use App\Models\Discount;
use App\Models\Order;
use App\Models\Review;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = ['product_title', 'product_code', 'product_slug', 'product_price', 'product_available', 'product_featured', 'has_sizes', 'product_images', 'product_type_id'];

    public function productType() {
        return $this->belongsTo(ProductType::class, 'product_type_id');
    }

    public function orders() {
        return $this->belongsToMany(Order::class, 'orders_products', 'product_id', 'order_id');
    }

    public function sizes() {
        return $this->belongsToMany(Size::class, 'products_sizes', 'product_id', 'size_id')->withPivot('dimension_value', 'dimension_title');
    }

    public function reviews() {
        return $this->hasMany(Review::class, 'product_id');
    }

    public function discount() {
        return $this->morphOne(Discount::class, 'discountable');
    }
}
