<?php

namespace App\Http\Controllers\Students\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index()
    {
        $title = 'مدرستي - الامتحانات';
        $exams = Exam::where('grade_id', auth()->user()->grade_id)
            ->where('chapter_id', auth()->user()->chapter_id)
            ->where('section_id', auth()->user()->section_id)
            ->orderBy('id', 'DESC')
            ->get();
        return view('students.dashboard.exams.index', compact('title', 'exams'));
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
        return 'show exam questions';
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
