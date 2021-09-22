<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SfiaTeamRole extends Model
{
    use HasFactory;
    public static $snakeAttributes = false;

    public function company(){
        return $this->belongsTo(Company::class, "company_id", "id" );
    }

    public function sfiaTeam(){
        return $this->belongsTo(SfiaTeam::class, "sfia_team_id", "id" );
    }

    public function sfiaRole(){
        return $this->belongsTo(SfiaRole::class, "sfia_role_id", "id" );
    }



}
