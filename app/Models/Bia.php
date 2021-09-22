<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bia extends Model
{
    use HasFactory;
    public static $snakeAttributes = false;

    public function company(){
        return $this->belongsTo(Company::class, "company_id", "id" );
    }

    public function biaDepartment(){
        return $this->hasMany(BiaDepartment::class, "bia_id", "id" );
    }

    public function biaService(){
        return $this->hasMany(BiaService::class, "bia_id", "id" );
    }
}
