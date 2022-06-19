<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    public function District(){
        return $this->belongsTo(Division::class,'division_id');
    }
    public function Thana(){
        return $this->hasMany(Thana::class,'district_id');
    }
    public function prVolunteers(){
        return $this->hasMany(Volunteers::class,'prDistrict');
    }
    public function pmVolunteers(){
        return $this->hasMany(Volunteers::class,'pmDistrict');
    }
}
