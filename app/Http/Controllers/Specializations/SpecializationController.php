<?php

namespace App\Http\Controllers\Specializations;

use App\Http\Controllers\Controller;
use App\Models\Specialization;
use Illuminate\Http\Request;

class SpecializationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'التخصصات الدراسيه';
        $all_specialization = Specialization::all();
        return view('specializations.specialization',compact('title','all_specialization'));
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
        $rules = ['name' => 'required|min:3','name_en' => 'required|min:3'];
        $validate_msg_ar = [
            'name.required'    => 'يجب كتابه اسم التخصص بالعربيه',
            'name.min'         => 'اسم التخصص بالعربيه يجب ان يكون أكثر من 3 احرف',
            'name_en.required' => 'يجب كتابه اسم التخصص بالانجليزيه',
            'name_en.min'      => 'اسم التخصص بالانجليزيه يجب ان يكون أكثر من 3 احرف'
        ];
        $data = $this->validate($request,$rules,$validate_msg_ar);

        $data['name'] = ['ar' => $request->name , 'en' => $request->name_en];
        Specialization::create($data);
        toastr()->success(trans('messages.success'));
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\specialization  $specialization
     * @return \Illuminate\Http\Response
     */
    public function show(specialization $specialization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\specialization  $specialization
     * @return \Illuminate\Http\Response
     */
    public function edit(specialization $specialization)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\specialization  $specialization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $rules = ['name' => 'required|min:3','name_en' => 'required|min:3'];
        $validate_msg_ar = [
            'name.required'    => 'يجب كتابه اسم التخصص بالعربيه',
            'name.min'         => 'اسم التخصص بالعربيه يجب ان يكون أكثر من 3 احرف',
            'name_en.required' => 'يجب كتابه اسم التخصص بالانجليزيه',
            'name_en.min'      => 'اسم التخصص بالانجليزيه يجب ان يكون أكثر من 3 احرف'
        ];
        $data = $this->validate($request,$rules,$validate_msg_ar);

        $specialization = Specialization::find($id);
        $data['name'] = ['ar' => $request->name , 'en' => $request->name_en];
        $specialization->update($data);
        toastr()->success(trans('messages.update'));
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\specialization  $specialization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Specialization::find($id)->delete();
        toastr()->error(trans('messages.delete'));
        return back();
    }
}
