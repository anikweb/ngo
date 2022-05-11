<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialPlatform extends Model
{
    use HasFactory;

    public function contactInfo(){
        return $this->hasMany(ContactAndBasicInfo::class,'platform_id');
    }
    public function advisorSocial(){
        return $this->hasMany(AdvisorSocial::class,'platform_id');
    }
    public function officialTeamSocial(){
        return $this->hasMany(OfficialTeamSocial::class,'platform_id');
    }
}
