<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCompany extends Model
{
    use HasFactory;
    public static $snakeAttributes = false;

    public function company(){
        return $this->belongsTo(Company::class, "company_id", "id" );
    }
    public function user(){
        return $this->belongsTo(User::class, "user_id", "id" );
    }
}
