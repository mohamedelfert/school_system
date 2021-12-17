<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class StudyFees extends Model
{
    use HasTranslations;
    public $translatable = ['name'];

    protected $table = 'study_fees';
    protected $guarded = [];

    public function getGrades(){
        return $this->belongsTo(Grade::class,'grade_id');
    }

    public function getChapters(){
        return $this->belongsTo(Chapter::class,'chapter_id');
    }
}
