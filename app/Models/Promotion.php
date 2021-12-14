<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $table = 'promotions';
    protected $guarded = [];

    public function getStudents(){
        return $this->belongsTo(Student::class,'student_id');
    }

    public function fromGrades(){
        return $this->belongsTo(Grade::class,'from_grade_id');
    }

    public function fromChapters(){
        return $this->belongsTo(Chapter::class,'from_chapter_id');
    }

    public function fromSections(){
        return $this->belongsTo(Section::class,'from_section_id');
    }

    public function toGrades(){
        return $this->belongsTo(Grade::class,'to_grade_id');
    }

    public function toChapters(){
        return $this->belongsTo(Chapter::class,'to_chapter_id');
    }

    public function toSections(){
        return $this->belongsTo(Section::class,'to_section_id');
    }
}
