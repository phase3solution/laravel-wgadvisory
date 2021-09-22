<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssessmentLabel extends Model
{
    use HasFactory;
   // public static $snakeAttributes = false;


    public function assessment(){
        return $this->hasMany(Assessment::class, "assessment_label_id", "id");
    }

    public function assessmentType(){
        return $this->belongsTo(AssessmentType::class, "assessment_type_id", "id");
    }

}
