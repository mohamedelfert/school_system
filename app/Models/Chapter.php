<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $table = 'chapters';

    protected $fillable = ['id','chapter_name','grade_id'];

    public function getGrades(){
        return $this->hasMany(Grade::class,'id','grade_id');
    }
}
