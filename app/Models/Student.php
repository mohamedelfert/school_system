<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Translatable\HasTranslations;

class Student extends Authenticatable
{
    use SoftDeletes;
    use HasTranslations;
    public $translatable = ['student_name'];

    protected $table = 'students';
    protected $guarded = [];

    public function images()
    {
        return $this->morphMany(Image::class, 'image');
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

    public function getParents(){
        return $this->belongsTo(MyParent::class,'parent_id');
    }

    public function getGenders(){
        return $this->belongsTo(Gender::class,'gender_id');
    }

    public function getNationalities(){
        return $this->belongsTo(Nationality::class,'nationality_id');
    }

    public function getBloods(){
        return $this->belongsTo(Blood::class,'blood_id');
    }

    public function getStudentAccount(){
        return $this->hasMany(StudentAccount::class,'student_id');
    }

    public function getAttendances(){
        return $this->hasMany(Attendance::class,'student_id');
    }
}
