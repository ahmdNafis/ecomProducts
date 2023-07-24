<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Discount;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;

    protected $table = 'product_types';
    protected $fillable = ['type_name', 'type_active', 'type_weight', 'type_description'];

    public function products() {
        return $this->hasMany(Product::class, 'product_type_id');
    }

    public function discount() {
        return $this->morphOne(Discount::class, 'discountable');
    }
}
