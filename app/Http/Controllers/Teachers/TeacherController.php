<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Teacher;
use App\Repositories\TeacherRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    private $teachers;

    public function __construct(TeacherRepositoryInterface $teachers)
    {
        $this->teachers = $teachers;
    }

    public function teacherDashboard()
    {
//        $sectionIds = Teacher::findOrFail(auth::user()->id)->sections()->pluck('section_id');
//        $sectionsCount = $sectionIds->count();
//        $studentsCount = Student::whereIn('section_id', $sectionIds)->count();

        $sectionIds = DB::table('teachers_sections')->where('teacher_id', auth()->user()->id)
            ->pluck('section_id');
        $sectionsCount = $sectionIds->count();
        $studentsCount = DB::table('students')->whereIn('section_id', $sectionIds)->count();
        return view('teachers.dashboard', compact('sectionsCount', 'studentsCount'));
    }

    public function index()
    {
        $title = 'مدرستي - المعلمين';
        $all_teachers = $this->teachers->getAllTeachers();
        $all_specializations = $this->teachers->getAllSpecializations();
        $all_genders = $this->teachers->getAllGenders();
        return view('teachers.teacher', compact('title', 'all_teachers', 'all_specializations', 'all_genders'));
    }

    public function store(Request $request)
    {
        $rules = [
            'teacher_name' => 'required',
            'teacher_name_en' => 'required',
            'email' => 'required|email|unique:teachers,email',
            'password' => 'required',
            'joining_at' => 'required',
            'specialization_id' => 'required',
            'gender_id' => 'required',
            'teacher_address' => 'required'
        ];
        $validate_msg_ar = [
            'teacher_name.required' => 'يجب كتابه اسم المعلم بالعربيه',
            'teacher_name_en.required' => 'يجب كتابه اسم المعلم بالانجليزيه',
            'email.required' => 'يجب كتابه البريد الالكتروني',
            'email.email' => 'يجب أن يكون البريد الالكتروني مثل ( a@yahoo.com )',
            'email.unique' => 'البريد الالكتروني مسجل مسبقا',
            'password.required' => 'يجب كتابه كلمه مرور',
            'joining_at.required' => 'يجب اختيار تاريخ الالتحاق',
            'specialization_id.required' => 'يجب اختيار التخصص',
            'gender_id.required' => 'يجب اختيار النوع',
            'teacher_address.required' => 'يجب كتابه العنوان',
        ];
        $data = $this->validate($request, $rules, $validate_msg_ar);

        return $this->teachers->storeTeacher($request);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $rules = [
            'teacher_name' => 'required',
            'teacher_name_en' => 'required',
            'email' => 'required|email|unique:teachers,email,' . $id,
            'joining_at' => 'required',
            'specialization_id' => 'required',
            'gender_id' => 'required',
            'teacher_address' => 'required'
        ];
        $validate_msg_ar = [
            'teacher_name.required' => 'يجب كتابه اسم المعلم بالعربيه',
            'teacher_name_en.required' => 'يجب كتابه اسم المعلم بالانجليزيه',
            'email.required' => 'يجب كتابه البريد الالكتروني',
            'email.email' => 'يجب أن يكون البريد الالكتروني مثل ( a@yahoo.com )',
            'email.unique' => 'البريد الالكتروني مسجل مسبقا',
            'joining_at.required' => 'يجب اختيار تاريخ الالتحاق',
            'specialization_id.required' => 'يجب اختيار التخصص',
            'gender_id.required' => 'يجب اختيار النوع',
            'teacher_address.required' => 'يجب كتابه العنوان',
        ];
        $data = $this->validate($request, $rules, $validate_msg_ar);

        return $this->teachers->updateTeacher($request);
    }

    public function destroy(Request $request)
    {
        return $this->teachers->deleteTeacher($request);
    }
}
