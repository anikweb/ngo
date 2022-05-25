<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;
    public function imageGallery(){
        return $this->hasMany(ProjectImageGallery::class,'project_id');
    }
    public function events(){
        return $this->hasMany(Events::class,'project_id');
    }
}
