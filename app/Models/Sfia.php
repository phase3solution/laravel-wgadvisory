<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sfia extends Model
{
    use HasFactory;

    public static $snakeAttributes = false;

    public function company(){
        return $this->belongsTo(Company::class, "company_id", "id" );
    }

    
}
