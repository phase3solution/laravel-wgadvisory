<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CompanyAssessmentType extends Model
{
    use HasFactory;
    public static $snakeAttributes = false;

    public function assessmentType()
    {
        return $this->belongsTo(AssessmentType::class, "assessment_type_id", "id" );
    }

    public function assessment(){

        return $this->belongsTo(Assessment::class, "assessment_id", "id" );

    }

    public function company(){

        return $this->belongsTo(Company::class, "company_id", "id" );
        
    }

}
