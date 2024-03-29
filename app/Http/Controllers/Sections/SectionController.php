<?php

namespace App\Http\Controllers\Sections;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Grade;
use App\Models\section;
use App\Models\Teacher;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SectionController extends Controller
{
    public function index()
    {
        $title = 'مدرستي - الفصول الدراسيه';
        $grades_by_sections = Grade::with(['getSections'])->get();
        $all_grades = Grade::all();
        $all_teachers = Teacher::all();
        return view('sections.section', compact('title', 'grades_by_sections', 'all_grades', 'all_teachers'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $rules = [
            'section_name' => 'required|min:1',
            'section_name_en' => 'required|min:1'
        ];
        $validate_msg_ar = [
            'section_name.required' => 'يجب كتابه اسم الفصل باللغه العربيه',
            'section_name.min' => 'اسم الفصل بالعربيه يجب ان يكون اكثر من 5 احرف',
            'section_name_en.required' => 'يجب كتابه اسم الفصل باللغه الانجليزيه',
            'section_name_en.min' => 'اسم الفصل بالانجليزيه يجب ان يكون اكثر من 5 احرف'
        ];
        $validate = $this->validate($request, $rules, $validate_msg_ar);

        try {

            $section = new Section();
            $section->section_name = ['ar' => $request->section_name, 'en' => $request->section_name_en];
            $section->status = $request->status;
            $section->grade_id = $request->grade_id;
            $section->chapter_id = $request->chapter_id;
            $section->save();

            // to add teacher_id and section_id in teachers_sections table
            $section->teachers()->attach($request->teacher_id);

            toastr()->success(trans('messages.success'));
            return back();

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function show(section $section)
    {
        //
    }

    public function edit(section $section)
    {
        //
    }

    public function update(Request $request)
    {
        $id = $request->id;

        $rules = [
            'section_name' => 'required|min:1',
            'section_name_en' => 'required|min:1'
        ];
        $validate_msg_ar = [
            'section_name.required' => 'يجب كتابه اسم الفصل باللغه العربيه',
            'section_name.min' => 'اسم الفصل بالعربيه يجب ان يكون اكثر من 5 احرف',
            'section_name_en.required' => 'يجب كتابه اسم الفصل باللغه الانجليزيه',
            'section_name_en.min' => 'اسم الفصل بالانجليزيه يجب ان يكون اكثر من 5 احرف'
        ];
        $data = $this->validate($request, $rules, $validate_msg_ar);

        try {

            $sections = Section::find($id);
            $data['section_name'] = ['ar' => $request->section_name, 'en' => $request->section_name_en];
            $data['status'] = $request->status;
            $data['grade_id'] = $request->grade_id;
            $data['chapter_id'] = $request->chapter_id;

            // to update teacher_id and section_id in teachers_sections table
            if (isset($request->teacher_id)) {
                $sections->teachers()->sync($request->teacher_id);
            }

            $sections->update($data);

            toastr()->success(trans('messages.update'));
            return back();

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        Section::find($id)->delete();
        toastr()->success(trans('messages.delete'));
        return back();
    }

    /**
     * This Function To Get Chapters Name And ID By grade_id.
     * using $id From Route /section/{id} With Ajax.
     */
    public function getChapters($id)
    {
        return Chapter::where('grade_id', $id)->pluck('chapter_name', 'id');
    }
}
