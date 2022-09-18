<?php

namespace App\Http\Controllers\Teachers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {
        $title        = 'مدرستي - الطلاب';
        $sectionIds = Teacher::findOrFail(auth::user()->id)->sections()->pluck('section_id');
        $students = Student::whereIn('section_id', $sectionIds)->get();
        return view('teachers.dashboard.students', compact('title','students'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
