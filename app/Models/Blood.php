<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blood extends Model
{
    protected $table = 'bloods';
    protected $fillable = ['id','name'];
}
