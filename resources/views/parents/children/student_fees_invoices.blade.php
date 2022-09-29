@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{$title}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_sidebar.fees_invoices')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0 text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>اسم الطالب</th>
                                    <th>نوع الرسوم</th>
                                    <th>القيمة</th>
                                    <th>المبلغ الإجمالي علي الطالب</th>
                                    <th>المتبقي</th>
                                    <th>المرحلة الدراسية</th>
                                    <th>الصف الدراسي</th>
                                    <th>ملاحظات</th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($feesInvoices as $index => $feesInvoice)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $feesInvoice->getStudent->student_name }}</td>
                                    <td>{{ $feesInvoice->getStudyFees->name }}</td>
                                    <td>{{ number_format($feesInvoice->amount, 2) }} $</td>
                                    <td>{{ number_format($feesInvoice->getStudent->getStudentAccount->sum('debit'), 2) }} $</td>
                                    <td>
                                        {{ number_format($feesInvoice->getStudent->getStudentAccount->sum('debit') - $feesInvoice->getStudent->getStudentAccount->sum('credit'), 2) }}$
                                    </td>
                                    <td>{{ $feesInvoice->getgrades->name }}</td>
                                    <td>{{ $feesInvoice->getChapters->chapter_name }}</td>
                                    <td>{{ $feesInvoice->notes }}</td>
                                    <td>
                                        <a class="modal-effect btn btn-info"
                                           href="{{ route('student-receipt',$feesInvoice->student_id) }}"
                                           title="عرض"><i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
