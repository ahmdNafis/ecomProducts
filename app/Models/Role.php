<?php

namespace App\Models;

use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $fillable = ['id', 'role_title', 'role_activity', 'role_permissions'];

    public function users() {
        return $this->hasMany(User::class, 'role_id');
    }
}
