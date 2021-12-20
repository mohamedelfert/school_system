<?php

namespace App\Repositories;

use App\Models\Attendance;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Teacher;

class AttendancesRepository implements AttendancesRepositoryInterface
{

    public function index()
    {
        $title              = 'مدرستي - الحضور والغياب';
        $grades_by_sections = Grade::with('getSections')->get();
        $teachers           = Teacher::all();
        return view('attendances.sections',compact('title','grades_by_sections','teachers'));
    }

    public function show($id)
    {
        $title    = 'مدرستي - الحضور والغياب';
        $students = Student::with('getAttendances')->where('section_id',$id)->get();
        return view('attendances.attendance',compact('title','students'));
    }

    public function store($request)
    {
        try {

            foreach ($request->attendances as $studentsIds => $attendance){
                if ($attendance == 'presence'){
                    $attendance_status = true;
                }elseif ($attendance == 'absence'){
                    $attendance_status = false;
                }

                $attendances                    = new Attendance();
                $attendances->student_id        = $studentsIds;
                $attendances->grade_id          = $request->grade_id;
                $attendances->chapter_id        = $request->chapter_id;
                $attendances->section_id        = $request->section_id;
                $attendances->teacher_id        = 1;
                $attendances->attendance_date   = date('Y-m-d');
                $attendances->attendance_status = $attendance_status;
                $attendances->save();
            }

            toastr()->success(trans('messages.success'));
            return back();

        }catch (\Exception $e){
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function update($request)
    {
        // TODO: Implement update() method.
    }

    public function delete($request)
    {
        // TODO: Implement delete() method.
    }
}
