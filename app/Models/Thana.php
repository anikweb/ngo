<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thana extends Model
{
    use HasFactory;
    public function Division(){
        return $this->belongsTo(Division::class,'division_id');
    }
    public function District(){
        return $this->belongsTo(District::class,'district_id');
    }
    public function prVolunteers(){
        return $this->hasMany(Volunteers::class,'prThana');
    }
    public function pmVolunteers(){
        return $this->hasMany(Volunteers::class,'pmThana');
    }
}
