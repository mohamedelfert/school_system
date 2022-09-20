<?php

namespace App\Http\Controllers\Teachers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Exam;
use App\Models\Grade;
use App\Models\Question;
use App\Models\Section;
use App\Models\Subject;
use Exception;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index()
    {
        $title = 'مدرستي - الامتحانات';
        $exams = Exam::where('teacher_id', auth()->user()->id)->get();
        return view('teachers.dashboard.exams.index', compact('title', 'exams'));
    }

    public function create()
    {
        $title = 'مدرستي - اضافه امتحان';
        $subjects = Subject::where('teacher_id', auth()->user()->id)->get();
        $grades = Grade::all();
//        $chapters = Chapter::all();
//        $sections = Section::all();
        return view('teachers.dashboard.exams.add', compact('title', 'subjects', 'grades'));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'name_en' => 'required',
            'subject_id' => 'required',
            'grade_id' => 'required',
            'chapter_id' => 'required',
            'section_id' => 'required',
            'score' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
        ];
        $validate_msg_ar = [
            'name.required' => 'يجب كتابه اسم الامتحان بالعربية',
            'name_en.required' => 'يجب كتابه اسم الامتحان الانجليزية',
            'subject_id.required' => 'يجب اختيار المادة',
            'grade_id.required' => 'يجب اختيار المرحلة الدراسية',
            'chapter_id.required' => 'يجب اختيار الصف الدراسي',
            'section_id.required' => 'يجب اختيار الفصل',
            'score.required' => 'يجب اختيار درجه للامتحان',
            'date_start.required' => 'يجب اختيار تاريخ وضع الامتحان',
            'date_end.required' => 'يجب اختيار تاريخ نهاية الامتحان',
        ];
        $validate = $this->validate($request, $rules, $validate_msg_ar);

        try {

            $data['name'] = ['ar' => $request->name, 'en' => $request->name_en];
            $data['subject_id'] = $request->subject_id;
            $data['grade_id'] = $request->grade_id;
            $data['chapter_id'] = $request->chapter_id;
            $data['section_id'] = $request->section_id;
            $data['teacher_id'] = auth()->user()->id;
            $data['date_start'] = $request->date_start;
            $data['date_end'] = $request->date_end;
            $data['score'] = $request->score;
            Exam::create($data);
            toastr()->success(trans('messages.success'));
            return redirect('tests');

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        $title = 'مدرستي - قائمه الأسئلة';
        $questions = Question::where('exam_id',$id)->get();
        $exam = Exam::findOrFail($id);
        return view('teachers.dashboard.questions.index', compact('title', 'questions','exam'));
    }

    public function edit($id)
    {
        $title = 'مدرستي - تعديل امتحان';
        $exam = Exam::findOrFail($id);
        $subjects = Subject::where('teacher_id', auth()->user()->id)->get();
        $grades = Grade::all();
        $chapters = Chapter::all();
        $sections = Section::all();
        return view('teachers.dashboard.exams.edit', compact('title', 'exam', 'subjects', 'grades', 'chapters', 'sections'));
    }

    public function update(Request $request)
    {
        $rules = [
            'name' => 'required',
            'name_en' => 'required',
            'subject_id' => 'required',
            'grade_id' => 'required',
            'chapter_id' => 'required',
            'section_id' => 'required',
            'score' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
        ];
        $validate_msg_ar = [
            'name.required' => 'يجب كتابه اسم الامتحان بالعربية',
            'name_en.required' => 'يجب كتابه اسم الامتحان الانجليزية',
            'subject_id.required' => 'يجب اختيار المادة',
            'grade_id.required' => 'يجب اختيار المرحلة الدراسية',
            'chapter_id.required' => 'يجب اختيار الصف الدراسي',
            'section_id.required' => 'يجب اختيار الفصل',
            'score.required' => 'يجب اختيار درجه للامتحان',
            'date_start.required' => 'يجب اختيار تاريخ وضع الامتحان',
            'date_end.required' => 'يجب اختيار تاريخ نهاية الامتحان',
        ];
        $validate = $this->validate($request, $rules, $validate_msg_ar);

        try {

            $data['name'] = ['ar' => $request->name, 'en' => $request->name_en];
            $data['subject_id'] = $request->subject_id;
            $data['grade_id'] = $request->grade_id;
            $data['chapter_id'] = $request->chapter_id;
            $data['section_id'] = $request->section_id;
            $data['teacher_id'] = auth()->user()->id;
            $data['date_start'] = $request->date_start;
            $data['date_end'] = $request->date_end;
            $data['score'] = $request->score;
            $exam = Exam::findOrFail($request->id);
            $exam->update($data);
            toastr()->success(trans('messages.update'));
            return redirect('tests');

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        Exam::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.delete'));
        return back();
    }

    public function getChapters($id)
    {
        return Chapter::where('grade_id',$id)->pluck('chapter_name','id');
    }

    public function getSections($id)
    {
        return Section::where('chapter_id',$id)->pluck('section_name','id');
    }
}
