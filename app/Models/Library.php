<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    protected $table = 'libraries';
    protected $guarded = [];

    public function getGrades(){
        return $this->belongsTo(Grade::class,'grade_id');
    }

    public function getChapters(){
        return $this->belongsTo(Chapter::class,'chapter_id');
    }

    public function getSections(){
        return $this->belongsTo(Section::class,'section_id');
    }

    public function getTeachers(){
        return $this->belongsTo(Teacher::class,'teacher_id');
    }
}
