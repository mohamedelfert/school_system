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
                    <form action="{{ route('tests.update','test') }}" method="post">
                        {{method_field('PUT')}}
                        {{ csrf_field() }}

                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col">
                                <input type="hidden" name="id" value="{{ $exam->id }}">
                                <label for="exampleInputEmail1">اسم الامتحان بالعربيه</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $exam->getTranslation('name','ar') }}" required>
                            </div>
                            <div class="col">
                                <label for="exampleInputEmail1">اسم الامتحان بالانجليزيه</label>
                                <input type="text" class="form-control" id="name_en" name="name_en" value="{{ $exam->getTranslation('name','en') }}" required>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col">
                                <label for="exampleInputEmail1">المواد الدراسيه</label>
                                <select class="form-control form-control-lg" id="exampleFormControlSelect1" id="subject_id" name="subject_id">
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}" {{ $exam->subject_id == $subject->id ? 'selected':'' }}>{{ $subject->subject_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="grade_id">المرحله الدراسيه</label>
                                <select class="form-control form-control-lg" id="grade_id" name="grade_id">
                                    @foreach ($grades as $grade)
                                        <option value="{{ $grade->id }}" {{ $exam->grade_id == $grade->id ? 'selected':'' }}>{{ $grade->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="chapter_id">الصف الدراسي</label>
                                <select class="form-control form-control-lg" id="chapter_id" name="chapter_id">
                                    <option value="{{ $exam->getChapters->id }}" {{ $exam->chapter_id == $exam->getChapters->id ? 'selected':'' }}>{{ $exam->getChapters->chapter_name }}</option>
{{--                                    @foreach ($chapters as $chapter)--}}
{{--                                        <option value="{{ $chapter->id }}" {{ $exam->chapter_id == $chapter->id ? 'selected':'' }}>{{ $chapter->chapter_name }}</option>--}}
{{--                                    @endforeach--}}
                                </select>
                            </div>
                            <div class="col">
                                <label for="section_id">الفصل</label>
                                <select class="form-control form-control-lg" id="section_id" name="section_id">
                                    <option value="{{ $exam->getSections->id }}" {{ $exam->section_id == $exam->getSections->id ? 'selected':'' }}>{{ $exam->getSections->section_name }}</option>
{{--                                    @foreach ($sections as $section)--}}
{{--                                        <option value="{{ $section->id }}" {{ $exam->section_id == $section->id ? 'selected':'' }}>{{ $section->section_name }}</option>--}}
{{--                                    @endforeach--}}
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="exampleInputEmail1">درجه الامتحان</label>
                                <select class="form-control form-control-lg" id="exampleFormControlSelect1" id="score" name="score">
                                    <option value="25" {{ $exam->score == 25 ? 'selected':'' }}>25 درجه</option>
                                    <option value="50" {{ $exam->score == 50 ? 'selected':'' }}>50 درجه</option>
                                    <option value="100" {{ $exam->score == 100 ? 'selected':'' }}>100 درجه</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="exampleInputEmail1">تاريخ وضع الامتحان</label>
                                <input type="date" class="form-control" id="date_start" name="date_start" value="{{ $exam->date_start }}" required>
                            </div>
                            <div class="col">
                                <label for="exampleInputEmail1">تاريخ نهايه الامتحان</label>
                                <input type="date" class="form-control" id="date_end" name="date_end" value="{{ $exam->date_end }}" required>
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
    <script>
        $(document).ready(function() {
            $('select[name="grade_id"]').on('change', function(){
                let grade_id = $(this).val();
                if(grade_id){
                    $.ajax({
                        url: "{{ url('chapters') }}/" + grade_id,
                        type: "GET",
                        dataType: "json",
                        success:function(data){
                            $('select[name="chapter_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="chapter_id"]').append(`<option value="${key}">${value}</option>`);
                            });
                        },
                    });
                }else{
                    console.log('Ajax Load Failed');
                }
            });

            $('select[name="chapter_id"]').on('change', function(){
                let chapter_id = $(this).val();
                if(chapter_id){
                    $.ajax({
                        url: "{{ url('sections') }}/" + chapter_id,
                        type: "GET",
                        dataType: "json",
                        success:function(data){
                            $('select[name="section_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="section_id"]').append(`<option value="${key}">${value}</option>`);
                            });
                        },
                    });
                }else{
                    console.log('Ajax Load Failed');
                }
            });
        });
    </script>
@endsection
