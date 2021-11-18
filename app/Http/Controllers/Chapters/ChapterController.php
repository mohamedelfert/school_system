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
        return view('chapters.chapters',compact('all_chapters','all_grades','title'));
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
        //
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
    public function update(Request $request, Chapter $cahpter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chapter  $cahpter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chapter $cahpter)
    {
        //
    }
}
