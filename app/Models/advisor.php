<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class advisor extends Model
{
    use HasFactory;
    public function advisorSocial(){
        return $this->hasMany(AdvisorSocial::class,'advisor_id');
    }
}
