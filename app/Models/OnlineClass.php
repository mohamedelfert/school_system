<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class OnlineClass extends Model
{
    protected $table = 'online_classes';

    protected $guarded = [];

    public function getGrades(){
        return $this->belongsTo(Grade::class,'grade_id');
    }

    public function getChapters(){
        return $this->belongsTo(Chapter::class,'chapter_id');
    }

    public function getSections(){
        return $this->belongsTo(Section::class,'section_id');
    }

    public function getUsers(){
        return $this->belongsTo(User::class,'user_id');
    }
}
