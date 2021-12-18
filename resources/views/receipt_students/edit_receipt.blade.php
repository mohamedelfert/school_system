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
    تعديل سند قبض للطالب : {{$receipt->getStudent->student_name}}
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
                                    <a type="button" class="modal-effect btn btn-primary" href="/receipt_students">
                                        <i class="ti-back-left"></i> رجوع لسندات القبض
                                    </a>
                                </div>
                                <hr>
                                <form action="{{ route('receipt_students.update','test') }}" method="post" enctype="multipart/form-data">
                                    {{method_field('PUT')}}
                                    {{ csrf_field() }}

                                    <div class="row" style="margin-bottom: 20px;">
                                        <div class="col">
                                            <label for="exampleInputEmail1">المبلغ</label>
                                            <input type="hidden" class="form-control" name="id" value="{{$receipt->id}}" required>
                                            <input type="hidden" class="form-control" name="student_id" value="{{$receipt->student_id}}" required>
                                            <input type="number" min="0" class="form-control" id="amount" name="amount" value="{{$receipt->debit}}" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="exampleInputEmail1">ملاحظات</label>
                                            <textarea class="form-control" id="notes" name="notes" rows="3">{{$receipt->notes}}</textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">{{trans('grades_trans.btn_confirm')}}</button>
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
