<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SfiaSubcategory extends Model
{
    use HasFactory;
    public static $snakeAttributes = false;

    public function company(){
        return $this->belongsTo(Company::class, "company_id", "id" );
    }

    
    public function sfia(){
        return $this->belongsTo(Sfia::class, "sfia_id", "id" );
    }

    public function sfiaCategory(){
        return $this->belongsTo(SfiaCategory::class, "sfia_category_id", "id" );
    }

    public function sfiaSkill(){
        return $this->hasMany(SfiaSkill::class, "sfia_subcategory_id", "id" );
    }




}
