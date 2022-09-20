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
    اضافه سؤال جديد
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
                    <a type="button" class="btn btn-primary" href="{{ route('tests.show',$exam->id) }}">
                            <i class="ti-back-left"></i>الرجوع للاسئله
                    </a>
                </div>
                <hr>
                <form action="{{ route('test-questions.store') }}" method="post">
                    {{ csrf_field() }}

                    <input type="hidden" id="exam_id" name="exam_id" value="{{ $exam->id }}">
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col">
                            <label for="exampleInputEmail1">السؤال بالعربيه</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}" required>
                        </div>
                        <div class="col">
                            <label for="exampleInputEmail1">السؤال بالانجليزيه</label>
                            <input type="text" class="form-control" id="title_en" name="title_en" value="{{old('title_en')}}" required>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col">
                            <label for="exampleInputEmail1">الاجابات</label>
                            <textarea class="form-control" id="answers" name="answers" rows="3">{{old('answers')}}</textarea>
                        </div>
                        <div class="col">
                            <label for="exampleInputEmail1">الاجابه الصحيحه</label>
                            <input type="text" class="form-control" id="right_answer" name="right_answer" value="{{old('right_answer')}}" required>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col">
                            <label for="exampleInputEmail1">درجه السؤال</label>
                            <select class="form-control form-control-lg" id="exampleFormControlSelect1" id="score" name="score">
                                <option value="">اختر الدرجه</option>
                                <option value="1">1 درجه</option>
                                <option value="2.5">2.5 درجه</option>
                                <option value="5">5 درجات</option>
                                <option value="10">10 درجات</option>
                                <option value="15">15 درجات</option>
                                <option value="20">20 درجات</option>
                            </select>
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
<!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
