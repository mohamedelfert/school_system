<?php

namespace App\Repositories;

use App\Models\Chapter;
use App\Models\Exam;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Teacher;

class ExamsRepository implements ExamsRepositoryInterface{

    public function index()
    {
        $title      = 'مدرستي - الامتحانات';
        $all_exams  = Exam::all();
        return view('exams.show_all',compact('title','all_exams'));
    }

    public function create()
    {
        $title         = 'مدرستي - اضافه امتحان';
        $all_subjects  = Subject::all();
        $all_grades    = Grade::all();
        $all_teachers  = Teacher::all();
        return view('exams.add',compact('title','all_subjects','all_grades','all_teachers'));
    }

    public function store($request)
    {
        try {

            $data['name']         = ['ar' => $request->name , 'en' => $request->name_en];
            $data['subject_id']   = $request->subject_id;
            $data['grade_id']     = $request->grade_id;
            $data['chapter_id']   = $request->chapter_id;
            $data['section_id']   = $request->section_id;
            $data['teacher_id']   = $request->teacher_id;
            $data['date_start']   = $request->date_start;
            $data['date_end']     = $request->date_end;
            $data['score']        = $request->score;
            Exam::create($data);
            toastr()->success(trans('messages.success'));
            return redirect('exams');

        }catch (\Exception $e){
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $title         = 'مدرستي - تعديل امتحان';
        $exam          = Exam::findOrFail($id);
        $all_subjects  = Subject::all();
        $all_grades    = Grade::all();
        $all_teachers  = Teacher::all();
        return view('exams.edit',compact('title','exam','all_subjects','all_grades','all_teachers'));
    }

    public function update($request)
    {
        try {

            $exam                 = Exam::findOrFail($request->id);
            $data['name']         = ['ar' => $request->name , 'en' => $request->name_en];
            $data['subject_id']   = $request->subject_id;
            $data['grade_id']     = $request->grade_id;
            $data['chapter_id']   = $request->chapter_id;
            $data['section_id']   = $request->section_id;
            $data['teacher_id']   = $request->teacher_id;
            $data['date_start']   = $request->date_start;
            $data['date_end']     = $request->date_end;
            $data['score']        = $request->score;
            $exam->update($data);
            toastr()->success(trans('messages.update'));
            return redirect('exams');

        }catch (\Exception $e){
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function delete($request)
    {
        Exam::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.delete'));
        return back();
    }
}
