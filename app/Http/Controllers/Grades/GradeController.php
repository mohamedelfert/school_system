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
        $title = trans('grades_trans.grades_title');
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
//        if (Grade::where('name->ar',$request->name)->orWhere('name->en',$request->name_en)->exists()){
//            return redirect()->back()->withErrors(['errors' => 'هذا الحقل مسجل مسبقا']);
//        }

        try {

            $rules = [
                'name'    => 'required|min:5',
                'name_en' => 'required|min:5'
            ];
            $validate_msg_ar = [
                'name.required'    => 'يجب كتابه اسم المرحله باللغه العربيه',
                'name.min'         => 'اسم المرحله بالعربيه يجب ان يكون اكثر من 5 احرف',
                'name_en.required' => 'يجب كتابه اسم المرحله باللغه الانجليزيه',
                'name_en.min'      => 'اسم المرحله بالانجليزيه يجب ان يكون اكثر من 5 احرف'
            ];
            $validate = $this->validate($request,$rules,$validate_msg_ar);

            $garde = new Grade();
            $garde->name  = ['ar' => $request->name,'en' => $request->name_en,];
            $garde->notes = $request->notes;
            $garde->save();

            toastr()->success(trans('messages.success'));
            return back();

        }catch (\Exception $e){
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
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
    public function update(Request $request)
    {
        $id = $request->id;
        try {

            $rules = [
                'name'    => 'required|min:5',
                'name_en' => 'required|min:5'
            ];
            $validate_msg_ar = [
                'name.required'    => 'يجب كتابه اسم المرحله باللغه العربيه',
                'name.min'         => 'اسم المرحله بالعربيه يجب ان يكون اكثر من 5 احرف',
                'name_en.required' => 'يجب كتابه اسم المرحله باللغه الانجليزيه',
                'name_en.min'      => 'اسم المرحله بالانجليزيه يجب ان يكون اكثر من 5 احرف'
            ];
            $data = $this->validate($request,$rules,$validate_msg_ar);

            $garde = Grade::find($id);
            $data['name']  = ['en' => $request->name_en, 'ar' => $request->name];
            $data['notes'] = $request->notes;
            $garde->update($data);

            toastr()->success(trans('messages.update'));
            return back();

        }catch (\Exception $e){
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Grade::find($id)->delete();
        toastr()->error(trans('messages.delete'));
        return back();
    }
}
