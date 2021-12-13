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
    {{trans('main_sidebar.add_student')}}
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
                                <form action="{{ route('student.store') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="content-header" style="margin: 15px 0;">
                                    <h6 class="modal-title text-info">المعلومات الشخصيه</h6>
                                    <hr>
                                </div>
                                <div class="row" style="margin-bottom: 20px;">
                                    <div class="col">
                                        <label for="exampleInputEmail1">اسم الطالب بالعربيه</label>
                                        <input type="text" class="form-control" id="student_name" name="student_name" value="{{old('student_name')}}" required>
                                    </div>
                                    <div class="col">
                                        <label for="exampleInputEmail1">اسم الطالب بالانجليزيه</label>
                                        <input type="text" class="form-control" id="student_name_en" name="student_name_en" value="{{old('student_name_en')}}" required>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 10px;">
                                    <div class="col">
                                        <label for="exampleInputEmail1">البريد الالكتروني</label>
                                        <input type="email" class="form-control" id="student_email" name="student_email" value="{{old('student_email')}}" required>
                                    </div>
                                    <div class="col">
                                        <label for="exampleInputEmail1">كلمه المرور</label>
                                        <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}" required>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 20px;">
                                    <div class="col">
                                        <label for="exampleInputEmail1">النوع</label>
                                        <select class="form-control form-control-lg" id="exampleFormControlSelect1" id="gender_id" name="gender_id">
                                            <option value="">اختر النوع</option>
                                            @foreach ($all_genders as $gender)
                                                <option value="{{ $gender->id }}">{{ $gender->gender_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="exampleInputEmail1">الجنسيه</label>
                                        <select class="form-control form-control-lg" id="exampleFormControlSelect1" id="nationality_id" name="nationality_id">
                                            <option value="">اختر الجنسيه</option>
                                            @foreach ($all_nationality as $nationality)
                                                <option value="{{ $nationality->id }}">{{ $nationality->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="exampleInputEmail1">فصيله الدم</label>
                                        <select class="form-control form-control-lg" id="exampleFormControlSelect1" id="blood_id" name="blood_id">
                                            <option value="">اختر قصيله الدم</option>
                                            @foreach ($all_blood as $blood)
                                                <option value="{{ $blood->id }}">{{ $blood->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 20px;">
                                    <div class="col">
                                        <label for="exampleInputEmail1">ولي الأمر</label>
                                        <select class="form-control form-control-lg" id="exampleFormControlSelect1" id="parent_id" name="parent_id">
                                            <option value="">اختر من القائمه</option>
                                            @foreach ($parents as $parent)
                                                <option value="{{ $parent->id }}">{{ $parent->father_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="exampleInputEmail1">تاريخ الميلاد</label>
                                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{old('date_of_birth')}}" required>
                                    </div>
                                </div>
                                <div class="content-header" style="margin: 15px 0;">
                                    <h6 class="modal-title text-primary">المعلومات الدراسيه</h6>
                                    <hr>
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
                                        <label for="exampleInputEmail1">الفصل</label>
                                        <select class="form-control form-control-lg" id="exampleFormControlSelect1" id="section_id" name="section_id">
                                            <option value="">اختر الفصل</option>
                                            @foreach ($all_sections as $section)
                                                <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="exampleInputEmail1">تاريخ الالتحاق</label>
                                        <input type="date" class="form-control" id="joining_at" name="joining_at" value="{{old('joining_at')}}" required>
                                    </div>
                                    <div class="col">
                                        <label for="exampleInputEmail1">السنه الدراسيه</label>
                                        <select class="form-control form-control-lg" id="exampleFormControlSelect1" id="academic_year" name="academic_year">
                                            <option value="">اختر من القائمه</option>
                                            @php
                                                $current_year = date("Y")
                                            @endphp
                                            @for($year = $current_year; $year <= $current_year + 1; $year++)
                                                <option value="{{ $year }}">{{ $year }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 20px;">
                                    <div class="col-md-12" style="margin-top: 30px;">
                                        <label style="color: red">المرفقات :</label>
                                        <div class="input-group mb-3">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="inputGroupFile01" name="photos[]" accept="image/*" multiple>
                                                <label class="custom-file-label" for="inputGroupFile01">اختر الملفات</label>
                                            </div>
                                        </div>
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
