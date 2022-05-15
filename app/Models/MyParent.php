<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Translatable\HasTranslations;

class MyParent extends Authenticatable
{
    use HasTranslations;
    public $translatable = ['father_name','mother_name','father_job','mother_job'];

    protected $table = 'my_parents';
//    protected $fillable = [
//        'id', 'email', 'password', 'father_name', 'father_address', 'father_phone', 'father_id',
//        'father_passport', 'father_job', 'father_nationality_id', 'father_religion_id', 'father_blood_id',
//        'mother_name', 'mother_address', 'mother_phone', 'mother_id', 'mother_passport', 'mother_job',
//        'mother_nationality_id', 'mother_religion_id', 'mother_blood_id'
//    ];

    // or use this instead of $fillable
    protected $guarded = [];
}
