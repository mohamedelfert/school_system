<?php

namespace App\Repositories;

use App\Models\Exam;
use App\Models\Question;

class QuestionsRepository implements QuestionsRepositoryInterface
{

    public function index()
    {
        $title          = 'مدرستي - قائمه الاسئله';
        $all_questions  = Question::all();
        return view('questions.show_all',compact('title','all_questions'));
    }

    public function create()
    {
        $title         = 'مدرستي - اضافه سؤال';
        $all_exams     = Exam::all();
        return view('questions.add',compact('title','all_exams'));
    }

    public function store($request)
    {
        try {

            $data['title']         = ['ar' => $request->title , 'en' => $request->title_en];
            $data['answers']       = $request->answers;
            $data['right_answer']  = $request->right_answer;
            $data['score']        = $request->score;
            $data['exam_id']       = $request->exam_id;
            Question::create($data);
            toastr()->success(trans('messages.success'));
            return redirect('questions');

        }catch (\Exception $e){
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $title         = 'مدرستي - تعديل سؤال';
        $question      = Question::findOrFail($id);
        $all_exams     = Exam::all();
        return view('questions.edit',compact('title','question','all_exams'));
    }

    public function update($request)
    {
        try {

            $question              = Question::findOrFail($request->id);
            $data['title']         = ['ar' => $request->title , 'en' => $request->title_en];
            $data['answers']       = $request->answers;
            $data['right_answer']  = $request->right_answer;
            $data['score']        = $request->score;
            $data['exam_id']       = $request->exam_id;
            $question->update($data);
            toastr()->success(trans('messages.update'));
            return redirect('questions');

        }catch (\Exception $e){
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function delete($request)
    {
        Question::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.delete'));
        return back();
    }
}
