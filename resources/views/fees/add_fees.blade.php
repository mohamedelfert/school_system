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
    {{trans('main_sidebar.study_fees')}}
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
                                    <a type="button" class="modal-effect btn btn-primary" href="../fees">
                                        <i class="ti-back-left"></i> رجوع للرسوم الدراسيه
                                    </a>
                                </div>
                                <hr>
                                <form action="{{ route('fees.store') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="row" style="margin-bottom: 20px;">
                                    <div class="col">
                                        <label for="exampleInputEmail1">اسم الرسوم بالعربيه</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" required>
                                    </div>
                                    <div class="col">
                                        <label for="exampleInputEmail1">اسم الرسوم بالانجليزيه</label>
                                        <input type="text" class="form-control" id="name_en" name="name_en" value="{{old('name_en')}}" required>
                                    </div>
                                    <div class="col">
                                        <label for="exampleInputEmail1">المبلغ</label>
                                        <input type="number" min="0" class="form-control" id="amount" name="amount" value="{{old('amount')}}" required>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 20px;">
                                    <div class="col">
                                        <label for="exampleInputEmail1">المرحله الدراسيه</label>
                                        <select class="form-control form-control-lg" id="exampleFormControlSelect1" id="grade_id" name="grade_id">
                                            <option value="">اختر المرحله</option>
                                            @foreach ($all_grades as $grade)
                                                <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="exampleInputEmail1">الصف الدراسي</label>
                                        <select class="form-control form-control-lg" id="exampleFormControlSelect1" id="chapter_id" name="chapter_id">
                                            <option value="">اختر الصف</option>
                                            @foreach ($all_chapters as $chapter)
                                                <option value="{{ $chapter->id }}">{{ $chapter->chapter_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="exampleInputEmail1">السنه الدراسيه</label>
                                        <select class="form-control form-control-lg" id="exampleFormControlSelect1" id="year" name="year">
                                            <option value="">اختر من القائمه</option>
                                            @php
                                                $current_year = date("Y")
                                            @endphp
                                            @for($year = $current_year; $year <= $current_year + 1; $year++)
                                                <option value="{{ $year }}">{{ $year }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="exampleInputEmail1">نوع الرسوم</label>
                                        <select class="form-control form-control-lg" id="exampleFormControlSelect1" id="fee_type" name="fee_type">
                                            <option value="">اختر النوع</option>
                                                <option value="1">رسوم دراسيه</option>
                                                <option value="2">رسوم الباص</option>
                                                <option value="3">رسوم زي مدرسي</option>
                                                <option value="4">رسوم تسجيل</option>
                                                <option value="5">رسوم اختبار</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="exampleInputEmail1">ملاحظات</label>
                                        <textarea class="form-control" id="notes" name="notes" rows="3">{{old('notes')}}</textarea>
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

    {{-- Start This Ajax Code To Get Chapter Name And ID --}}
    <script>
        $(document).ready(function () {
            $('select[name="grade_id"]').on('change', function () {
                var grade_id = $(this).val();
                if (grade_id) {
                    $.ajax({
                        url: "{{ URL::to('chapter') }}/" + grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="chapter_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="chapter_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
    {{-- Start This Ajax Code To Get Chapter Name And ID --}}

    {{-- Start This Ajax Code To Get Section Name And ID --}}
    <script>
        $(document).ready(function () {
            $('select[name="chapter_id"]').on('change', function () {
                var chapter_id = $(this).val();
                if (chapter_id) {
                    $.ajax({
                        url: "{{ URL::to('section') }}/" + chapter_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="section_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="section_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
    {{-- Start This Ajax Code To Get Section Name And ID --}}
@endsection
