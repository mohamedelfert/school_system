<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Chapter extends Model
{
    use HasTranslations;
    public $translatable = ['chapter_name'];

    protected $table = 'chapters';

    protected $fillable = ['id','chapter_name','grade_id'];

    public function getGrades(){
        return $this->belongsTo(Grade::class,'grade_id');
    }
}
