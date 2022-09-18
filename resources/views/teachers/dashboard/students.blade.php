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
    {{trans('main_sidebar.students_list')}}
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
                <div style="margin-bottom: 10px;">
                    <a type="button" class="modal-effect btn btn-success" href="student/create">
                            <i class="ti-plus"></i> اضافه طالب
                    </a>
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0 text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم الطالب</th>
                                <th>البريد الإلكتروني</th>
                                <th>النوع</th>
                                <th>المرحلة</th>
                                <th>الصف الدراسي</th>
                                <th>الفصل</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $index=>$student)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $student->student_name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->getGenders->gender_name }}</td>
                                <td>{{ $student->getGrades->name }}</td>
                                <td>{{ $student->getChapters->chapter_name }}</td>
                                <td>{{ $student->getSections->section_name }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary btn-sm"
                                                data-toggle="dropdown" id="dropdownMenuButton" type="button"> العمليات <i class="fas fa-caret-down ml-1"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="{{ route('student.show',$student->id) }}">
                                                <i class="far fa-eye text-warning"></i>&nbsp;عرض بيانات الطالب
                                            </a>
                                            <a class="dropdown-item" href="{{ url('student/'.$student->id.'/edit') }}">
                                                <i class="fas fa-user-edit text-primary"></i>&nbsp;تعديل بيانات الطالب
                                            </a>
                                            <a class="dropdown-item" href="{{ route('fees_invoices.show',$student->id) }}">
                                                <i class="fa fa-plus-circle text-success"></i>&nbsp;&nbsp;اضافة فاتورة رسوم
                                            </a>
                                            <a class="dropdown-item" href="{{ route('receipt_students.show',$student->id) }}">
                                                <i class="fas fa-money-bill-alt text-info"></i>&nbsp;اضافه سند قبض
                                            </a>
                                            <a class="dropdown-item" href="{{ route('processing_fees.show',$student->id) }}">
                                                <i class="fas fa-dollar text-black-50"></i>&nbsp;&nbsp;&nbsp;استبعاد رسوم
                                            </a>
                                            <a class="dropdown-item" href="{{ route('payments_students.show',$student->id) }}">
                                                <i class="fas fa-donate text-warning"></i>&nbsp;&nbsp;&nbsp;استرجاع رسوم للطلاب
                                            </a>
                                            <a class="dropdown-item" data-effect="effect-scale"
                                               data-id="{{$student->id}}" data-student_name="{{$student->student_name}}"
                                               data-toggle="modal" href="#delete">
                                                <i class="fa fa-trash text-danger"></i>&nbsp;&nbsp;حذف بيانات الطالب
                                            </a>
                                        </div>
                                    </div>
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
    <!-- Internal Modal js-->
    <script src="{{URL::asset('assets/js/modal.js')}}"></script>
@endsection
