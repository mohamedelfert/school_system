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
    public function index()
    {
        $title = 'مدرستي - ترقيه الطلاب';
        $grades = Grade::all();
        return view('students.promotions.add_promotion', compact('title', 'grades'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $students = Student::where('grade_id', $request->grade_id)
            ->where('chapter_id', $request->chapter_id)
            ->where('section_id', $request->section_id)
            ->where('academic_year', $request->academic_year)->get();
        if ($students->count() < 1) {
            return redirect()->back()->withErrors(['errors' => 'خطأ , لا يوجد بيانات طلاب بهذه المرحله او الصف !']);
        }

        foreach ($students as $student) {
            $ids = explode(',', $student->id);
            Student::whereIn('id', $ids)->update(
                [
                    'grade_id' => $request->grade_id_new,
                    'chapter_id' => $request->chapter_id_new,
                    'section_id' => $request->section_id_new,
                    'academic_year' => $request->academic_year_new,
                ]
            );

            Promotion::updateOrCreate(
                [
                    'student_id' => $student->id,
                    'from_grade_id' => $request->grade_id,
                    'from_chapter_id' => $request->chapter_id,
                    'from_section_id' => $request->section_id,
                    'to_grade_id' => $request->grade_id_new,
                    'to_chapter_id' => $request->chapter_id_new,
                    'to_section_id' => $request->section_id_new,
                    'academic_year' => $request->academic_year,
                    'academic_year_new' => $request->academic_year_new,
                ]
            );
        }

        toastr()->success(trans('messages.success'));
        return back();
    }

    public function show()
    {
        $title = 'مدرستي - اداره ترقيه الطلاب';
        $promotions = Promotion::all();
        return view('students.promotions.promotion_management', compact('title', 'promotions'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Request $request)
    {
        if ($request->page_id == 1) {
            $promotions = Promotion::all();
            foreach ($promotions as $promotion) {
                $ids = explode(',', $promotion->student_id);

                Student::whereIn('id', $ids)->update(
                    [
                        'grade_id' => $promotion->from_grade_id,
                        'chapter_id' => $promotion->from_chapter_id,
                        'section_id' => $promotion->from_section_id,
                        'academic_year' => $promotion->academic_year,
                    ]
                );

                Promotion::truncate();
            }

            toastr()->error(trans('messages.delete'));
            return back();
        } else {
            $promotion = Promotion::findOrFail($request->id);
            Student::where('id', $promotion->student_id)->update(
                [
                    'grade_id' => $promotion->from_grade_id,
                    'chapter_id' => $promotion->from_chapter_id,
                    'section_id' => $promotion->from_section_id,
                    'academic_year' => $promotion->academic_year,
                ]
            );

            $promotion->delete();

            toastr()->error(trans('messages.delete'));
            return back();
        }
    }
}
