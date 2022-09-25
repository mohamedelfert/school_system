<?php

namespace App\Http\Controllers\OnlineClasses;

use App\Http\Controllers\Controller;
use App\Http\Traits\MeetingZoomTrait;
use App\Models\Chapter;
use App\Models\Grade;
use App\Models\OnlineClass;
use App\Models\Section;
use Illuminate\Http\Request;
use MacsiDigital\Zoom\Facades\Zoom;

class OnlineClassController extends Controller
{
    use MeetingZoomTrait;

    public function index()
    {
        $title              = 'مدرستي - الحصص الاونلاين';
        $all_online_classes = OnlineClass::all();
        return view('online_classes.show_all',compact('title','all_online_classes'));
    }

    public function create()
    {
        $title         = 'مدرستي - اضافه حصه اونلاين';
        $all_grades    = Grade::all();
        return view('online_classes.add',compact('title','all_grades'));
    }

    public function store(Request $request)
    {
        $rules = [
            'grade_id'   => 'required',
            'chapter_id' => 'required',
            'section_id' => 'required',
            'topic'      => 'required',
            'start_at'   => 'required',
            'duration'   => 'required',
        ];
        $validate_msg_ar = [
            'grade_id.required'    => 'يجب اختيار المرحله الدراسيه',
            'chapter_id.required'  => 'يجب اختيار الصف الدراسي',
            'section_id.required'  => 'يجب اختيار الفصل الدراسي',
            'topic.required'       => 'يجب كتابه عنوان الحصه',
            'start_at.required'    => 'يجب اختيار تاريخ ووقت الحصه',
            'duration.required'    => 'يجب كتابه مده الحصه بالدقائق',
        ];
        $data = $this->validate($request,$rules,$validate_msg_ar);

        try {

            // call createMeeting() method from MeetingZoomTrait
            $meeting = $this->createMeeting($request);

            // save online class information in database
            OnlineClass::create([
                'integration' => true,
                'grade_id'    => $request->grade_id,
                'chapter_id'  => $request->chapter_id,
                'section_id'  => $request->section_id,
                'created_by'  => auth()->user()->email,
                'meeting_id'  => $meeting->id,
                'topic'       => $request->topic,
                'start_at'    => $request->start_at,
                'duration'    => $request->duration,
                'password'    => $meeting->password,
                'start_url'   => $meeting->start_url,
                'join_url'    => $meeting->join_url,
            ]);

            toastr()->success(trans('messages.success'));
            return redirect('online_classes');

        }catch (\Exception $e){
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    /**
     * This method use when add new online classes indirect by zoom himself
     */
    public function indirectCreate()
    {
        $title         = 'مدرستي - اضافه تفاصيل حصه اونلاين';
        $all_grades    = Grade::all();
        return view('online_classes.indirect_add',compact('title','all_grades'));
    }

    /**
     * This method use when store new online classes indirect by zoom himself
     */
    public function indirectStore(Request $request)
    {
        $rules = [
            'grade_id'   => 'required',
            'chapter_id' => 'required',
            'section_id' => 'required',
            'topic'      => 'required',
            'start_at'   => 'required',
            'duration'   => 'required',
            'meeting_id' => 'required|unique:online_classes,meeting_id',
            'password'   => 'required',
            'start_url'  => 'required',
            'join_url'   => 'required',
        ];
        $validate_msg_ar = [
            'grade_id.required'    => 'يجب اختيار المرحله الدراسيه',
            'chapter_id.required'  => 'يجب اختيار الصف الدراسي',
            'section_id.required'  => 'يجب اختيار الفصل الدراسي',
            'topic.required'       => 'يجب كتابه عنوان الحصه',
            'start_at.required'    => 'يجب اختيار تاريخ ووقت الحصه',
            'duration.required'    => 'يجب كتابه مده الحصه بالدقائق',
            'meeting_id.required'  => 'يجب كتابه رقم الاجتماع ( Meeting ID )',
            'meeting_id.unique'    => 'رقم الاجتماع مسجل مسبقا',
            'password.required'    => 'يجب كتابه كلمه مرور الاجتماع',
            'start_url.required'   => 'يجب كتابه لينك بدء الاجتماع',
            'join_url.required'    => 'يجب كتابه لينك دخول الطلاب',
        ];
        $data = $this->validate($request,$rules,$validate_msg_ar);

        try {

            // save online class information in database
            OnlineClass::create([
                'integration' => false,
                'grade_id'    => $request->grade_id,
                'chapter_id'  => $request->chapter_id,
                'section_id'  => $request->section_id,
                'created_by'  => auth()->user()->email,
                'meeting_id'  => $request->meeting_id,
                'topic'       => $request->topic,
                'start_at'    => $request->start_at,
                'duration'    => $request->duration,
                'password'    => $request->password,
                'start_url'   => $request->start_url,
                'join_url'    => $request->join_url,
            ]);

            toastr()->success(trans('messages.success'));
            return redirect('online_classes');

        }catch (\Exception $e){
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $title         = 'مدرستي - تعديل حصه اونلاين';
        $online_class  = OnlineClass::where('meeting_id',$id)->first();
        $all_grades    = Grade::all();
        if ($online_class->integration == true){
            return view('online_classes.edit',compact('title','all_grades','online_class'));
        }else{
            return view('online_classes.indirect_edit',compact('title','all_grades','online_class'));
        }
    }

    public function update(Request $request)
    {
        $rules = [
            'grade_id'   => 'required',
            'chapter_id' => 'required',
            'section_id' => 'required',
            'topic'      => 'required',
            'start_at'   => 'required',
            'duration'   => 'required',
        ];
        $validate_msg_ar = [
            'grade_id.required'    => 'يجب اختيار المرحله الدراسيه',
            'chapter_id.required'  => 'يجب اختيار الصف الدراسي',
            'section_id.required'  => 'يجب اختيار الفصل الدراسي',
            'topic.required'       => 'يجب كتابه عنوان الحصه',
            'start_at.required'    => 'يجب اختيار تاريخ ووقت الحصه',
            'duration.required'    => 'يجب كتابه مده الحصه بالدقائق',
        ];
        $data = $this->validate($request,$rules,$validate_msg_ar);

        try {

            // update Meeting Information in zoom
            $meeting = Zoom::meeting()->find($request->meeting_id)->update([
                'topic'      => $request->topic,
                'duration'   => $request->duration,
                'start_time' => $request->start_at,
                'timezone'   => config('zoom.timezone'),
            ]);

            // update online class information in database
            $online_classes = OnlineClass::where('meeting_id',$request->meeting_id)->first();

            $data['integration']   = true;
            $data['grade_id']      = $request->grade_id;
            $data['chapter_id']    = $request->chapter_id;
            $data['section_id']    = $request->section_id;
            $data['created_by']    = auth()->user()->email;
            $data['meeting_id']    = $meeting->id;
            $data['topic']         = $request->topic;
            $data['start_at']      = $request->start_at;
            $data['duration']      = $request->duration;
            $data['password']      = $meeting->password;
            $data['start_url']     = $meeting->start_url;
            $data['join_url']      = $meeting->join_url;

            $online_classes->update($data);


            toastr()->success(trans('messages.update'));
            return redirect('online_classes');

        }catch (\Exception $e){
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    /**
     * This method use when update new online classes indirect
     */
    public function indirectUpdate(Request $request)
    {
        $meeting_id = $request->meeting_id;

        $rules = [
            'grade_id'   => 'required',
            'chapter_id' => 'required',
            'section_id' => 'required',
            'topic'      => 'required',
            'start_at'   => 'required',
            'duration'   => 'required',
            'password'   => 'required',
        ];
        $validate_msg_ar = [
            'grade_id.required'    => 'يجب اختيار المرحله الدراسيه',
            'chapter_id.required'  => 'يجب اختيار الصف الدراسي',
            'section_id.required'  => 'يجب اختيار الفصل الدراسي',
            'topic.required'       => 'يجب كتابه عنوان الحصه',
            'start_at.required'    => 'يجب اختيار تاريخ ووقت الحصه',
            'duration.required'    => 'يجب كتابه مده الحصه بالدقائق',
            'password.required'    => 'يجب كتابه كلمه مرور الاجتماع',
        ];
        $data = $this->validate($request,$rules,$validate_msg_ar);

        try {

            // update online class information in database
            $online_classes = OnlineClass::where('meeting_id',$request->meeting_id)->first();

            $data['integration']   = false;
            $data['grade_id']      = $request->grade_id;
            $data['chapter_id']    = $request->chapter_id;
            $data['section_id']    = $request->section_id;
            $data['created_by']    = auth()->user()->email;
            $data['meeting_id']    = $request->meeting_id;
            $data['topic']         = $request->topic;
            $data['start_at']      = $request->start_at;
            $data['duration']      = $request->duration;
            $data['password']      = $request->password;

            $online_classes->update($data);

            toastr()->success(trans('messages.update'));
            return redirect('online_classes');

        }catch (\Exception $e){
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        $info = OnlineClass::findOrFail($request->id);
        if ($info->integration == true){
            // delete meeting from zoom
            Zoom::meeting()->find($request->meeting_id)->delete();
            // delete meeting from database
            OnlineClass::where('meeting_id',$request->meeting_id)->delete();
        }else{
            // delete meeting from database
            OnlineClass::findOrFail($request->id)->delete();
        }

        toastr()->error(trans('messages.delete'));
        return back();
    }

}
