<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;
    public static $snakeAttributes = false;

    public function user(){
        return $this->belongsTo(User::class, "user_id", "id" );
    }

  

    public function role(){
        return $this->belongsTo(Role::class, "role_id", "id" );
    }


}
