<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactAndBasicInfo extends Model
{
    use HasFactory;

    public function platform(){
        return $this->belongsTo(SocialPlatform::class,'platform_id');
    }

}
