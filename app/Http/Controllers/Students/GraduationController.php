<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Grade;
use App\Models\Promotion;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;

class GraduationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title    = 'مدرستي - تخرج الطلاب';
        $grades   = Grade::all();
        $chapters = Chapter::all();
        $sections = Section::all();
        return view('students.graduations.add_graduation',compact('title','grades','chapters','sections'));
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
        /**
         * in this method make soft delete for students
         */
        $students = Student::where('grade_id',$request->grade_id)
                            ->where('chapter_id',$request->chapter_id)
                            ->where('section_id',$request->section_id)
                            ->where('academic_year',$request->academic_year)->get();
        if ($students->count() < 1){
            return redirect()->back()->withErrors(['errors' => 'خطأ , لا يوجد بيانات طلاب بهذه المرحله او الصف !']);
        }

        foreach ($students as $student){
            $ids = explode(',',$student->id);
            Student::whereIn('id',$ids)->delete();
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
    public function show()
    {
        $title        = 'مدرستي - اداره تخرج الطلاب';
        $graduation   = Student::onlyTrashed()->get();
        return view('students.graduations.graduation_management',compact('title','graduation'));
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
    public function update(Request $request)
    {
        /**
         * in this method make soft delete for one student from promotion
         */
        $student = Student::where('grade_id',$request->grade_id)
                            ->where('chapter_id',$request->chapter_id)
                            ->where('section_id',$request->section_id)
                            ->where('academic_year',$request->academic_year)->get();
        if ($student->count() < 1){
            return redirect()->back()->withErrors(['errors' => 'خطأ , لا يوجد بيانات طلاب بهذه المرحله او الصف !']);
        }

        $id = $request->student_id;
        Student::findOrFail($id)->delete(); // soft delete in students table
        Promotion::findOrFail($request->id)->delete(); // delete from promotions table
        toastr()->success(trans('messages.update'));
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->page == 'restore_all'){

            $students = Student::onlyTrashed()->get();
            foreach ($students as $student) {
                $ids = explode(',', $student->id);

                Student::whereIn('id', $ids)->restore();
            }
            toastr()->success(trans('messages.success'));
            return back();

        }elseif ($request->page == 'restore_one'){

            Student::onlyTrashed()->where('id', $request->id)->restore();
            toastr()->success(trans('messages.success'));
            return back();

        }elseif ($request->page == 'force_delete'){

            Student::onlyTrashed()->where('id', $request->id)->forceDelete();
            toastr()->error(trans('messages.delete'));
            return back();

        }
    }
}
