<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvisorSocial extends Model
{
    use HasFactory;
    public function advisor(){
        return $this->belongsTo(AdvisorSocial::class,'advisor_id');
    }
    public function platform(){
        return $this->belongsTo(SocialPlatform::class,'platform_id');
    }
}
