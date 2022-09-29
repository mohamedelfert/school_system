<?php

namespace App\Http\Controllers\Parents;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Degree;
use App\Models\FeesInvoices;
use App\Models\MyParent;
use App\Models\ReceiptStudents;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParentController extends Controller
{
    public function parentDashboard()
    {
        $students = Student::where('parent_id', auth()->user()->id)->get();
        return view('parents.dashboard', compact('students'));
    }

    public function parentChildren()
    {
        $title = 'مدرستي - قائمه الأبناء';
        $students = Student::where('parent_id', auth()->user()->id)->get();
        return view('parents.children.index', compact('title', 'students'));
    }

    public function childrenResults($id)
    {
        $title = 'مدرستي - نتائج الاختبارات';
        $student = Student::findOrFail($id);
        if ($student->parent_id !== auth()->user()->id) {
            toastr()->error('عفوا لا تسطيع مشاهده نتائج طلاب أحرين , فقط أبنائك');
            return redirect(route('parent.children'));
        }

        $degrees = Degree::where('student_id', $id)->get();
        if ($degrees->isEmpty()) {
            toastr()->error('لا توجد نتائج اختبارات لهذا الطالب');
            return redirect(route('parent.children'));
        }
        return view('parents.children.degrees', compact('title', 'degrees'));
    }

    public function attendanceReports()
    {
        $title = 'التقارير - الحضور والغياب';
        $students = Student::where('parent_id', auth()->user()->id)->get();
        return view('parents.children.attendance_reports', compact('title', 'students'));
    }

    public function attendanceSearch(Request $request)
    {
        $rules = [
            'from_date' => 'required|date|date_format:Y-m-d',
            'to_date' => 'required|date|date_format:Y-m-d|after_or_equal:from_date',
        ];
        $validate_msg_ar = [
            'from_date.required' => 'يجب تحديد تاريخ بداية البحث',
            'from_date.date' => 'يجب ان يكون تاريخ',
            'from_date.date_format' => 'يجب ان يكون التاريخ علي الصيغة y-m-d',
            'to_date.required' => 'يجب تحديد تاريخ نهاية البحث',
            'to_date.date' => 'يجب ان يكون تاريخ',
            'to_date.date_format' => 'يجب ان يكون التاريخ علي الصيغة y-m-d',
            'to_date.after_or_equal' => 'يجب ان يكون تاريخ بداية البحث قبل تاريخ نهاية البحث',
        ];
        $validate = $this->validate($request, $rules, $validate_msg_ar);

        $title = 'التقارير - الحضور والغياب';
        $students = Student::where('parent_id', auth()->user()->id)->get();

        if ($request->student_id === 'all') {
            $attendances = Attendance::whereBetween('attendance_date', [$request->from_date, $request->to_date])->get();
            return view('parents.children.attendance_reports', compact('title', 'students', 'attendances'));
        } else {
            $attendances = Attendance::whereBetween('attendance_date', [$request->from_date, $request->to_date])
                ->where('student_id', $request->student_id)->get();
            return view('parents.children.attendance_reports', compact('title', 'students', 'attendances'));
        }
    }

    public function studentFees()
    {
        $title = 'التقارير - تقرير الفواتير';
        $studentIds = Student::where('parent_id', auth()->user()->id)->pluck('id');
        $feesInvoices = FeesInvoices::whereIn('student_id', $studentIds)->get();
        return view('parents.children.student_fees_invoices', compact('title', 'feesInvoices'));
    }

    public function studentReceipt($id)
    {
        $title = 'مدرستي - الفواتير المدفوعة / سندات القبض';
        $student = Student::findOrFail($id);
        if ($student->parent_id !== auth()->user()->id) {
            toastr()->error('عفوا لا تسطيع مشاهده مدفوعات طلاب أحرين , فقط أبنائك');
            return redirect(route('student-fees'));
        }

        $studentReceipts = ReceiptStudents::where('student_id', $id)->get();
        if ($studentReceipts->isEmpty()) {
            toastr()->error('لا توجد مدفوعات لهذا الطالب');
            return redirect(route('student-fees'));
        }
        return view('parents.children.student_receipts', compact('title', 'studentReceipts'));
    }

    public function showProfile()
    {
        $parent = MyParent::findOrFail(auth::user()->id);
        $title = 'مدرستي - الملف الشخصي';
        return view('parents.parent_profile', compact('title', 'parent'));
    }

    public function updateProfile(Request $request)
    {
        $rules = [
            'name' => 'required',
            'name_en' => 'required',
            'address' => 'required',
            'password' => 'sometimes|nullable',
        ];
        $validate_msg_ar = [
            'name.required' => 'يجب كتابه الاسم بالعربيه',
            'name_en.required' => 'يجب كتابه الاسم بالانجليزيه',
            'address.required' => 'يجب كتابه العنوان',
        ];
        $validate = $this->validate($request, $rules, $validate_msg_ar);

        $parent = MyParent::findOrFail($request->id);
        if ($request->password) {
            $data['father_name'] = ['ar' => $request->name, 'en' => $request->name_en];
            $data['father_address'] = $request->address;
            $data['password'] = bcrypt($request->password);

            $parent->update($data);
        } else {
            $data['father_name'] = ['ar' => $request->name, 'en' => $request->name_en];
            $data['father_address'] = $request->address;

            $parent->update($data);
        }
        toastr()->success(trans('messages.update'));
        return back();
    }
}
