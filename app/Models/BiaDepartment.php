<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiaDepartment extends Model
{
    use HasFactory;
    public static $snakeAttributes = false;


    public function company(){
        return $this->belongsTo(Company::class, "company_id", "id" );
    }

    public function bia(){
        return $this->belongsTo(Bia::class, "bia_id", "id" );
    }

    public function biaService(){
        return $this->hasMany(BiaService::class, "bia_department_id", "id" );
    }

    public function biaDepartmentResult(){
        return $this->hasOne(BiaDepartmentResult::class, "bia_department_id", "id" );
    }
}
