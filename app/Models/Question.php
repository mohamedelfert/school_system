<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Question extends Model
{
    use HasTranslations;
    public $translatable = ['title'];

    protected $table = 'questions';

    protected $guarded = [];

    public function getExams(){
        return $this->belongsTo(Exam::class,'exam_id');
    }
}
