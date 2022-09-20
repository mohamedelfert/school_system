<?php

namespace App\Http\Controllers\Libraries;

use App\Http\Controllers\Controller;
use App\Http\Traits\AttachFilesTrait;
use App\Models\Chapter;
use App\Models\Grade;
use App\Models\Library;
use App\Models\Section;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LibraryController extends Controller
{
    use AttachFilesTrait;

    public function index()
    {
        $title     = 'مدرستي - المكتبه';
        $all_books = Library::all();
        return view('libraries.show_all',compact('title','all_books'));
    }

    public function create()
    {
        $title        = 'مدرستي - اضافه كتاب جديد';
        $all_grades   = Grade::all();
        $all_teachers = Teacher::all();
        return view('libraries.add',compact('title','all_grades','all_teachers'));
    }

    public function store(Request $request)
    {
        $rules = [
            'title'       => 'required',
            'grade_id'    => 'required',
            'chapter_id'  => 'required',
            'section_id'  => 'required',
            'teacher_id'  => 'required',
            'file_name'   => 'required',
        ];
        $validate_msg_ar = [
            'title.required'            => 'يجب كتابه اسم الكتاب',
            'grade_id.required'         => 'يجب اختيار المرحله الدراسيه',
            'chapter_id.required'       => 'يجب اختيار الصف الدراسي',
            'section_id.required'       => 'يجب اختيار الفصل الدراسي',
            'teacher_id.required'       => 'يجب اختيار معلم الماده',
            'file_name.required'        => 'يجب اختيار كتاب للرفع',
        ];
        $data = $this->validate($request,$rules,$validate_msg_ar);

        try {

            $library                = new Library();
            $library->title         = $request->title;
            $library->file_name     = $request->file('file_name')->getClientOriginalName();
            $library->grade_id      = $request->grade_id;
            $library->chapter_id    = $request->chapter_id;
            $library->section_id    = $request->section_id;
            $library->teacher_id    = $request->teacher_id;
            $library->date          = date('Y-m-d H:i:s');
            $library->save();
            $this->uploadFile($request,'file_name','library');

            toastr()->success(trans('messages.success'));
            return redirect('library');

        }catch (\Exception $e){
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $title        = 'مدرستي - تعديل كتاب';
        $book         = Library::FindOrFail($id);
        $all_grades   = Grade::all();
        $all_teachers = Teacher::all();
        return view('libraries.edit',compact('title','book','all_grades','all_teachers'));
    }

    public function update(Request $request)
    {
        $rules = [
            'title'       => 'required',
            'grade_id'    => 'required',
            'chapter_id'  => 'required',
            'section_id'  => 'required',
            'teacher_id'  => 'required',
        ];
        $validate_msg_ar = [
            'title.required'            => 'يجب كتابه اسم الكتاب',
            'grade_id.required'         => 'يجب اختيار المرحله الدراسيه',
            'chapter_id.required'       => 'يجب اختيار الصف الدراسي',
            'section_id.required'       => 'يجب اختيار الفصل الدراسي',
            'teacher_id.required'       => 'يجب اختيار معلم الماده',
        ];
        $data = $this->validate($request,$rules,$validate_msg_ar);

        try {

            $book        = Library::FindOrFail($request->id);
            $book->title = $request->title;

            // check if request has file or not
            if ($request->hasFile('file_name')){
                // delete old file
                $this->deleteFile($book->file_name,'library');
                // upload new file
                $this->uploadFile($request,'file_name','library');
                // get new file name
                $new_file_name   = $request->file('file_name')->getClientOriginalName();
                // check if file name is new or not
                $book->file_name = $book->file_name != $new_file_name ? $new_file_name : $book->file_name;
            }

            $book->grade_id      = $request->grade_id;
            $book->chapter_id    = $request->chapter_id;
            $book->section_id    = $request->section_id;
            $book->teacher_id    = $request->teacher_id;
            $book->date          = date('Y-m-d H:i:s');
            $book->update();

            toastr()->success(trans('messages.success'));
            return redirect('library');

        }catch (\Exception $e){
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        Library::find($request->id)->delete();
        $this->deleteFile($request->file_name,'library');
        toastr()->error(trans('messages.delete'));
        return back();
    }

    public function downloadFile($file_name){
        //$download = ('attachments/library/'.$file_name); OR
        $download = Storage::disk('upload_attach_path')->getDriver()->getAdapter()->applyPathPrefix('attachments/library/'.$file_name);
        return response()->download($download);
    }

}
