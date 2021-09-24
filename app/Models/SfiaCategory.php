<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SfiaCategory extends Model
{
    use HasFactory;
    public static $snakeAttributes = false;

    public function company(){
        return $this->belongsTo(Company::class, "company_id", "id" );
    }

    public function sfia(){
        return $this->belongsTo(Sfia::class, "sfia_id", "id" );
    }

    public function sfiaSubcategory(){
        return $this->hasMany(SfiaSubcategory::class, "sfia_category_id", "id" );
    }



}
