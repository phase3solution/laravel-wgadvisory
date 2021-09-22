<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrmAssessmentResult extends Model
{
    use HasFactory;
    public static $snakeAttributes = false;


    public function assessment(){
        return $this->belongsTo(Assessment::class, 'assessment_id', 'id');
    }
}
