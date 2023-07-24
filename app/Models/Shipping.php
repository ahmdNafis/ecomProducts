<?php

namespace App\Models;

use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;

    protected $table = 'shippings';
    protected $fillable = ['id', 'shipping_address', 'billing_address', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
