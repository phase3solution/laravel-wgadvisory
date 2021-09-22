<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssessmentType extends Model
{
    use HasFactory;
    public static $snakeAttributes = false;

    public function assessment(){
        return $this->hasMany(Assessment::class, "assessment_type_id", "id" );
    }

    public function assessmentLabel(){
        return $this->hasMany(AssessmentLabel::class, "assessment_type_id", "id");
    }

    public function company(){
        return $this->hasMany(CompanyAssessmentType::class, "assessment_type_id", "id");
    }

}
