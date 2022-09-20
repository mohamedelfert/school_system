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
    {{$title}}
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
                    <a type="button" class="btn btn-primary" href="/tests">
                            <i class="ti-back-left"></i>الرجوع للامتحانات
                    </a>
                </div>
                <hr>
                <form action="{{ route('tests.store') }}" method="post">
                    {{ csrf_field() }}

                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col">
                            <label for="name">اسم الامتحان بالعربية</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                        </div>
                        <div class="col">
                            <label for="name_en">اسم الامتحان بالانجليزي</label>
                            <input type="text" class="form-control" id="name_en" name="name_en" value="{{ old('name_en') }}" required>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col">
                            <label for="exampleInputEmail1">المواد الدراسية</label>
                            <select class="form-control form-control-lg" id="exampleFormControlSelect1" id="subject_id" name="subject_id">
                                <option value="">اختر المادة</option>
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="exampleInputEmail1">المرحلة الدراسية</label>
                            <select class="form-control form-control-lg" id="exampleFormControlSelect1" id="grade_id" name="grade_id">
                                <option value="">اختر المرحلة</option>
                                @foreach ($grades as $grade)
                                    <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="exampleInputEmail1">الصف الدراسي</label>
                            <select class="form-control form-control-lg" id="exampleFormControlSelect1" id="chapter_id" name="chapter_id">
                                <option value="">اختر الصف</option>
                                @foreach ($chapters as $chapter)
                                    <option value="{{ $chapter->id }}">{{ $chapter->chapter_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="exampleInputEmail1">الفصل</label>
                            <select class="form-control form-control-lg" id="exampleFormControlSelect1" id="section_id" name="section_id">
                                <option value="">اختر الفصل</option>
                                @foreach ($sections as $section)
                                    <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="exampleInputEmail1">درجه الامتحان</label>
                            <select class="form-control form-control-lg" id="exampleFormControlSelect1" id="score" name="score">
                                <option value="">اختر الدرجة</option>
                                <option value="25">25 درجه</option>
                                <option value="50">50 درجه</option>
                                <option value="100">100 درجه</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="exampleInputEmail1">تاريخ وضع الامتحان</label>
                            <input type="date" class="form-control" id="date_start" name="date_start" value="{{old('date_start')}}" required>
                        </div>
                        <div class="col">
                            <label for="exampleInputEmail1">تاريخ نهاية الامتحان</label>
                            <input type="date" class="form-control" id="date_end" name="date_end" value="{{old('date_end')}}" required>
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
