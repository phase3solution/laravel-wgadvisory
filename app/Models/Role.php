<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    public static $snakeAttributes = false;

    public function userRole(){
        return $this->hasMany(UserRole::class, "role_id", "id" );
    }

}
