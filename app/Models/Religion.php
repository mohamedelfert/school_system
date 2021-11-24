<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Religion extends Model
{
    use HasTranslations;
    public $translatable = ['religion_name'];

    protected $table = 'religions';
    protected $fillable = ['id','religion_name'];
}
