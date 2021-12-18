<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Repositories\ReceiptStudentRepositoryInterface;
use Illuminate\Http\Request;

class ReceiptStudentController extends Controller
{

    private $receipts;
    public function __construct(ReceiptStudentRepositoryInterface $receipts)
    {
        $this->receipts = $receipts;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->receipts->getAllReceipts();
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
            'amount'  => 'required|min:0',
            'notes'   => 'required',
        ];
        $validate_msg_ar = [
            'amount.required'   => 'يجب ادخال المبلغ',
            'amount.min'        => 'يجب ان يكون المبلغ اكثر من 0 $',
            'notes.required'    => 'يجب كتابه ملاحظات',
        ];
        $data = $this->validate($request,$rules,$validate_msg_ar);

        return $this->receipts->storeReceipt($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->receipts->showReceipts($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->receipts->editReceipt($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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

        return $this->receipts->updateReceipt($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->receipts->deleteReceipt($request);
    }
}
