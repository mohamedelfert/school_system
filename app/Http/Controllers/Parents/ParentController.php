<?php

namespace App\Http\Controllers\Parents;

use App\Http\Controllers\Controller;
use App\Models\Degree;
use App\Models\Student;
use Illuminate\Http\Request;

class ParentController extends Controller
{
    public function parentDashboard()
    {
        $students = Student::where('parent_id', auth()->user()->id)->get();
        return view('parents.dashboard', compact('students'));
    }

    public function parentChildren()
    {
        $title = 'مدرستي - قائمه الأبناء';
        $students = Student::where('parent_id', auth()->user()->id)->get();
        return view('parents.children.index', compact('title', 'students'));
    }

    public function childrenResults($id)
    {
        $title = 'مدرستي - نتائج الاختبارات';
        $student = Student::findOrFail($id);
        if ($student->parent_id !== auth()->user()->id) {
            toastr()->error('عفوا لا تسطيع مشاهده نتائج طلاب أحرين , فقط أبنائك');
            return redirect(route('parent.children'));
        }

        $degrees = Degree::where('student_id', $id)->get();
        if ($degrees->isEmpty()) {
            toastr()->error('لا توجد نتائج اختبارات لهذا الطالب');
            return redirect(route('parent.children'));
        }
        return view('parents.children.degrees', compact('title', 'degrees'));
    }
}
