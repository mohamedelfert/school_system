<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasTranslations;
    public $translatable = ['section_name'];

    protected $table = 'sections';

    protected $fillable = ['id','section_name','status','grade_id','chapter_id'];

    public function getChapters(){
        return $this->belongsTo(Chapter::class,'chapter_id');
    }

    public function teachers(){
        return $this->belongsToMany(Teacher::class,'teachers_sections');
    }

    public function getGrades(){
        return $this->belongsTo(Grade::class,'grade_id');
    }
}
