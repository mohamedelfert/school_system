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
                    <a type="button" class="btn btn-primary" href="/subjects">
                            <i class="ti-back-left"></i>الرجوع للمواد
                    </a>
                </div>
                <hr>
                <form action="{{ route('subjects.update','test') }}" method="post">
                    {{method_field('PUT')}}
                    {{ csrf_field() }}

                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col">
                            <input type="hidden" name="id" value="{{$subject->id}}">
                            <label for="exampleInputEmail1">اسم الماده بالعربيه</label>
                            <input type="text" class="form-control" id="subject_name" name="subject_name" value="{{$subject->getTranslation('subject_name','ar')}}" required>
                        </div>
                        <div class="col">
                            <label for="exampleInputEmail1">اسم الماده بالانجليزيه</label>
                            <input type="text" class="form-control" id="subject_name_en" name="subject_name_en" value="{{$subject->getTranslation('subject_name','en')}}" required>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col">
                            <label for="exampleInputEmail1">المرحله الدراسيه</label>
                            <select class="form-control form-control-lg" id="exampleFormControlSelect1" id="grade_id" name="grade_id">
                                <option value="">اختر المرحله</option>
                                @foreach ($all_grades as $grade)
                                    <option value="{{ $grade->id }}" {{$subject->grade_id == $grade->id ? 'selected':''}}>{{ $grade->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="exampleInputEmail1">الصف الدراسي</label>
                            <select class="form-control form-control-lg" id="exampleFormControlSelect1" id="chapter_id" name="chapter_id">
                                <option value="">اختر الصف</option>
                                @foreach ($all_chapters as $chapter)
                                    <option value="{{ $chapter->id }}" {{$subject->chapter_id == $chapter->id ? 'selected':''}}>{{ $chapter->chapter_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="exampleInputEmail1">معلم الماده</label>
                            <select class="form-control form-control-lg" id="exampleFormControlSelect1" id="teacher_id" name="teacher_id">
                                <option value="">اختر المعلم</option>
                                @foreach ($all_teachers as $teacher)
                                    <option value="{{ $teacher->id }}" {{$subject->teacher_id == $teacher->id ? 'selected':''}}>{{ $teacher->teacher_name }}  --  ( {{ $teacher->getSpecialization->name }} )</option>
                                @endforeach
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
