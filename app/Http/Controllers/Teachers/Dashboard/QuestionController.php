<?php

namespace App\Http\Controllers\Teachers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Question;
use Exception;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'title_en' => 'required',
            'answers' => 'required',
            'right_answer' => 'required',
            'score' => 'required',
            'exam_id' => 'required',
        ];
        $validate_msg_ar = [
            'title.required' => 'يجب كتابه السؤال بالعربيه',
            'title_en.required' => 'يجب كتابه السؤال الانجليزيه',
            'answers.required' => 'يجب كتابه الاجابات',
            'right_answer.required' => 'يجب كتابه الاجابه الصحيحه',
            'score.required' => 'يجب اختيار درجه السؤال',
            'exam_id.required' => 'يجب اختيار الامتحان',
        ];
        $validate = $this->validate($request, $rules, $validate_msg_ar);

        try {

            $data['title'] = ['ar' => $request->title, 'en' => $request->title_en];
            $data['answers'] = $request->answers;
            $data['right_answer'] = $request->right_answer;
            $data['score'] = $request->score;
            $data['exam_id'] = $request->exam_id;
            Question::create($data);
            toastr()->success(trans('messages.success'));
            return redirect(route('tests.show', $request->exam_id));

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        $title = 'مدرستي - اضافه سؤال';
        $exam = Exam::findOrFail($id);
        return view('teachers.dashboard.questions.add', compact('title', 'exam'));
    }

    public function edit($id)
    {
        $title = 'مدرستي - تعديل سؤال';
        $question = Question::findOrFail($id);
        return view('teachers.dashboard.questions.edit', compact('title', 'question'));
    }

    public function update(Request $request)
    {
        $rules = [
            'title' => 'required',
            'title_en' => 'required',
            'answers' => 'required',
            'right_answer' => 'required',
            'score' => 'required',
        ];
        $validate_msg_ar = [
            'title.required' => 'يجب كتابه السؤال بالعربيه',
            'title_en.required' => 'يجب كتابه السؤال الانجليزيه',
            'answers.required' => 'يجب كتابه الاجابات',
            'right_answer.required' => 'يجب كتابه الاجابه الصحيحه',
            'score.required' => 'يجب اختيار درجه السؤال',
        ];
        $validate = $this->validate($request, $rules, $validate_msg_ar);

        try {

            $data['title'] = ['ar' => $request->title, 'en' => $request->title_en];
            $data['answers'] = $request->answers;
            $data['right_answer'] = $request->right_answer;
            $data['score'] = $request->score;
            $question = Question::findOrFail($request->id);
            $question->update($data);
            toastr()->success(trans('messages.update'));
            return redirect(route('tests.show', $question->exam_id));

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        Question::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.delete'));
        return back();
    }
}
