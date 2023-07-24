<?php

namespace App\Models;

use App\Models\Policy;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolicyType extends Model
{
    use HasFactory;

    protected $table = 'policy_types';
    protected $fillable = ['id', 'policy_type_title', 'policy_type_description', 'policy_type_active'];

    public function policies() {
        return $this->hasMany(Policy::class, 'policy_type_id');
    }
}
