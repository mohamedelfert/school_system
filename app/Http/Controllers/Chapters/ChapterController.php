<?php

namespace App\Http\Controllers\Chapters;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Grade;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_grades     = Grade::all();
        $all_chapters   = Chapter::all();
        $title = trans('chapters_trans.chapters_title');
        return view('chapters.chapter',compact('all_chapters','all_grades','title'));
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
         *  add "chapters_list.*." before column name if you use array to add more than 1 filed .
         */
        $rules = [
            'chapters_list.*.chapter_name'    => 'required|min:5',
            'chapters_list.*.chapter_name_en' => 'required|min:5'
        ];
        $validate_msg_ar = [
            'chapters_list.*.chapter_name.required'    => 'يجب كتابه اسم الصف باللغه العربيه',
            'chapters_list.*.chapter_name.min'         => 'اسم الصف بالعربيه يجب ان يكون اكثر من 5 احرف',
            'chapters_list.*.chapter_name_en.required' => 'يجب كتابه اسم الصف باللغه الانجليزيه',
            'chapters_list.*.chapter_name_en.min'      => 'اسم الصف بالانجليزيه يجب ان يكون اكثر من 5 احرف'
        ];
        $validate = $this->validate($request,$rules,$validate_msg_ar);

        $chapters_list = $request->chapters_list;

        try {

            /**
             * this code use when add one chapter .
             */
//            $chapter = new Chapter();
//            $chapter->chapter_name = ['ar' => $request->chapter_name , 'en' => $request->chapter_name_en];
//            $chapter->grade_id     = $request->grade_id;
//            $chapter->save();

            /**
             * this foreach use when add more than 1 chapter in one form .
            */
            foreach ($chapters_list as $list){
                $chapter = new Chapter();
                $chapter->chapter_name = ['ar' => $list['chapter_name'] , 'en' => $list['chapter_name_en']];
                $chapter->grade_id     = $list['grade_id'];
                $chapter->save();
            }

            toastr()->success(trans('messages.success'));
            return back();
        }catch (\Exception $e){
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chapter  $cahpter
     * @return \Illuminate\Http\Response
     */
    public function show(Chapter $cahpter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chapter  $cahpter
     * @return \Illuminate\Http\Response
     */
    public function edit(Chapter $cahpter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chapter  $cahpter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $rules = [
            'chapter_name'    => 'required|min:5',
            'chapter_name_en' => 'required|min:5'
        ];
        $validate_msg_ar = [
            'chapter_name.required'    => 'يجب كتابه اسم الصف باللغه العربيه',
            'chapter_name.min'         => 'اسم الصف بالعربيه يجب ان يكون اكثر من 5 احرف',
            'chapter_name_en.required' => 'يجب كتابه اسم الصف باللغه الانجليزيه',
            'chapter_name_en.min'      => 'اسم الصف بالانجليزيه يجب ان يكون اكثر من 5 احرف'
        ];
        $data = $this->validate($request,$rules,$validate_msg_ar);

        try {

            $cahpter = Chapter::find($id);
            $data['chapter_name'] = ['ar' => $request->chapter_name , 'en' => $request->chapter_name_en];
            $data['grade_id']     = $request->grade_id;
            $cahpter->update($data);

            toastr()->success(trans('messages.update'));
            return back();

        }catch (\Exception $e){
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chapter  $cahpter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Chapter::find($id)->delete();
        toastr()->error(trans('messages.delete'));
        return back();
    }

    /**
     * This For Deletes All Checked Chapters .
     * @return \Illuminate\Http\Response
     */
    public function delete_checked(Request $request)
    {
        $checked_chapters = explode(',',$request->checked_chapters_id);
        Chapter::whereIn('id',$checked_chapters)->delete();
        toastr()->error(trans('messages.delete'));
        return back();
    }

    /**
     * This For Show Chapters By Grade .
     * @return \Illuminate\Http\Response
     */
    public function filter_chapters(Request $request)
    {
        $id = $request->grade_id;
        $all_grades = Grade::all();
        $title = trans('chapters_trans.chapters_title');
        $filter = Chapter::select('*')->where('grade_id','=',$id)->get();
        return view('chapters.chapter',compact('all_grades','title','filter'));
    }
}
