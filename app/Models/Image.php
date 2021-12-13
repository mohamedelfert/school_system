<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    protected $fillable = ['id','file_name','image_id','image_type'];

    public function imageAble()
    {
        return $this->morphTo();
    }
}
