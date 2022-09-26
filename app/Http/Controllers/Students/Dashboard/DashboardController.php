<?php

namespace App\Http\Controllers\Students\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function showProfile()
    {
        $student = Student::findOrFail(auth::user()->id);
        $title = 'مدرستي - الملف الشخصي';
        return view('students.dashboard.student_profile', compact('title', 'student'));
    }

    public function updateProfile(Request $request)
    {
        $rules = [
            'name' => 'required',
            'name_en' => 'required',
            'password' => 'sometimes|nullable',
        ];
        $validate_msg_ar = [
            'name.required' => 'يجب كتابه الاسم بالعربيه',
            'name_en.required' => 'يجب كتابه الاسم بالانجليزيه',
        ];
        $validate = $this->validate($request, $rules, $validate_msg_ar);

        $student = Student::findOrFail($request->id);
        if ($request->password) {
            $data['student_name'] = ['ar' => $request->name, 'en' => $request->name_en];
            $data['password'] = bcrypt($request->password);

            $student->update($data);
        } else {
            $data['student_name'] = ['ar' => $request->name, 'en' => $request->name_en];

            $student->update($data);
        }
        toastr()->success(trans('messages.update'));
        return back();
    }
}
