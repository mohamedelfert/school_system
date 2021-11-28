<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Repositories\TeacherRepositoryInterface;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    private $teachers;

    public function __construct(TeacherRepositoryInterface $teachers)
    {
        $this->teachers = $teachers;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'مدرستي - المعلمين';
        $all_teachers = $this->teachers->getAllTeachers();
        $all_specializations = $this->teachers->getAllSpecializations();
        $all_genders = $this->teachers->getAllGenders();
        return view('teachers.teacher',compact('title','all_teachers','all_specializations','all_genders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'teacher_name'      => 'required',
            'teacher_name_en'   => 'required',
            'teacher_email'     => 'required|email|unique:teachers,teacher_email',
            'password'          => 'required',
            'joining_at'        => 'required',
            'specialization_id' => 'required',
            'gender_id'         => 'required',
            'teacher_address'   => 'required'
        ];
        $validate_msg_ar = [
            'teacher_name.required'         => 'يجب كتابه اسم المعلم بالعربيه',
            'teacher_name_en.required'      => 'يجب كتابه اسم المعلم بالانجليزيه',
            'teacher_email.required'        => 'يجب كتابه البريد الالكتروني',
            'teacher_email.email'           => 'يجب أن يكون البريد الالكتروني مثل ( a@yahoo.com )',
            'teacher_email.unique'          => 'البريد الالكتروني مسجل مسبقا',
            'password.required'             => 'يجب كتابه كلمه مرور',
            'joining_at.required'           => 'يجب اختيار تاريخ الالتحاق',
            'specialization_id.required'    => 'يجب اختيار التخصص',
            'gender_id.required'            => 'يجب اختيار النوع',
            'teacher_address.required'      => 'يجب كتابه العنوان',
        ];
        $data = $this->validate($request,$rules,$validate_msg_ar);

        return $this->teachers->storeTeacher($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $rules = [
            'teacher_name'      => 'required',
            'teacher_name_en'   => 'required',
            'teacher_email'     => 'required|email|unique:teachers,teacher_email,'.$id,
            'joining_at'        => 'required',
            'specialization_id' => 'required',
            'gender_id'         => 'required',
            'teacher_address'   => 'required'
        ];
        $validate_msg_ar = [
            'teacher_name.required'         => 'يجب كتابه اسم المعلم بالعربيه',
            'teacher_name_en.required'      => 'يجب كتابه اسم المعلم بالانجليزيه',
            'teacher_email.required'        => 'يجب كتابه البريد الالكتروني',
            'teacher_email.email'           => 'يجب أن يكون البريد الالكتروني مثل ( a@yahoo.com )',
            'teacher_email.unique'          => 'البريد الالكتروني مسجل مسبقا',
            'joining_at.required'           => 'يجب اختيار تاريخ الالتحاق',
            'specialization_id.required'    => 'يجب اختيار التخصص',
            'gender_id.required'            => 'يجب اختيار النوع',
            'teacher_address.required'      => 'يجب كتابه العنوان',
        ];
        $data = $this->validate($request,$rules,$validate_msg_ar);

        return $this->teachers->updateTeacher($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->teachers->deleteTeacher($request);
    }
}
