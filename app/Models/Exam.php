<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Exam extends Model
{
    use HasTranslations;
    public $translatable = ['name'];

    protected $table = 'exams';

    protected $guarded = [];

    public function getSubjects(){
        return $this->belongsTo(Subject::class,'subject_id');
    }

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
