<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volunteers extends Model
{
    use HasFactory;
    public function preDivision(){
        return $this->belongsTo(Division::class,'prDivison');
    }
    public function preDistrict(){
        return $this->belongsTo(District::class,'prDistrict');
    }
    public function preThana(){
        return $this->belongsTo(Thana::class,'prThana');
    }
    public function permDivision(){
        return $this->belongsTo(Division::class,'pmDivison');
    }
    public function permDistrict(){
        return $this->belongsTo(District::class,'pmDistrict');
    }
    public function permThana(){
        return $this->belongsTo(Thana::class,'pmThana');
    }
}
