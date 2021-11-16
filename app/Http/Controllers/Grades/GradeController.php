<?php

namespace App\Http\Controllers\Grades;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'مدرستي - المراحل الدراسيه';
        $all_grades = Grade::all();
        return view('grades.grades',compact('title','all_grades'));
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
            'name_ar' => 'required|min:5|unique:Grades',
            'name_en' => 'required|min:5|unique:Grades',
            'notes'   => 'required'
        ];
        $validate_msg_ar = [
            'name_ar.required' => 'يجب كتابه اسم المرحله باللغه العربيه',
            'name_ar.unique'   => 'اسم المرحله بالعربيه مسجل مسبقا',
            'name_ar.min'      => 'اسم المرحله بالعربيه يجب ان يكون اكثر من 5 احرف',
            'name_en.required' => 'يجب كتابه اسم المرحله باللغه الانجليزيه',
            'name_en.unique'   => 'اسم المرحله بالانجليزيه مسجل مسبقا',
            'name_en.min'      => 'اسم المرحله بالانجليزيه يجب ان يكون اكثر من 5 احرف',
            'notes.required'   => 'يجب كتابه ملاحظات'
        ];
        $validate = $this->validate($request,$rules,$validate_msg_ar);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(Grade $grade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grade $grade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grade $grade)
    {
        //
    }
}
