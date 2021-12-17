<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Repositories\FeesInvoicesRepositoryInterface;
use Illuminate\Http\Request;

class FeesInvoicesController extends Controller
{
    private $fees_invoices;
    public function __construct(FeesInvoicesRepositoryInterface $fees_invoices)
    {
        $this->fees_invoices = $fees_invoices;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->fees_invoices->getAllFeesInvoices();
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
        /**
         *  add "fees_invoices_list.*." before column name if you use array to add more than 1 filed .
         */
        $rules = [
            'fees_invoices_list.*.student_id'    => 'required',
            'fees_invoices_list.*.fees_type'     => 'required',
            'fees_invoices_list.*.amount'        => 'required',
        ];
        $validate_msg_ar = [
            'chapters_list.*.student_id.required'    => 'يجب اختيار الطالب',
            'chapters_list.*.fees_type.required'     => 'يجب اختيار نوع الرسوم',
            'chapters_list.*.amount.required'        => 'يجب اختيار مبلغ الرسوم',
        ];
        $validate = $this->validate($request,$rules,$validate_msg_ar);

        return $this->fees_invoices->storeFeesInvoice($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->fees_invoices->showFeesInvoice($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
