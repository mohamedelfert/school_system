<?php

namespace App\Repositories;

use App\Models\Blood;
use App\Models\Chapter;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\MyParent;
use App\Models\Nationality;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use mysql_xdevapi\Exception;

class StudentRepository implements StudentRepositoryInterface {

    public function getAllStudents()
    {
        $title        = 'مدرستي - الطلاب';
        $all_students = Student::all();
        return view('students.student',compact('title','all_students'));
    }

    public function createStudent()
    {
        $title                  = 'مدرستي - اضافه طالب جديد';
        $all_grades             = Grade::all();
        $all_sections           = Section::all();
        $all_chapters           = Chapter::all();
        $parents                = MyParent::all();
        $all_genders            = Gender::all();
        $all_nationality        = Nationality::all();
        $all_blood              = Blood::all();
        return view('students.add_student',
                compact('title','all_grades','all_sections','all_chapters','parents',
                                'all_genders','all_nationality','all_blood')
        );
    }

    public function storeStudent($request)
    {
        try {

            $data['student_name']           = ['ar' => $request->student_name,'en' => $request->student_name_en];
            $data['student_email']          = $request->student_email;
            $data['password']               = Hash::make($request->password);
            $data['gender_id']              = $request->gender_id;
            $data['nationality_id']         = $request->nationality_id;
            $data['blood_id']               = $request->blood_id;
            $data['parent_id']              = $request->parent_id;
            $data['date_of_birth']          = $request->date_of_birth;
            $data['grade_id']               = $request->grade_id;
            $data['chapter_id']             = $request->chapter_id;
            $data['section_id']             = $request->section_id;
            $data['joining_at']             = $request->joining_at;
            $data['academic_year']          = $request->academic_year;

            Student::create($data);
            toastr()->success(trans('messages.success'));
            return back();

        }catch (\Exception $e){
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function showStudent($id)
    {
        $title                  = 'مدرستي - بيانات طالب';
        $student                = Student::findOrFail($id);
        return view('students.show_student',compact('title','student'));
    }

    public function editStudent($id)
    {
        $student                = Student::findOrFail($id);
        $title                  = 'مدرستي - تعديل بيانات طالب';
        $all_grades             = Grade::all();
        $all_sections           = Section::all();
        $all_chapters           = Chapter::all();
        $parents                = MyParent::all();
        $all_genders            = Gender::all();
        $all_nationality        = Nationality::all();
        $all_blood              = Blood::all();
        return view('students.edit_student',
            compact('student','title','all_grades','all_sections','all_chapters','parents',
                'all_genders','all_nationality','all_blood')
        );
    }

    public function updateStudent($request)
    {
        try {

            $id                             = $request->id;
            $student                        = Student::findOrFail($id);
            $data['student_name']           = ['ar' => $request->student_name,'en' => $request->student_name_en];
            $data['student_email']          = $request->student_email;
            $data['password']               = Hash::make($request->password);
            $data['gender_id']              = $request->gender_id;
            $data['nationality_id']         = $request->nationality_id;
            $data['blood_id']               = $request->blood_id;
            $data['parent_id']              = $request->parent_id;
            $data['date_of_birth']          = $request->date_of_birth;
            $data['grade_id']               = $request->grade_id;
            $data['chapter_id']             = $request->chapter_id;
            $data['section_id']             = $request->section_id;
            $data['joining_at']             = $request->joining_at;
            $data['academic_year']          = $request->academic_year;

            $student->update($data);
            toastr()->success(trans('messages.update'));
            return redirect('student');

        }catch (\Exception $e){
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function deleteStudent($request)
    {
        $id = $request->id;
        Student::find($id)->delete();
        toastr()->error(trans('messages.delete'));
        return back();
    }

    public function getAllChapters($id)
    {
        $all_chapters = Chapter::where('grade_id',$id)->pluck('chapter_name','id');
        return $all_chapters;
    }

    public function getAllSections($id)
    {
        $all_sections = Section::where('chapter_id',$id)->pluck('section_name','id');
        return $all_sections;
    }

}
