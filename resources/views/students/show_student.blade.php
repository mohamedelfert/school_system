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
                <div class="table-responsive">
                    <div class="container rounded bg-white mt-5 mb-5">
                        <div class="row">
                            <div class="col-md-2 border-right">
                                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                    <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                                    <span class="font-weight-bold">{{ $student->student_name }}</span>
                                    <span class="text-black-50">{{ $student->student_email }}</span>
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
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <label class="labels">النوع</label>
                                            <input type="text" class="form-control" placeholder="{{ $student->getGenders->gender_name }}" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="labels">الجنسيه</label>
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
                                        <h4 class="text-right text-info">البيانات الدراسيه</h4>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <label class="labels">تاريخ الالتحاق</label>
                                            <input type="text" class="form-control" placeholder="{{ $student->joining_at }}" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="labels">السنه الدراسيه</label>
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
                                    <div class="col-md-6 border-right" style="float: right;margin-top: 20px;">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h4 class="text-right text-warning">المواد الدراسيه</h4>
                                        </div>
                                        <div class="row mt-2">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">Cras justo odio</li>
                                                <li class="list-group-item">Dapibus ac facilisis in</li>
                                                <li class="list-group-item">Morbi leo risus</li>
                                                <li class="list-group-item">Porta ac consectetur ac</li>
                                                <li class="list-group-item">Vestibulum at eros</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6" style="float: left;margin-top: 20px;">
                                        <div class="d-flex justify-content-between align-items-center mb-3"">
                                            <h4 class="text-right text-danger">درجات المواد</h4>
                                        </div>
                                        <div class="row mt-2">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">Cras justo odio</li>
                                                <li class="list-group-item">Dapibus ac facilisis in</li>
                                                <li class="list-group-item">Morbi leo risus</li>
                                                <li class="list-group-item">Porta ac consectetur ac</li>
                                                <li class="list-group-item">Vestibulum at eros</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
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
@endsection
