<?php

namespace App\Http\Controllers\Parents;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
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

    public function attendanceReports()
    {
        $title = 'التقارير - الحضور والغياب';
        $students = Student::where('parent_id', auth()->user()->id)->get();
        return view('parents.children.attendance_reports', compact('title', 'students'));
    }

    public function attendanceSearch(Request $request)
    {
        $rules = [
            'from_date' => 'required|date|date_format:Y-m-d',
            'to_date' => 'required|date|date_format:Y-m-d|after_or_equal:from_date',
        ];
        $validate_msg_ar = [
            'from_date.required' => 'يجب تحديد تاريخ بداية البحث',
            'from_date.date' => 'يجب ان يكون تاريخ',
            'from_date.date_format' => 'يجب ان يكون التاريخ علي الصيغة y-m-d',
            'to_date.required' => 'يجب تحديد تاريخ نهاية البحث',
            'to_date.date' => 'يجب ان يكون تاريخ',
            'to_date.date_format' => 'يجب ان يكون التاريخ علي الصيغة y-m-d',
            'to_date.after_or_equal' => 'يجب ان يكون تاريخ بداية البحث قبل تاريخ نهاية البحث',
        ];
        $validate = $this->validate($request, $rules, $validate_msg_ar);

        $title = 'التقارير - الحضور والغياب';
        $students = Student::where('parent_id', auth()->user()->id)->get();

        if ($request->student_id === 'all') {
            $attendances = Attendance::whereBetween('attendance_date', [$request->from_date, $request->to_date])->get();
            return view('parents.children.attendance_reports', compact('title', 'students', 'attendances'));
        } else {
            $attendances = Attendance::whereBetween('attendance_date', [$request->from_date, $request->to_date])
                ->where('student_id', $request->student_id)->get();
            return view('parents.children.attendance_reports', compact('title', 'students', 'attendances'));
        }
    }
}
