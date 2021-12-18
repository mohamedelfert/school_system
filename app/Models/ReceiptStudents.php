<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReceiptStudents extends Model
{
    protected $table = 'receipt_students';

    protected $guarded = [];

    public function getStudent(){
        return $this->belongsTo(Student::class,'student_id');
    }
}
