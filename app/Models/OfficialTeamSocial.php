<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficialTeamSocial extends Model
{
    use HasFactory;

    public function platform(){
        return $this->belongsTo(SocialPlatform::class,'platform_id');
    }
    public function officialTeam(){
        return $this->belongsTo(OffcialTeam::class,'official_team_id');
    }
}
