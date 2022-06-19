<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;
    public function District(){
        return $this->hasMany(District::class,'division_id');
    }
    public function Thana(){
        return $this->hasMany(Thana::class,'division_id');
    }
    public function prVolunteers(){
        return $this->hasMany(Volunteers::class,'prDivison');
    }
    public function pmVolunteers(){
        return $this->hasMany(Volunteers::class,'pmDivison');
    }
}
