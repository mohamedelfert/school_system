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
    تعديل امتحان
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
                        <a type="button" class="btn btn-primary" href="/exams">
                            <i class="ti-back-left"></i>الرجوع للامتحانات
                        </a>
                    </div>
                    <hr>
                    <form action="{{ route('questions.update','test') }}" method="post">
                        {{method_field('PUT')}}
                        {{ csrf_field() }}

                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col">
                                <input type="hidden" name="id" value="{{ $question->id }}">
                                <label for="exampleInputEmail1">السؤال بالعربيه</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ $question->getTranslation('title','ar') }}" required>
                            </div>
                            <div class="col">
                                <label for="exampleInputEmail1">السؤال بالانجليزيه</label>
                                <input type="text" class="form-control" id="title_en" name="title_en" value="{{ $question->getTranslation('title','en') }}" required>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col">
                                <label for="exampleInputEmail1">الاجابات الصحيحه</label>
                                <textarea class="form-control" id="answers" name="answers" rows="3">{{ $question->answers }}</textarea>
                            </div>
                            <div class="col">
                                <label for="exampleInputEmail1">الاجابه الصحيحه</label>
                                <input type="text" class="form-control" id="right_answer" name="right_answer" value="{{ $question->right_answer }}" required>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col">
                                <label for="exampleInputEmail1">الامتحانات</label>
                                <select class="form-control form-control-lg" id="exampleFormControlSelect1" id="exam_id" name="exam_id">
                                    @foreach ($all_exams as $exam)
                                        <option value="{{ $exam->id }}" {{ $question->exam_id == $exam->id ? 'selected':'' }}>{{ $exam->name }} -- ( {{ $exam->getGrades->name .' -> '. $exam->getChapters->chapter_name .' -> '. $exam->getSections->section_name }} )</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="exampleInputEmail1">درجه السؤال</label>
                                <select class="form-control form-control-lg" id="exampleFormControlSelect1" id="score" name="score">
                                    <option value="1" {{ $question->score == 1 ? 'selected':'' }}>1 درجه</option>
                                    <option value="2.5" {{ $question->score == 2.5 ? 'selected':'' }}>2.5 درجه</option>
                                    <option value="5" {{ $question->score == 5 ? 'selected':'' }}>5 درجات</option>
                                    <option value="10" {{ $question->score == 10 ? 'selected':'' }}>10 درجات</option>
                                    <option value="15" {{ $question->score == 15 ? 'selected':'' }}>15 درجات</option>
                                    <option value="20" {{ $question->score == 20 ? 'selected':'' }}>20 درجات</option>
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
