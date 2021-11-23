<?php

namespace App\Http\Controllers\Sections;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Grade;
use App\Models\section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'مدرستي - الفصول الدراسيه';
        $grades_by_sections = Grade::with(['getSections'])->get();
        $all_grades = Grade::all();
        return view('sections.sections',compact('title','grades_by_sections','all_grades'));
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
            'section_name'    => 'required|min:5',
            'section_name_en' => 'required|min:5'
        ];
        $validate_msg_ar = [
            'section_name.required'    => 'يجب كتابه اسم الفصل باللغه العربيه',
            'section_name.min'         => 'اسم الفصل بالعربيه يجب ان يكون اكثر من 5 احرف',
            'section_name_en.required' => 'يجب كتابه اسم الفصل باللغه الانجليزيه',
            'section_name_en.min'      => 'اسم الفصل بالانجليزيه يجب ان يكون اكثر من 5 احرف'
        ];
        $validate = $this->validate($request,$rules,$validate_msg_ar);

        try {

            $section = new Section();
            $section->section_name  = ['ar' => $request->section_name,'en' => $request->section_name_en];
            $section->status = $request->status;
            $section->grade_id = $request->grade_id;
            $section->chapter_id = 16;
            $section->save();

            toastr()->success(trans('messages.success'));
            return back();

        }catch (\Exception $e){
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, section $section)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(section $section)
    {
        //
    }

    /**
     * This Function To Get Chapters Name And ID By grade_id.
     * using $id From Route /section/{id} With Ajax.
     * @return \Illuminate\Http\Response
     */
    public function getChaptersName($id){
        $chaptersName = Chapter::where('grade_id',$id)->pluck('chapter_name','id');
        return $chaptersName;
    }
}
