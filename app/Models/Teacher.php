<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Translatable\HasTranslations;

class Teacher extends Authenticatable
{
    use HasTranslations;

    public $translatable = ['teacher_name'];

    protected $table = 'teachers';
    protected $fillable = [
        'id', 'teacher_name', 'email', 'password',
        'teacher_address', 'specialization_id', 'gender_id', 'joining_at'
    ];

    public function getGender()
    {
        return $this->hasOne(Gender::class, 'id', 'gender_id');
    }

    public function getSpecialization()
    {
        return $this->hasOne(Specialization::class, 'id', 'specialization_id');
    }

    public function sections()
    {
        return $this->belongsToMany(Section::class, 'teachers_sections');
    }
}
