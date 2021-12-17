<?php

namespace App\Repositories;

use App\Models\Chapter;
use App\Models\Grade;
use App\Models\StudyFees;
use Illuminate\Support\Facades\DB;

class StudyFeesRepository implements StudyFeesRepositoryInterface{

    public function getAllFees()
    {
        $title    = 'مدرستي - الحسابات';
        $all_fees = StudyFees::all();
        return view('fees.show_fees',compact('title','all_fees'));
    }

    public function createFees()
    {
        $title        = 'مدرستي - اضافه رسوم دراسيه';
        $all_grades   = Grade::all();
        $all_chapters = Chapter::all();
        return view('fees.add_fees',compact('title','all_grades','all_chapters'));
    }

    public function storeFees($request)
    {
        DB::beginTransaction();
        try {

            $data['name']             = ['ar' => $request->name,'en' => $request->name_en];
            $data['amount']           = $request->amount;
            $data['grade_id']         = $request->grade_id;
            $data['chapter_id']       = $request->chapter_id;
            $data['year']             = $request->year;
            $data['notes']            = $request->notes;

            StudyFees::create($data);

            DB::commit();

            toastr()->success(trans('messages.success'));
            return back();

        }catch (\Exception $e){
            DB::rollBack();
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function showStudentsFees($id)
    {
        $title        = 'مدرستي - الرسوم الدراسيه للطلاب';
        $fee          = StudyFees::findOrFail($id);
        $all_grades   = Grade::all();
        $all_chapters = Chapter::all();
        return view('fees.show_students_fees',compact('title','fee','all_grades','all_chapters'));
    }

    public function editFees($id)
    {
        $title        = 'مدرستي - تعديل رسوم دراسيه';
        $fee          = StudyFees::findOrFail($id);
        $all_grades   = Grade::all();
        $all_chapters = Chapter::all();
        return view('fees.edit_fees',compact('title','fee','all_grades','all_chapters'));
    }

    public function updateFees($request)
    {
        DB::beginTransaction();
        try {

            $id                       = $request->id;
            $fee                      = StudyFees::findOrFail($id);
            $data['name']             = ['ar' => $request->name,'en' => $request->name_en];
            $data['amount']           = $request->amount;
            $data['grade_id']         = $request->grade_id;
            $data['chapter_id']       = $request->chapter_id;
            $data['year']             = $request->year;
            $data['notes']            = $request->notes;

            $fee->update($data);

            DB::commit();

            toastr()->success(trans('messages.update'));
            return redirect('fees');

        }catch (\Exception $e){
            DB::rollBack();
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function deleteFees($request)
    {
        $id = $request->id;
        StudyFees::findOrFail($id)->delete();
        toastr()->error(trans('messages.delete'));
        return back();
    }
}
