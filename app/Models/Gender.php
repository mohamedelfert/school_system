<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Gender extends Model
{
    use HasTranslations;
    public $translatable = ['gender_name'];

    protected $table = 'genders';
    protected $fillable = ['id','gender_name'];
}
