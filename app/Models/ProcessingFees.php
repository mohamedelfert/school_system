<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProcessingFees extends Model
{
    protected $table = 'processing_fees';

    protected $guarded = [];

    public function getStudent(){
        return $this->belongsTo(Student::class,'student_id');
    }

    public function getStudentAccount(){
        return $this->hasMany(StudentAccount::class,'student_id');
    }
}
