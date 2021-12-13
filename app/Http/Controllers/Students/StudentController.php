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
        return $this->students->getAllStudents();
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
        return $this->students->showStudent($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->students->editStudent($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $rules = [
            'student_name'      => 'required',
            'student_name_en'   => 'required',
            'student_email'     => 'required|email|unique:students,student_email,'.$id,
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

        return $this->students->updateStudent($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->students->deleteStudent($request);
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

    /**
     * This Function to add new attachments
     */
    public function upload_attach(Request $request){
        $rules = ['photos.*' => 'required|mimes:jpg,jpeg,png,gif'];
        $validate_msg_ar = [
            'photos.required' => 'يجب ارفاق صوره اولا',
            'photos.mimes'    => 'يجب ان تكون الصوره باحد الصيغ : GIF , JPG , JPEG , PNG'
        ];
        $data = $this->validate($request,$rules,$validate_msg_ar);

        return $this->students->uploadAttachments($request);
    }

    /**
     * This Function to Show Photo
     */
    public function showPhoto($student_name,$file_name){
        return $this->students->showPhoto($student_name,$file_name);
    }

    /**
     * This Function to download Photo
     */
    public function downloadPhoto($student_name,$file_name){
        return $this->students->download($student_name,$file_name);
    }

    /**
     * This Function to delete Photo
     */
    public function deletePhoto(Request $request){
        return $this->students->deletePhoto($request);
    }
}
