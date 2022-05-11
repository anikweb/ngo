<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OffcialTeam extends Model
{
    use HasFactory;
    public function officialTeamSocial(){
        return $this->hasMany(OfficialTeamSocial::class,'official_team_id');
    }
}
