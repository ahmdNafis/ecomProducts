<?php

namespace App\Models;

use App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingRate extends Model
{
    use HasFactory;

    protected $table = 'shipping_rates';
    protected $fillable = ['id', 'shipping_location', 'flat_rate'];

    public function orders() {
        return $this->hasMany(Order::class, 'shipping_rate_id');
    }
}
