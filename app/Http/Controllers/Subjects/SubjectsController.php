<?php

namespace App\Http\Controllers\Subjects;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title    = 'مدرستي - المواد الدراسيه';
        $subjects = Subject::all();
        return view('subjects.show_all',compact('title','subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title        = 'مدرستي - اضافه ماده جديده';
        $all_grades   = Grade::all();
        $all_chapters = Chapter::all();
        $all_teachers = Teacher::all();
        return view('subjects.add',compact('title','all_grades','all_chapters','all_teachers'));
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
            'subject_name'      => 'required',
            'subject_name_en'   => 'required',
            'grade_id'          => 'required',
            'chapter_id'        => 'required',
            'teacher_id'        => 'required',
        ];
        $validate_msg_ar = [
            'subject_name.required'     => 'يجب كتابه اسم الماده بالعربيه',
            'subject_name_en.required'  => 'يجب كتابه اسم الماده باللغه الانجليزيه',
            'grade_id.required'         => 'يجب اختيار المرحله الدراسيه',
            'chapter_id.required'       => 'يجب اختيار الصف الدراسي',
            'teacher_id.required'       => 'يجب اختيار معلم الماده',
        ];
        $data = $this->validate($request,$rules,$validate_msg_ar);

        $subject = new Subject();
        $subject->subject_name  = ['ar' => $request->subject_name , 'en' => $request->subject_name_en];
        $subject->grade_id      = $request->grade_id;
        $subject->chapter_id    = $request->chapter_id;
        $subject->teacher_id    = $request->teacher_id;
        $subject->save();

        toastr()->success(trans('messages.success'));
        return redirect('subjects');
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
        $title        = 'مدرستي - تعديل ماده دراسيه';
        $subject      = Subject::findOrFail($id);
        $all_grades   = Grade::all();
        $all_chapters = Chapter::all();
        $all_teachers = Teacher::all();
        return view('subjects.edit',compact('title','subject','all_grades','all_chapters','all_teachers'));
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
            'subject_name'      => 'required',
            'subject_name_en'   => 'required',
            'grade_id'          => 'required',
            'chapter_id'        => 'required',
            'teacher_id'        => 'required',
        ];
        $validate_msg_ar = [
            'subject_name.required'     => 'يجب كتابه اسم الماده بالعربيه',
            'subject_name_en.required'  => 'يجب كتابه اسم الماده باللغه الانجليزيه',
            'grade_id.required'         => 'يجب اختيار المرحله الدراسيه',
            'chapter_id.required'       => 'يجب اختيار الصف الدراسي',
            'teacher_id.required'       => 'يجب اختيار معلم الماده',
        ];
        $data = $this->validate($request,$rules,$validate_msg_ar);

        $subject                = Subject::findOrFail($id);
        $subject->subject_name  = ['ar' => $request->subject_name , 'en' => $request->subject_name_en];
        $subject->grade_id      = $request->grade_id;
        $subject->chapter_id    = $request->chapter_id;
        $subject->teacher_id    = $request->teacher_id;
        $subject->update();

        toastr()->success(trans('messages.update'));
        return redirect('subjects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Subject::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.delete'));
        return back();
    }
}
