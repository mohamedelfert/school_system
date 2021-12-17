<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeesInvoices extends Model
{
    protected $table = 'fees_invoices';
    protected $guarded = [];

    public function getStudent(){
        return $this->belongsTo(Student::class,'student_id');
    }

    public function getGrades(){
        return $this->belongsTo(Grade::class,'grade_id');
    }

    public function getChapters(){
        return $this->belongsTo(Chapter::class,'chapter_id');
    }

    public function getStudyFees(){
        return $this->belongsTo(StudyFees::class,'fee_id');
    }
}
