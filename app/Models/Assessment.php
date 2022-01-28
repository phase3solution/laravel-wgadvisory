<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Assessment extends Model
{
    use HasFactory;
    public static $snakeAttributes = false;

    public function assessmentType(){
        return $this->belongsTo(AssessmentType::class, "assessment_type_id", "id" );
    }

    public function assessmentLabel(){
        return $this->belongsTo(AssessmentLabel::class, "assessment_label_id", "id" );
    }

    public function parent(){
        return $this->belongsTo(Assessment::class, 'parent_id', 'id');
    }

    public function children(){
        return $this->hasMany(Assessment::class, 'parent_id', 'id');
    }

    public function company(){
        return $this->hasOne(CompanyAssessmentType::class, "assessment_id", "id");
    }
    public function assignCompany(){
        return $this->hasOne(CompanyAssessmentType::class, "assessment_id", "id");
    }


    public function bcpResult(){
        return $this->hasOne(BcpAssessmentResult::class, "assessment_id", "id");
    }

    public function bcpRegisterResult(){
        return $this->hasOne(BcpRegisterResult::class, "assessment_id", "id");
    }

    public function facilityRiskResult(){
        return $this->hasOne(FacilityRiskAssessmentResult::class, "assessment_id", "id");
    }

    public function drmResult(){
        return $this->hasOne(DrmAssessmentResult::class, "assessment_id", "id");
    }

    public function drmRegisterResult(){
        return $this->hasOne(DrmRegisterResult::class, "assessment_id", "id");
    }

    public function registerAssessment(){
        return $this->hasOne(Assessment::class, "register_id", "id");
    }

    public function assessmentRegister(){
        return $this->belongsTo(Assessment::class, "register_id", "id");
    }

    public function itManagementResult(){
        return $this->hasOne(ItManagementResult::class, "assessment_id", "id");
    }    

    public function cloudReadinessResult(){
        return $this->hasOne(CloudReadinessResult::class, "assessment_id", "id");
    }
    
    public function cybersecurityMaturityResult(){
        return $this->hasOne(CybersecurityMaturityResult::class, "assessment_id", "id");
    } 

    public function cybersecurityMaturityRegisterResult(){
        return $this->hasOne(CybersecurityMaturityRegisterResult::class, "assessment_id", "id");
    } 


}
