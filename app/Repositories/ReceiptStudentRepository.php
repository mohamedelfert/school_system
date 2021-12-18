<?php

namespace App\Repositories;

use App\Models\FundAccount;
use App\Models\ReceiptStudents;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;

class ReceiptStudentRepository implements ReceiptStudentRepositoryInterface
{

    public function getAllReceipts()
    {
        $title            = 'مدرستي - سندات القبض';
        $all_receipts     = ReceiptStudents::all();
        return view('receipt_students.show_all',compact('title','all_receipts'));
    }

    public function showReceipts($id)
    {
        $title        = 'مدرستي - اضافه سند قبض';
        $student      = Student::findOrFail($id);
        return view('receipt_students.add_receipt',compact('title','student'));
    }

    public function storeReceipt($request)
    {
        DB::beginTransaction();
        try {

            // save in receipt_students table
            $receipt_student               = new ReceiptStudents();
            $receipt_student->date         = date('Y-m-d');
            $receipt_student->student_id   = $request->student_id;
            $receipt_student->debit        = $request->amount;
            $receipt_student->notes        = $request->notes;
            $receipt_student->save();

            // save in fund_accounts table
            $fund_account                    = new FundAccount();
            $fund_account->date              = date('Y-m-d');
            $fund_account->receipt_id        = $receipt_student->id;
            $fund_account->debit             = $request->amount;
            $fund_account->credit            = 0.00;
            $fund_account->notes             = $request->notes;
            $fund_account->save();

            // save in student_accounts table
            $student_account                       = new StudentAccount();
            $student_account->date                 = date('Y-m-d');
            $student_account->type                 = 'receipt';
            $student_account->receipt_student_id   = $receipt_student->id;
            $student_account->student_id           = $request->student_id;
            $student_account->debit                = 0.00;
            $student_account->credit               = $request->amount;
            $student_account->notes                = $request->notes;
            $student_account->save();

            DB::commit();

            toastr()->success(trans('messages.success'));
            return redirect('receipt_students');
        }catch (\Exception $e){
            DB::rollBack();
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function editReceipt($id)
    {
        $title        = 'مدرستي - تعديل سند قبض';
        $receipt      = ReceiptStudents::findOrFail($id);
        return view('receipt_students.edit_receipt',compact('title','receipt'));
    }

    public function updateReceipt($request)
    {
        DB::beginTransaction();
        try {

            // save in receipt_students table
            $receipt_student               = ReceiptStudents::findOrFail($request->id);
            $receipt_student->date         = date('Y-m-d');
            $receipt_student->student_id   = $request->student_id;
            $receipt_student->debit        = $request->amount;
            $receipt_student->notes        = $request->notes;
            $receipt_student->update();

            // save in fund_accounts table
            $fund_account                    = FundAccount::where('receipt_id',$request->id)->first();
            $fund_account->date              = date('Y-m-d');
            $fund_account->receipt_id        = $receipt_student->id;
            $fund_account->debit             = $request->amount;
            $fund_account->credit            = 0.00;
            $fund_account->notes             = $request->notes;
            $fund_account->update();

            // save in student_accounts table
            $student_account                       = StudentAccount::where('receipt_student_id',$request->id)->first();
            $student_account->date                 = date('Y-m-d');
            $student_account->type                 = 'receipt';
            $student_account->receipt_student_id   = $receipt_student->id;
            $student_account->student_id           = $request->student_id;
            $student_account->debit                = 0.00;
            $student_account->credit               = $request->amount;
            $student_account->notes                = $request->notes;
            $student_account->update();

            DB::commit();

            toastr()->success(trans('messages.update'));
            return redirect('receipt_students');
        }catch (\Exception $e){
            DB::rollBack();
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function deleteReceipt($request)
    {
        ReceiptStudents::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.delete'));
        return back();
    }
}
