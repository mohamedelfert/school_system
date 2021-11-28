<?php

namespace App\Repositories;

use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;
use mysql_xdevapi\Exception;

class TeacherRepository implements TeacherRepositoryInterface {

    public function getAllTeachers()
    {
       return Teacher::all();
    }

    public function getAllSpecializations()
    {
        return Specialization::all();
    }

    public function getAllGenders()
    {
        return Gender::all();
    }

    public function storeTeacher($request)
    {
        try {

            $data['teacher_name']           = ['ar' => $request->teacher_name,'en' => $request->teacher_name_en];
            $data['teacher_email']          = $request->teacher_email;
            $data['password']               = Hash::make($request->password);
            $data['joining_at']             = $request->joining_at;
            $data['specialization_id']      = $request->specialization_id;
            $data['gender_id']              = $request->gender_id;
            $data['teacher_address']        = $request->teacher_address;

            Teacher::create($data);
            toastr()->success(trans('messages.success'));
            return back();

        }catch (\Exception $e){
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function editTeacher($id)
    {
        // TODO: Implement editTeacher() method.
    }

    public function updateTeacher($request)
    {
        try {

            $id = $request->id;
            $teacher = Teacher::find($id);
            $data['teacher_name']           = ['ar' => $request->teacher_name,'en' => $request->teacher_name_en];
            $data['teacher_email']          = $request->teacher_email;
            $data['joining_at']             = $request->joining_at;
            $data['specialization_id']      = $request->specialization_id;
            $data['gender_id']              = $request->gender_id;
            $data['teacher_address']        = $request->teacher_address;

            $teacher->update($data);
            toastr()->success(trans('messages.update'));
            return back();

        }catch (\Exception $e){
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function deleteTeacher($request)
    {
        $id = $request->id;
        Teacher::find($id)->delete();
        toastr()->error(trans('messages.delete'));
        return back();
    }

}
