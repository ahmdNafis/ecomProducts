<?php

namespace App\Models;

use App\Models\PolicyType;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    use HasFactory;

    protected $table = 'policies';
    protected $fillable = ['id' , 'policy_title', 'policy_body', 'policy_enabled', 'policy_type_id'];

    public function policyType() {
        return $this->belongsTo(PolicyType::class, 'policy_type_id');
    }
}
