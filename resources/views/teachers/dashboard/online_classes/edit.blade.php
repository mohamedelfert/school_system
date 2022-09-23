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
    تعديل حصه اونلاين
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
                        <a type="button" class="btn btn-primary" href="/online-classes">
                            <i class="ti-back-left"></i>الرجوع للحصص الاونلاين
                        </a>
                    </div>
                    <hr>
                    <form action="{{ route('online-classes.update','test') }}" method="post">
                        {{method_field('PUT')}}
                        {{ csrf_field() }}

                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col">
                                <input type="hidden" name="meeting_id" value="{{ $onlineClass->meeting_id }}">
                                <label for="grade_id">المرحله الدراسيه</label>
                                <select class="form-control form-control-lg" id="grade_id" name="grade_id">
                                    <option value="">اختر المرحله</option>
                                    @foreach ($grades as $grade)
                                        <option value="{{ $grade->id }}" {{ $onlineClass->grade_id == $grade->id ? 'selected':'' }}>{{ $grade->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="chapter_id">الصف الدراسي</label>
                                <select class="form-control form-control-lg" id="chapter_id" name="chapter_id">
                                    <option value="{{ $onlineClass->getChapters->id }}" {{ $onlineClass->chapter_id == $onlineClass->getChapters->id ? 'selected':'' }}>{{ $onlineClass->getChapters->chapter_name }}</option>
{{--                                    @foreach ($all_chapters as $chapter)--}}
{{--                                        <option value="{{ $chapter->id }}" {{ $onlineClass->chapter_id == $chapter->id ? 'selected':'' }}>{{ $chapter->chapter_name }}</option>--}}
{{--                                    @endforeach--}}
                                </select>
                            </div>
                            <div class="col">
                                <label for="exampleInputEmail1">الفصل</label>
                                <select class="form-control form-control-lg" id="exampleFormControlSelect1" id="section_id" name="section_id">
                                    <option value="{{ $onlineClass->getSections->id }}" {{ $onlineClass->section_id == $onlineClass->getSections->id ? 'selected':'' }}>{{ $onlineClass->getSections->section_name }}</option>
{{--                                    @foreach ($all_sections as $section)--}}
{{--                                        <option value="{{ $section->id }}" {{ $onlineClass->section_id == $section->id ? 'selected':'' }}>{{ $section->section_name }}</option>--}}
{{--                                    @endforeach--}}
                                </select>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col">
                                <label for="exampleInputEmail1">عنوان الحصه</label>
                                <input type="text" class="form-control" id="topic" name="topic" value="{{ $onlineClass->topic }}" required>
                            </div>
                            <div class="col">
                                <label for="exampleInputEmail1">تاريخ ووقت الحصه</label>
                                <input type="datetime-local" class="form-control" id="start_at" name="start_at" value="{{ $onlineClass->start_at }}" required>
                            </div>
                            <div class="col">
                                <label for="exampleInputEmail1">مده الحصه بالدقائق</label>
                                <input type="text" class="form-control" id="duration" name="duration" value="{{ $onlineClass->duration }}" required>
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
