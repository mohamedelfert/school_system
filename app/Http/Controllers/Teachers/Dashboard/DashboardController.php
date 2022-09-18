<?php

namespace App\Http\Controllers\Teachers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Section;
use App\Models\Student;
use App\Models\Teacher;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function students()
    {
        $title = 'الطلاب - الحضور والغياب';
        $sectionIds = Teacher::findOrFail(Auth::user()->id)->sections()->pluck('section_id');
        $students = Student::whereIn('section_id', $sectionIds)->get();
        return view('teachers.dashboard.students', compact('title', 'students'));
    }

    public function sections()
    {
        $title = 'مدرستي - الفصول الدراسية';
        $sectionIds = Teacher::findOrFail(Auth::user()->id)->sections()->pluck('section_id');
        $sections = Section::whereIn('id', $sectionIds)->get();
        return view('teachers.dashboard.sections', compact('title', 'sections'));
    }

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
                        'student_id' => $studentsIds
                    ],
                    [
                        'student_id' => $studentsIds,
                        'grade_id' => $request->grade_id,
                        'chapter_id' => $request->chapter_id,
                        'section_id' => $request->section_id,
                        'teacher_id' => auth()->user()->id,
                        'attendance_date' => date('Y-m-d'),
                        'attendance_status' => $attendance_status,
                    ]);
            }

            toastr()->success(trans('messages.success'));
            return back();

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }
}
