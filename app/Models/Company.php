<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;
    public static $snakeAttributes = false;

    public function userCompany(){
        return $this->hasMany(UserCompany::class, "company_id", "id" );
    }

    public function companyAsessmentType(){
        return $this->hasMany(CompanyAssessmentType::class, "company_id", "id" );
    }


    public function bia(){
        return $this->hasMany(Bia::class, "company_id", "id" );
    }

    public function biaService(){
        return $this->hasMany(BiaService::class, "company_id", "id" );
    }
    
    public function biaDepartment(){
        return $this->hasMany(BiaDepartment::class, "company_id", "id" );
    }





}
