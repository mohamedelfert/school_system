<?php

namespace App\Repositories;

use App\Models\FeesInvoices;
use App\Models\Student;
use App\Models\StudentAccount;
use App\Models\StudyFees;
use Illuminate\Support\Facades\DB;

class FeesInvoicesRepository implements FeesInvoicesRepositoryInterface
{

    public function getAllFeesInvoices()
    {
        $title             = 'مدرستي - الرسوم الدراسيه للطلاب';
        $all_fees_invoices = FeesInvoices::all();
        return view('fees_invoices.show_all',compact('title','all_fees_invoices'));
    }

    public function showFeesInvoice($id)
    {
        $title        = 'مدرستي - اضافه فاتوره رسوم';
        $student      = Student::findOrFail($id);
        $fees         = StudyFees::where('chapter_id',$student->chapter_id)->get();
        return view('fees_invoices.add_fees_invoice',compact('title','student','fees'));
    }

    public function storeFeesInvoice($request)
    {
        $fees_list = $request->fees_invoices_list;
        DB::beginTransaction();
        try {
            /**
             * this foreach use when add more than 1 fee invoice in one form .
             */
            foreach ($fees_list as $list){
                // save in fees_invoices table
                $fees_invoice               = new FeesInvoices();
                $fees_invoice->invoice_date = date('Y-m-d');
                $fees_invoice->student_id   = $list['student_id'];
                $fees_invoice->grade_id     = $request->grade_id;
                $fees_invoice->chapter_id   = $request->chapter_id;
                $fees_invoice->fee_id	    = $list['fees_type'];
                $fees_invoice->amount       = $list['amount'];
                $fees_invoice->notes        = $list['notes'];
                $fees_invoice->save();

                // save in student_accounts table
                $student_account               = new StudentAccount();
                $student_account->student_id   = $list['student_id'];
                $student_account->grade_id     = $request->grade_id;
                $student_account->chapter_id   = $request->chapter_id;
                $student_account->debit        = $list['amount'];
                $student_account->credit       = 0.00;
                $student_account->notes        = $list['notes'];
                $student_account->save();
            }

            DB::commit();

            toastr()->success(trans('messages.success'));
            return redirect('fees_invoices');
        }catch (\Exception $e){
            DB::rollBack();
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }
}
