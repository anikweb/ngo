<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volunteers extends Model
{
    use HasFactory;
    public function prDivision(){
        return $this->belongsTo(Division::class,'prDivison');
    }
    public function prDistrict(){
        return $this->belongsTo(District::class,'prDistrict');
    }
    public function prThana(){
        return $this->belongsTo(District::class,'prThana');
    }

    public function pmDivision(){
        return $this->belongsTo(Division::class,'pmDivison');
    }
    public function pmDistrict(){
        return $this->belongsTo(District::class,'pmDistrict');
    }
    public function pmThana(){
        return $this->belongsTo(District::class,'pmThana');
    }
}
