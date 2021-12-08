<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Repositories\StudentRepositoryInterface;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    private $students;
    public function __construct(StudentRepositoryInterface $students)
    {
        $this->students = $students;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->students->createStudent();
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
            'student_name'      => 'required',
            'student_name_en'   => 'required',
            'student_email'     => 'required|email|unique:students,student_email',
            'password'          => 'required',
            'gender_id'         => 'required',
            'nationality_id'    => 'required',
            'blood_id'          => 'required',
            'parent_id'         => 'required',
            'date_of_birth'     => 'required',
            'grade_id'          => 'required',
            'chapter_id'        => 'required',
            'section_id'        => 'required',
            'joining_at'        => 'required',
            'academic_year'     => 'required',
        ];
        $validate_msg_ar = [
            'student_name.required'         => 'يجب كتابه اسم الطالب بالعربيه',
            'student_name_en.required'      => 'يجب كتابه اسم الطالب بالانجليزيه',
            'student_email.required'        => 'يجب كتابه البريد الالكتروني',
            'student_email.email'           => 'يجب أن يكون البريد الالكتروني مثل ( a@yahoo.com )',
            'student_email.unique'          => 'البريد الالكتروني مسجل مسبقا',
            'password.required'             => 'يجب كتابه كلمه مرور',
            'gender_id.required'            => 'يجب اختيار النوع',
            'nationality_id.required'       => 'يجب اختيار الجنسيه',
            'blood_id.required'             => 'يجب اختيار فصيله الدم',
            'parent_id.required'            => 'يجب اختيار ولي الامر',
            'date_of_birth.required'        => 'يجب كتابه تاريخ الميلاد',
            'grade_id.required'             => 'يجب اختيار المرحله',
            'chapter_id.required'           => 'يجب اختيار الصف',
            'section_id.required'           => 'يجب اختيار الفصل',
            'joining_at.required'           => 'يجب كتابه تاريخ الالتحاق',
            'academic_year.required'        => 'يجب اختيار السنه الدراسيه',
        ];
        $data = $this->validate($request,$rules,$validate_msg_ar);

        return $this->students->storeStudent($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * This Function to return Chapter name based on grade_id
     */
    public function getChapters($id){
        return $this->students->getAllChapters($id);
    }

    /**
     * This Function to return Section name based on grade_id
     */
    public function getSections($id){
        return $this->students->getAllSections($id);
    }
}
