<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendances';

    protected $guarded = [];

    public function getChapter(){
        return $this->belongsTo(Chapter::class,'chapter_id');
    }

    public function getSection(){
        return $this->belongsTo(Section::class,'section_id');
    }

    public function getStudent(){
        return $this->belongsTo(Student::class,'student_id');
    }

    public function getGrade(){
        return $this->belongsTo(Grade::class,'grade_id');
    }
}
