<?php

namespace App\Repositories;

use App\Models\FundAccount;
use App\Models\PaymentsStudents;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;

class PaymentStudentRepository implements PaymentStudentRepositoryInterface
{

    public function getAllPayments()
    {
        $title        = 'مدرستي - سندات الصرف';
        $all_payments = PaymentsStudents::all();
        return view('payments_students.show_all',compact('title','all_payments'));
    }

    public function showPayment($id)
    {
        $title   = 'مدرستي - اضافه سند صرف';
        $student = Student::findOrFail($id);
        return view('payments_students.add_payment',compact('title','student'));
    }

    public function storePayment($request)
    {
        DB::beginTransaction();
        try {

            // save in payments_students table
            $payments_student             = new PaymentsStudents();
            $payments_student->date       = date('Y-m-d');
            $payments_student->student_id = $request->student_id;
            $payments_student->amount     = $request->amount;
            $payments_student->notes      = $request->notes;
            $payments_student->save();

            // save in fund_accounts table
            $fund_accounts             = new FundAccount();
            $fund_accounts->date       = date('Y-m-d');
            $fund_accounts->payment_id = $payments_student->id;
            $fund_accounts->debit      = 0.00;
            $fund_accounts->credit     = $request->amount;
            $fund_accounts->notes      = $request->notes;
            $fund_accounts->save();

            // save in student_accounts table
            $student_account                     = new StudentAccount();
            $student_account->date               = date('Y-m-d');
            $student_account->type               = 'payment';
            $student_account->payment_student_id = $payments_student->id;
            $student_account->student_id         = $request->student_id;
            $student_account->debit              = $request->amount;
            $student_account->credit             = 0.00;
            $student_account->notes              = $request->notes;
            $student_account->save();

            DB::commit();

            toastr()->success(trans('messages.success'));
            return redirect('payments_students');

        }catch (\Exception $e){
            DB::rollBack();
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function editPayment($id)
    {
        $title   = 'مدرستي - تعديل سند صرف';
        $payment = PaymentsStudents::findOrFail($id);
        return view('payments_students.edit_payment',compact('title','payment'));
    }

    public function updatePayment($request)
    {
        DB::beginTransaction();
        try {

            // edit in payments_students table
            $payments_student             = PaymentsStudents::findOrFail($request->id);
            $payments_student->date       = date('Y-m-d');
            $payments_student->student_id = $request->student_id;
            $payments_student->amount     = $request->amount;
            $payments_student->notes      = $request->notes;
            $payments_student->save();

            // edit in fund_accounts table
            $fund_accounts             = FundAccount::where('payment_id',$request->id)->first();
            $fund_accounts->date       = date('Y-m-d');
            $fund_accounts->payment_id = $payments_student->id;
            $fund_accounts->debit      = 0.00;
            $fund_accounts->credit     = $request->amount;
            $fund_accounts->notes      = $request->notes;
            $fund_accounts->save();

            // edit in student_accounts table
            $student_account                     = StudentAccount::where('payment_student_id',$request->id)->first();
            $student_account->date               = date('Y-m-d');
            $student_account->type               = 'payment';
            $student_account->payment_student_id = $payments_student->id;
            $student_account->student_id         = $request->student_id;
            $student_account->debit              = $request->amount;
            $student_account->credit             = 0.00;
            $student_account->notes              = $request->notes;
            $student_account->save();

            DB::commit();

            toastr()->success(trans('messages.update'));
            return redirect('payments_students');

        }catch (\Exception $e){
            DB::rollBack();
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function deletePayment($request)
    {
        PaymentsStudents::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.delete'));
        return redirect('payments_students');
    }
}
