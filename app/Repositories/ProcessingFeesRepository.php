<?php

namespace App\Repositories;

use App\Models\ProcessingFees;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;

class ProcessingFeesRepository implements ProcessingFeesRepositoryInterface{


    public function getAllProcessingFees()
    {
        $title          = 'مدرستي - الرسوم المستبعده';
        $all_processing = ProcessingFees::all();
        return view('processing_fees.show_all',compact('title','all_processing'));
    }

    public function showProcessingFee($id)
    {
        $title   = 'مدرستي - استبعاد رسوم';
        $student = Student::findOrFail($id);
        return view('processing_fees.add_processing_fee',compact('title','student'));
    }

    public function storeProcessingFee($request)
    {
        DB::beginTransaction();
        try {

            // save in processing_fees table
            $processing_fee             = new ProcessingFees();
            $processing_fee->date       = date('Y-m-d');
            $processing_fee->student_id = $request->student_id;
            $processing_fee->amount     = $request->amount;
            $processing_fee->notes      = $request->notes;
            $processing_fee->save();

            // save in student_accounts table
            $student_account                     = new StudentAccount();
            $student_account->date               = date('Y-m-d');
            $student_account->type               = 'processing';
            $student_account->processing_fee_id  = $processing_fee->id;
            $student_account->student_id         = $request->student_id;
            $student_account->debit              = 0.00;
            $student_account->credit             = $request->amount;
            $student_account->notes              = $request->notes;
            $student_account->save();

            DB::commit();

            toastr()->success(trans('messages.success'));
            return redirect('processing_fees');

        }catch (\Exception $e){
            DB::rollBack();
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function editProcessingFee($id)
    {
        $title          = 'مدرستي - تعديل رسم مستبعد';
        $precessing_fee = ProcessingFees::findOrFail($id);
        return view('processing_fees.edit_processing_fee',compact('title','precessing_fee'));
    }

    public function updateProcessingFee($request)
    {
        DB::beginTransaction();
        try {

            // edit in processing_fees table
            $processing_fee             = ProcessingFees::findOrFail($request->id);
            $processing_fee->date       = date('Y-m-d');
            $processing_fee->student_id = $request->student_id;
            $processing_fee->amount     = $request->amount;
            $processing_fee->notes      = $request->notes;
            $processing_fee->update();

            // edit in student_accounts table
            $student_account                     = StudentAccount::where('processing_fee_id',$request->id)->first();
            $student_account->date               = date('Y-m-d');
            $student_account->type               = 'processing';
            $student_account->processing_fee_id  = $processing_fee->id;
            $student_account->student_id         = $request->student_id;
            $student_account->debit              = 0.00;
            $student_account->credit             = $request->amount;
            $student_account->notes              = $request->notes;
            $student_account->update();

            DB::commit();

            toastr()->success(trans('messages.update'));
            return redirect('processing_fees');

        }catch (\Exception $e){
            DB::rollBack();
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function deleteProcessingFee($request)
    {
        ProcessingFees::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.delete'));
        return back();
    }
}
