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
    اضافه فاتوره رسوم للطالب : {{$student->student_name}}
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
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <div class="modal-body">
                                <div style="margin-bottom: 10px;">
                                    <a type="button" class="modal-effect btn btn-primary" href="../student">
                                        <i class="ti-back-left"></i> رجوع للطلاب
                                    </a>
                                </div>
                                <hr>
                                <form action="{{ route('fees_invoices.store','test') }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <div class="card-body">
                                        <div class="repeater">
                                            <div data-repeater-list="fees_invoices_list">
                                                <div data-repeater-item>
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="student_id" class="mr-sm-2">اسم الطالب:</label>
                                                            <div class="box">
                                                                <select name="student_id" id="student_id" class="fancyselect">
                                                                    <option value="{{$student->id}}">{{$student->student_name}}</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <label for="fees_type" class="mr-sm-2">نوع الرسوم:</label>
                                                            <div class="box">
                                                                <select name="fees_type" id="fees_type" class="fancyselect">
                                                                    <option value="" selected disabled>اختر النوع</option>
                                                                    @foreach($fees as $fee)
                                                                        <option value="{{$fee->id}}">{{$fee->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <label for="amount" class="mr-sm-2">المبلغ:</label>
                                                            <div class="box">
                                                                <select name="amount" id="amount" class="fancyselect">
                                                                    <option value="" selected disabled>اختر المبلغ</option>
                                                                    @foreach($fees as $fee)
                                                                        <option value="{{$fee->amount}}">{{$fee->amount}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <label for="description" class="mr-sm-2">الوصف:</label>
                                                            <div class="box">
                                                                <input type="text" class="form-control" name="notes" required>
                                                            </div>
                                                        </div>

                                                        <div class="col" style="margin-top: 35px">
                                                            <input class="btn btn-danger btn-block" data-repeater-delete type="button" value="حذف" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-20">
                                                <div class="col-12">
                                                    <input class="btn btn-success" data-repeater-create type="button" value="اضافه حقل جديد"/>
                                                </div>
                                            </div>
                                            <div class="modal-footer" style="margin-top: 10px">
                                                <button type="submit" class="btn btn-success">تاكيد</button>
                                            </div>
                                        </div>

                                        <input type="hidden" class="form-control" name="grade_id" value="{{$student->grade_id}}" required>
                                        <input type="hidden" class="form-control" name="chapter_id" value="{{$student->chapter_id}}" required>

                                    </div>
                                </form>
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
@endsection
