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
            'chapter_id'    => 'required|unique:study_fees,chapter_id',
            'year'          => 'required',
            'notes'         => 'required',
        ];
        $validate_msg_ar = [
            'name.required'          => 'يجب كتابه اسم الرسوم بالعربيه',
            'name_en.required'       => 'يجب كتابه اسم الرسوم بالانجليزيه',
            'amount.required'        => 'يجب ادخال المبلغ',
            'amount.min'             => 'لا يجب ان يكون المبلغ اقل من 0',
            'grade_id.required'      => 'يجب اختيار المرحله',
            'chapter_id.required'    => 'يجب اختيار الصف',
            'chapter_id.unique'      => 'تم وضع رسوم لهذا الصف من قبل',
            'year.required'          => 'يجب اختيار السنه الدراسيه',
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
        return $this->fees->showStudentsFees($id);
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
            'chapter_id'    => 'required|unique:study_fees,chapter_id,'.$id,
            'year'          => 'required',
            'notes'         => 'required',
        ];
        $validate_msg_ar = [
            'name.required'          => 'يجب كتابه اسم الرسوم بالعربيه',
            'name_en.required'       => 'يجب كتابه اسم الرسوم بالانجليزيه',
            'amount.required'        => 'يجب ادخال المبلغ',
            'amount.min'             => 'لا يجب ان يكون المبلغ اقل من 0',
            'grade_id.required'      => 'يجب اختيار المرحله',
            'chapter_id.required'    => 'يجب اختيار الصف',
            'chapter_id.unique'      => 'تم وضع رسوم لهذا الصف من قبل',
            'year.required'          => 'يجب اختيار السنه الدراسيه',
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
