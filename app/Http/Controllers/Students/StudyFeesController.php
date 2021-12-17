<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\StudyFees;
use App\Repositories\StudyFeesRepositoryInterface;
use Illuminate\Http\Request;

class StudyFeesController extends Controller
{
    private $fees;

    public function __construct(StudyFeesRepositoryInterface $fees){
        $this->fees = $fees;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->fees->getAllFees();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->fees->createFees();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name'          => 'required',
            'name_en'       => 'required',
            'amount'        => 'required|min:0',
            'grade_id'      => 'required',
            'chapter_id'    => 'required',
            'year'          => 'required',
            'fee_type'      => 'required',
            'notes'         => 'required',
        ];
        $validate_msg_ar = [
            'name.required'          => 'يجب كتابه اسم الرسوم بالعربيه',
            'name_en.required'       => 'يجب كتابه اسم الرسوم بالانجليزيه',
            'amount.required'        => 'يجب ادخال المبلغ',
            'amount.min'             => 'لا يجب ان يكون المبلغ اقل من 0',
            'grade_id.required'      => 'يجب اختيار المرحله',
            'chapter_id.required'    => 'يجب اختيار الصف',
            'year.required'          => 'يجب اختيار السنه الدراسيه',
            'fee_type.required'      => 'يجب اختيار نوع الرسوم',
            'notes.required'         => 'يجب كتابه ملاحظات',
        ];
        $data = $this->validate($request,$rules,$validate_msg_ar);

        return $this->fees->storeFees($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudyFees  $studyFees
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudyFees  $studyFees
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->fees->editFees($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudyFees  $studyFees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $rules = [
            'name'          => 'required',
            'name_en'       => 'required',
            'amount'        => 'required|min:0',
            'grade_id'      => 'required',
            'chapter_id'    => 'required',
            'year'          => 'required',
            'fee_type'      => 'required',
            'notes'         => 'required',
        ];
        $validate_msg_ar = [
            'name.required'          => 'يجب كتابه اسم الرسوم بالعربيه',
            'name_en.required'       => 'يجب كتابه اسم الرسوم بالانجليزيه',
            'amount.required'        => 'يجب ادخال المبلغ',
            'amount.min'             => 'لا يجب ان يكون المبلغ اقل من 0',
            'grade_id.required'      => 'يجب اختيار المرحله',
            'chapter_id.required'    => 'يجب اختيار الصف',
            'year.required'          => 'يجب اختيار السنه الدراسيه',
            'fee_type.required'      => 'يجب اختيار نوع الرسوم',
            'notes.required'         => 'يجب كتابه ملاحظات',
        ];
        $data = $this->validate($request,$rules,$validate_msg_ar);

        return $this->fees->updateFees($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudyFees  $studyFees
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->fees->deleteFees($request);
    }
}
