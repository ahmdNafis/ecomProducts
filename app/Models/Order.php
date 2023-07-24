<?php

namespace App\Models;

use App\Models\ShippingRate;
use App\Models\Product;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = ['id', 'order_created', 'order_code', 'grand_total', 'total_quantity', 'note', 'payment_method', 'shipping_rate_id', 'user_id'];

    public function shippingRate() {
        return $this->belongsTo(ShippingRate::class, 'shipping_rate_id');
    }

    public function products() {
        return $this->belongsToMany(Product::class, 'orders_products', 'order_id', 'product_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
