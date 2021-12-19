<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Repositories\PaymentStudentRepositoryInterface;
use Illuminate\Http\Request;

class PaymentsStudentsController extends Controller
{

    private $payments_students;
    public function __construct(PaymentStudentRepositoryInterface $payments_students){
        $this->payments_students = $payments_students;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->payments_students->getAllPayments();
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
        $rules = [
            'amount'   => 'required|min:0',
            'notes'    => 'required',
        ];
        $validate_msg_ar = [
            'amount.required'    => 'يجب ادخال المبلغ',
            'amount.min'         => 'يجب ان يكون المبلغ اكثر من 0 $',
            'notes.required'     => 'يجب كتابه ملاحظات',
        ];
        $data = $this->validate($request,$rules,$validate_msg_ar);

        return $this->payments_students->storePayment($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->payments_students->showPayment($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->payments_students->editPayment($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules = [
            'amount'   => 'required|min:0',
            'notes'    => 'required',
        ];
        $validate_msg_ar = [
            'amount.required'    => 'يجب ادخال المبلغ',
            'amount.min'         => 'يجب ان يكون المبلغ اكثر من 0 $',
            'notes.required'     => 'يجب كتابه ملاحظات',
        ];
        $data = $this->validate($request,$rules,$validate_msg_ar);

        return $this->payments_students->updatePayment($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->payments_students->deletePayment($request);
    }
}
