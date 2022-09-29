@extends('layouts.master')
@section('css')
        @media print {
            .print_btn {display: none}
        }
    @toastr_css
@section('title')
    {{$title}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_sidebar.show_student')}}
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
                    <a type="button" class="modal-effect btn btn-primary" href="../student">
                        <i class="ti-back-left"></i> رجوع للطلاب
                    </a>
                </div>
                <hr>
                <div class="text-wrap">
                    <div class="tab nav-border">
                        <div class=" tab-menu-heading">
                            <div class="tabs-menu1">
                                <ul class="nav nav-tabs panel-tabs main-nav-line" role="tablist">
                                    <li class="nav-item">
                                        <a href="#tab1" class="nav-link active show" data-toggle="tab">بيانات الطالب</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#tab2" class="nav-link" data-toggle="tab">مرفقات الطالب</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#tab3" class="nav-link" data-toggle="tab">مدفوعات الطالب</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body tabs-menu-body main-content-body-right border">
                            <div class="tab-content">
                                <!-- Student Information -->
                                <div class="container rounded bg-white mt-5 mb-5 tab-pane active" id="tab1">
                                    <div class="row">
                                        <div class="col-md-2 border-right">
                                            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
{{--                                                @foreach($student->images as $image)--}}
{{--                                                <img class="rounded-circle mt-5" width="150px" src="{{ 'public/attachments/students/'.$student->student_name .'/'. $image->file_name }}">--}}
{{--                                                @endforeach--}}
                                                <img class="rounded-circle mt-5" alt="صوره الطالب" width="150px" src="{{ $student->gender_id == 1 ?  asset('assets/images/male.png') : asset('assets/images/female.png') }}">
                                                <hr>
                                                <span class="font-weight-bold">{{ $student->student_name }}</span>
                                                <span class="text-black-50">{{ $student->email }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-5 border-right">
                                                <div class="p-3 py-5">
                                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                                        <h4 class="text-right text-primary">البيانات الشخصيه</h4>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-md-6">
                                                            <label class="labels">اسم الاب</label>
                                                            <input type="text" class="form-control" placeholder="{{ $student->getParents->father_name }}" readonly>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="labels">اسم الام</label>
                                                            <input type="text" class="form-control" placeholder="{{ $student->getParents->mother_name }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-md-6">
                                                            <label class="labels">هاتف الاب</label>
                                                            <input type="text" class="form-control" placeholder="{{ $student->getParents->father_phone }}" readonly>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="labels">هاتف الام</label>
                                                            <input type="text" class="form-control" placeholder="{{ $student->getParents->mother_phone }}" readonly>
                                                        </div>
                                                        <div class="col-md-12" style="margin-top: 15px">
                                                            <label class="labels">البريد الإلكتروني لولي الامر</label>
                                                            <input type="text" class="form-control" placeholder="{{ $student->getParents->email }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col-md-4">
                                                            <label class="labels">النوع</label>
                                                            <input type="text" class="form-control" placeholder="{{ $student->getGenders->gender_name }}" readonly>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="labels">الجنسية</label>
                                                            <input type="text" class="form-control" placeholder="{{ $student->getNationalities->name }}" readonly>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="labels">فصيله الدم</label>
                                                            <input type="text" class="form-control" placeholder="{{ $student->getBloods->name }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-md-12">
                                                            <label class="labels">تاريخ الميلاد</label>
                                                            <input type="text" class="form-control" placeholder="{{ $student->date_of_birth }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-md-12">
                                                            <label class="labels">عنوان الاب</label>
                                                            <input type="text" class="form-control" placeholder="{{ $student->getParents->father_address }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="col-md-5">
                                                <div class="p-3 py-5">
                                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                                        <h4 class="text-right text-info">البيانات الدراسية</h4>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-md-6">
                                                            <label class="labels">تاريخ الالتحاق</label>
                                                            <input type="text" class="form-control" placeholder="{{ $student->joining_at }}" readonly>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="labels">السنه الدراسية</label>
                                                            <input type="text" class="form-control" placeholder="{{ $student->academic_year }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col-md-4">
                                                            <label class="labels">المرحله الدراسيه</label>
                                                            <input type="text" class="form-control" placeholder="{{ $student->getGrades->name }}" readonly>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="labels">الصف الدراسي</label>
                                                            <input type="text" class="form-control" placeholder="{{ $student->getChapters->chapter_name }}" readonly>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="labels">الفصل الدراسي</label>
                                                            <input type="text" class="form-control" placeholder="{{ $student->getSections->section_name }}" readonly>
                                                        </div>
                                                    </div>
                                                    <hr>
{{--                                                    <div class="col-md-6 border-right" style="float: right;margin-top: 20px;">--}}
{{--                                                        <div class="d-flex justify-content-between align-items-center mb-3">--}}
{{--                                                            <h4 class="text-right text-warning">المواد الدراسية</h4>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="row mt-2">--}}
{{--                                                            <ul class="list-group list-group-flush">--}}
{{--                                                                <li class="list-group-item">Cras justo odio</li>--}}
{{--                                                                <li class="list-group-item">Dapibus ac facilisis in</li>--}}
{{--                                                                <li class="list-group-item">Morbi leo risus</li>--}}
{{--                                                                <li class="list-group-item">Porta ac consectetur ac</li>--}}
{{--                                                                <li class="list-group-item">Vestibulum at eros</li>--}}
{{--                                                            </ul>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-md-6" style="float: left;margin-top: 20px;">--}}
{{--                                                        <div class="d-flex justify-content-between align-items-center mb-3">--}}
{{--                                                            <h4 class="text-right text-danger">درجات المواد</h4>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="row mt-2">--}}
{{--                                                            <ul class="list-group list-group-flush">--}}
{{--                                                                <li class="list-group-item">Cras justo odio</li>--}}
{{--                                                                <li class="list-group-item">Dapibus ac facilisis in</li>--}}
{{--                                                                <li class="list-group-item">Morbi leo risus</li>--}}
{{--                                                                <li class="list-group-item">Porta ac consectetur ac</li>--}}
{{--                                                                <li class="list-group-item">Vestibulum at eros</li>--}}
{{--                                                            </ul>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <!-- Student Information -->

                                <!-- Student Attachment Information -->
                                <div class="tab-pane" id="tab2">
                                    <!-- Add New Attachment -->
                                    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12" style="margin-top: 15px;">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="main-content-label mg-b-5">
                                                    اضافه مرفق جديد
                                                </div>
                                                <p class="text-danger" style="margin-top: 5px">* صيغة المرفق : ( JPEG , JPG , PNG ) </p>
                                                <form action="{{ url('upload_attach') }}" method="post" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="row row-sm">
                                                        <div class="col-md-12">
                                                            <div class="custom-file">
                                                                <input class="custom-file-input" type="file" name="photos[]" id="photos" accept="image/*" data-height="70" multiple required>
                                                                <label class="custom-file-label" for="customFile">اختيار الملف</label>
                                                                <input type="hidden" id="id" name="id" value="{{ $student->id }}">
                                                                <input type="hidden" id="student_name" name="student_name" value="{{ $student->student_name }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-primary">تاكيد</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Add New Attachment -->

                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table text-md-nowrap" id="example1">
                                                <thead>
                                                    <tr>
                                                        <th class="wd-5p border-bottom-0">#</th>
                                                        <th class="wd-25p border-bottom-0">اسم الملف</th>
                                                        <th class="wd-15p border-bottom-0">تاريخ الاضافه</th>
                                                        <th class="wd-30p border-bottom-0">العمليات</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @php $i = 1; @endphp
                                                @foreach($student->images as $image)
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $image->file_name }}</td>
                                                        <td>{{ $image->created_at->diffForHumans() }}</td>
                                                        <td>
                                                            <a class="btn btn-sm btn-warning" target="_blank"
                                                               href="{{url('viewPhoto/'.$student->student_name.'/'.$image->file_name)}}">
                                                                <i class="fa fa-eye"></i> عرض </a>
                                                            <a class="btn btn-sm btn-primary" href="{{url('download/'.$student->student_name.'/'.$image->file_name)}}">
                                                                <i class="fa fa-download"></i> تحميل </a>
                                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale" data-toggle="modal" data-target="#delete_file"
                                                               data-id="{{$image->id}}" data-file_name="{{$image->file_name}}"
                                                               data-student_name="{{$student->student_name}}">
                                                                <i class="fa fa-trash"></i> حذف </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Student Attachment Information -->

                                <!-- Student Fees -->
                                <div class="tab-pane" id="tab3">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table text-md-nowrap" id="example1">
                                                <thead>
                                                    <tr>
                                                        <th class="wd-5p border-bottom-0">#</th>
                                                        <th class="wd-25p border-bottom-0">المبلغ</th>
                                                        <th class="wd-15p border-bottom-0">تاريخ الدفع</th>
                                                        <th class="wd-15p border-bottom-0">ملاحظات</th>
                                                        <th class="wd-30p border-bottom-0">العمليات</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($student->getStudentReceipts as $index => $studentReceipt)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{ number_format($studentReceipt->debit, 2) }} $</td>
                                                        <td>{{ $studentReceipt->date }}</td>
                                                        <td>{{ $studentReceipt->notes }}</td>
                                                        <td>
                                                            <button type="submit" id="receipt_print_btn"
                                                                    class="btn btn-primary btn-sm btn-block print_btn" onclick="receiptPrint()">
                                                                <i class="fa fa-print"></i> طباعه
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Student Fees -->

                                <!-- delete Attachment -->
                                <div class="modal fade" id="delete_file">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content modal-content-demo">
                                            <div class="modal-header">
                                                <h6 class="modal-title">حذف المرفق</h6>
                                                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('delete_photo') }}" method="post">
                                                {{ csrf_field() }}
                                                <div class="modal-body">
                                                    <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                                    <input type="hidden" name="id" id="id" value="">
                                                    <input class="form-control" type="text" name="file_name" id="file_name" value="">
                                                    <input type="hidden" name="student_name" id="student_name" value="">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                                                    <button type="submit" class="btn btn-danger">تاكيد</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- delete Attachment -->

                            </div>
                        </div>
                    </div>
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

    <!-- This For Delete File -->
    <script>
        $('#delete_file').on('show.bs.modal',function (event){
            var button         = $(event.relatedTarget);
            var id             = button.data('id');
            var file_name      = button.data('file_name');
            var student_name   = button.data('student_name');
            var modal          = $(this);

            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #file_name').val(file_name);
            modal.find('.modal-body #student_name').val(student_name);
        })
    </script>
    <!-- This For Delete File -->

    <script>
        function receiptPrint(){
            var content = document.getElementById('tab3').innerHTML;
            document.body.innerHTML = content;
            window.print();
            location.reload();
        }
    </script>
@endsection
