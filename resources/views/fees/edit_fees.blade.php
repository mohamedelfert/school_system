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
                                    <a type="button" class="modal-effect btn btn-primary" href="/fees">
                                        <i class="ti-back-left"></i> رجوع للرسوم الدراسيه
                                    </a>
                                </div>
                                <hr>
                                <form action="{{ route('fees.update','test') }}" method="post" enctype="multipart/form-data">
                                    {{ method_field('PUT') }}
                                    {{ csrf_field() }}

                                    <div class="row" style="margin-bottom: 20px;">
                                        <div class="col">
                                            <input type="hidden" name="id" value="{{$fee->id}}">
                                            <label for="exampleInputEmail1">اسم الرسوم بالعربيه</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ $fee->getTranslation('name','ar') }}" required>
                                        </div>
                                        <div class="col">
                                            <label for="exampleInputEmail1">اسم الرسوم بالانجليزيه</label>
                                            <input type="text" class="form-control" id="name_en" name="name_en" value="{{ $fee->getTranslation('name','en') }}" required>
                                        </div>
                                        <div class="col">
                                            <label for="exampleInputEmail1">المبلغ</label>
                                            <input type="number" min="0" class="form-control" id="amount" name="amount" value="{{ $fee->amount }}" required>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 20px;">
                                        <div class="col">
                                            <label for="grade_id">المرحله الدراسيه</label>
                                            <select class="form-control form-control-lg" id="grade_id" name="grade_id">
                                                <option value="">اختر المرحله</option>
                                                @foreach ($all_grades as $grade)
                                                    <option value="{{ $grade->id }}" {{ $fee->grade_id == $grade->id ? 'selected' : '' }}>{{ $grade->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="chapter_id">الصف الدراسي</label>
                                            <select class="form-control form-control-lg" id="chapter_id" name="chapter_id">
                                                <option value="{{ $fee->getChapters->id }}" {{ $fee->chapter_id == $fee->getChapters->id ? 'selected' : '' }}>{{ $fee->getChapters->chapter_name }}</option>
{{--                                                @foreach ($all_chapters as $chapter)--}}
{{--                                                    <option value="{{ $chapter->id }}" {{ $fee->chapter_id == $chapter->id ? 'selected' : '' }}>{{ $chapter->chapter_name }}</option>--}}
{{--                                                @endforeach--}}
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
                                                    <option value="{{ $year }}" {{ $fee->year == $year ? 'selected' : '' }}>{{ $year }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="exampleInputEmail1">نوع الرسوم</label>
                                            <select class="form-control form-control-lg" id="exampleFormControlSelect1" id="fee_type" name="fee_type">
                                                <option value="">اختر النوع</option>
                                                <option value="1" {{ $fee->fee_type === 1 ? 'selected':'' }}>رسوم دراسيه</option>
                                                <option value="2" {{ $fee->fee_type === 2 ? 'selected':'' }}>رسوم الباص</option>
                                                <option value="3" {{ $fee->fee_type === 3 ? 'selected':'' }}>رسوم زي مدرسي</option>
                                                <option value="4" {{ $fee->fee_type === 4 ? 'selected':'' }}>رسوم تسجيل</option>
                                                <option value="5" {{ $fee->fee_type === 5 ? 'selected':'' }}>رسوم اختبار</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="exampleInputEmail1">ملاحظات</label>
                                            <textarea class="form-control" id="notes" name="notes" rows="3">{{ $fee->notes }}</textarea>
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
    <script>
        $(document).ready(function() {
            $('select[name="grade_id"]').on('change', function(){
                let grade_id = $(this).val();
                if(grade_id){
                    $.ajax({
                        url: "{{ url('chapters-name') }}/" + grade_id,
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
                        url: "{{ url('sections-name') }}/" + chapter_id,
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
