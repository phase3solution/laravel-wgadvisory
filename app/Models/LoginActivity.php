<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginActivity extends Model
{
    use HasFactory;

    public static $snakeAttributes = false;

    public function user(){
        return $this->belongsTo(User::class, "user_id", "id" );
    }
}