<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Grade;
use App\Models\Promotion;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'مدرستي - ترقيه الطلاب';
        $grades   = Grade::all();
        $chapters = Chapter::all();
        $sections = Section::all();
        return view('students.promotions.promotion',compact('title','grades','chapters','sections'));
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
        $students = Student::where('grade_id',$request->grade_id)->where('chapter_id',$request->chapter_id)
                            ->where('section_id',$request->section_id)->get();
        if ($students->count() < 1){
            return redirect()->back()->withErrors(['errors' => 'خطأ , لا يوجد بيانات طلاب بهذه المرحله او الصف !']);
        }

        foreach ($students as $student){
            $ids = explode(',',$student->id);
            Student::whereIn('id',$ids)->update(
                [
                    'grade_id'   => $request->grade_id_new,
                    'chapter_id' => $request->chapter_id_new,
                    'section_id' => $request->section_id_new,
                ]
            );

            Promotion::updateOrCreate(
                [
                    'student_id'        => $student->id,
                    'from_grade_id'     => $request->grade_id,
                    'from_chapter_id'   => $request->chapter_id,
                    'from_section_id'   => $request->section_id,
                    'to_grade_id'       => $request->grade_id_new,
                    'to_chapter_id'     => $request->chapter_id_new,
                    'to_section_id'     => $request->section_id_new,
                ]
            );
        }

        toastr()->success(trans('messages.success'));
        return back();
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
}
