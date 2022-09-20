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

    public function index()
    {
        return $this->exams->index();
    }

    public function create()
    {
        return $this->exams->create();
    }

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

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return $this->exams->edit($id);
    }

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

    public function destroy(Request $request)
    {
        return $this->exams->delete($request);
    }
}
