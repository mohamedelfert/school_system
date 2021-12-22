<?php

namespace App\Http\Controllers\Exams;

use App\Http\Controllers\Controller;
use App\Repositories\ExamsRepositoryInterface;
use Illuminate\Http\Request;

class ExamsController extends Controller
{
    private $exams;
    public function __construct(ExamsRepositoryInterface $exams){
        $this->exams = $exams;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->exams->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->exams->create();
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
            'name'        => 'required',
            'name_en'     => 'required',
            'subject_id'  => 'required',
            'grade_id'    => 'required',
            'chapter_id'  => 'required',
            'section_id'  => 'required',
            'teacher_id'  => 'required',
            'score'       => 'required',
            'date_start'  => 'required',
            'date_end'    => 'required',
        ];
        $validate_msg_ar = [
            'name.required'          => 'يجب كتابه اسم الامتحان بالعربيه',
            'name_en.required'       => 'يجب كتابه اسم الامتحان الانجليزيه',
            'subject_id.required'    => 'يجب اختيار الماده',
            'grade_id.required'      => 'يجب اختيار المرحله الدراسيه',
            'chapter_id.required'    => 'يجب اختيار الصف الدراسي',
            'section_id.required'    => 'يجب اختيار الفصل',
            'teacher_id.required'    => 'يجب اختيار معلم الماده',
            'score.required'         => 'يجب اختيار درجه للامتحان',
            'date_start.required'    => 'يجب اختيار تاريخ وضع الامتحان',
            'date_end.required'      => 'يجب اختيار تاريخ نهايه الامتحان',
        ];
        $data = $this->validate($request,$rules,$validate_msg_ar);

        return $this->exams->store($request);
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
        return $this->exams->edit($id);
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
        $rules = [
            'name'        => 'required',
            'name_en'     => 'required',
            'subject_id'  => 'required',
            'grade_id'    => 'required',
            'chapter_id'  => 'required',
            'section_id'  => 'required',
            'teacher_id'  => 'required',
            'score'       => 'required',
            'date_start'  => 'required',
            'date_end'    => 'required',
        ];
        $validate_msg_ar = [
            'name.required'          => 'يجب كتابه اسم الامتحان بالعربيه',
            'name_en.required'       => 'يجب كتابه اسم الامتحان الانجليزيه',
            'subject_id.required'    => 'يجب اختيار الماده',
            'grade_id.required'      => 'يجب اختيار المرحله الدراسيه',
            'chapter_id.required'    => 'يجب اختيار الصف الدراسي',
            'section_id.required'    => 'يجب اختيار الفصل',
            'teacher_id.required'    => 'يجب اختيار معلم الماده',
            'score.required'         => 'يجب اختيار درجه للامتحان',
            'date_start.required'    => 'يجب اختيار تاريخ وضع الامتحان',
            'date_end.required'      => 'يجب اختيار تاريخ نهايه الامتحان',
        ];
        $data = $this->validate($request,$rules,$validate_msg_ar);

        return $this->exams->update($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->exams->delete($request);
    }
}
