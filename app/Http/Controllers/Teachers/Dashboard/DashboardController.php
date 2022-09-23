<?php

namespace App\Http\Controllers\Teachers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Section;
use App\Models\Student;
use App\Models\Teacher;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // show all students for specified teacher
    public function students()
    {
        $title = 'الطلاب - الحضور والغياب';
        $sectionIds = Teacher::findOrFail(Auth::user()->id)->sections()->pluck('section_id');
        $students = Student::whereIn('section_id', $sectionIds)->get();
        return view('teachers.dashboard.students', compact('title', 'students'));
    }

    // show all sections for specified teacher
    public function sections()
    {
        $title = 'مدرستي - الفصول الدراسية';
        $sectionIds = Teacher::findOrFail(Auth::user()->id)->sections()->pluck('section_id');
        $sections = Section::whereIn('id', $sectionIds)->get();
        return view('teachers.dashboard.sections', compact('title', 'sections'));
    }

    // teacher can make attendances for students
    public function attendance(Request $request)
    {
        try {

            foreach ($request->attendances as $studentsIds => $attendance) {
                if ($attendance == 'presence') {
                    $attendance_status = true;
                } elseif ($attendance == 'absence') {
                    $attendance_status = false;
                }

                Attendance::updateOrCreate(
                    [
                        'student_id' => $studentsIds,
                        'attendance_date' => date('Y-m-d'),
                    ],
                    [
                        'student_id' => $studentsIds,
                        'grade_id' => $request->grade_id,
                        'chapter_id' => $request->chapter_id,
                        'section_id' => $request->section_id,
                        'teacher_id' => auth()->user()->id,
                        'attendance_date' => date('Y-m-d'),
                        'attendance_status' => $attendance_status,
                    ]
                );
            }

            toastr()->success(trans('messages.success'));
            return back();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    // attendances reports for students
    public function attendanceReports()
    {
        $title = 'التقارير - الحضور والغياب';
        $sectionIds = Teacher::findOrFail(Auth::user()->id)->sections()->pluck('section_id');
        $students = Student::whereIn('section_id', $sectionIds)->get();
        return view('teachers.dashboard.attendance_reports', compact('title', 'students'));
    }

    // attendances search
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
        $data = $this->validate($request, $rules, $validate_msg_ar);

        $title = 'التقارير - الحضور والغياب';
        $sectionIds = Teacher::findOrFail(Auth::user()->id)->sections()->pluck('section_id');
        $students = Student::whereIn('section_id', $sectionIds)->get();

        if ($request->student_id === 'all') {
            $attendances = Attendance::whereBetween('attendance_date', [$request->from_date, $request->to_date])->get();
            return view('teachers.dashboard.attendance_reports', compact('title', 'students', 'attendances'));
        } else {
            $attendances = Attendance::whereBetween('attendance_date', [$request->from_date, $request->to_date])
                ->where('student_id', $request->student_id)->get();
            return view('teachers.dashboard.attendance_reports', compact('title', 'students', 'attendances'));
        }
    }

    public function showProfile()
    {
        $teacher = Teacher::findOrFail(auth::user()->id);
        $title = 'مدرستي - الملف الشخصي';
        return view('teachers.dashboard.teacher_profile', compact('title', 'teacher'));
    }

    public function updateProfile(Request $request)
    {
        $rules = [
            'name' => 'required',
            'name_en' => 'required',
            'address' => 'required',
            'password' => 'sometimes|nullable',
        ];
        $validate_msg_ar = [
            'name.required' => 'يجب كتابه الاسم بالعربيه',
            'name_en.required' => 'يجب كتابه الاسم بالانجليزيه',
            'address.required' => 'يجب كتابه العنوان',
        ];
        $validate = $this->validate($request, $rules, $validate_msg_ar);

        $teacher = Teacher::findOrFail($request->id);
        if ($request->password) {
            $data['teacher_name'] = ['ar' => $request->name, 'en' => $request->name_en];
            $data['teacher_address'] = $request->address;
            $data['password'] = bcrypt($request->password);

            $teacher->update($data);
        } else {
            $data['teacher_name'] = ['ar' => $request->name, 'en' => $request->name_en];
            $data['teacher_address'] = $request->address;

            $teacher->update($data);
        }
        toastr()->success(trans('messages.update'));
        return back();
    }
}
