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
    {{ trans('main_sidebar.settings') }}
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
                    <a type="button" class="btn btn-primary" href="/dashboard">
                            <i class="ti-back-left"></i>الرجوع للرئيسيه
                    </a>
                </div>
                <hr>
                <form action="{{ route('setting.update','test') }}" method="post" enctype="multipart/form-data">
                    {{method_field('PUT')}}
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-md-6 border-right-2 border-right-blue-400">
                            <div class="form-group row">
                                <input type="hidden" name="id" value="{{ $settings->id }}">
                                <label class="col-lg-2 col-form-label font-weight-semibold">اسم المدرسة<span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="school_name" value="{{ $settings->school_name }}" required placeholder="اسم المدرسه">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="current_session" class="col-lg-2 col-form-label font-weight-semibold">العام الحالي<span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <select  required name="current_session" id="current_session" class="select-search form-control">
                                        @for($y = date('Y', strtotime('- 3 years')); $y <= date('Y', strtotime('+ 1 years')); $y++)
                                            <option {{ ($settings->current_session == (($y -= 1) . '-' . ($y += 1))) ? 'selected' : '' }}>{{ ($y -= 1) . '-' . ($y += 1) }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label font-weight-semibold">اسم المدرسة المختصر</label>
                                <div class="col-lg-9">
                                    <input name="school_title" value="{{ $settings->school_title }}" type="text" class="form-control" placeholder="اسم المدرسه المختصر">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label font-weight-semibold">الهاتف</label>
                                <div class="col-lg-9">
                                    <input name="phone" value="{{ $settings->phone }}" type="text" class="form-control" placeholder="هاتف المدرسه">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label font-weight-semibold">البريد الالكتروني</label>
                                <div class="col-lg-9">
                                    <input name="school_email" value="{{ $settings->school_email }}" type="email" class="form-control" placeholder="البريد الالكتروني">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label font-weight-semibold">عنوان المدرسة<span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input required name="address" value="{{ $settings->address }}" type="text" class="form-control" placeholder="عنوان المدرسه">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label font-weight-semibold">نهاية الترم الاول</label>
                                <div class="col-lg-9">
                                    <input name="end_first_term" value="{{ $settings->end_first_term }}" type="text" class="form-control date-pick" placeholder="تاريخ نهايه الترم الاول">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label font-weight-semibold">نهاية الترم الثاني</label>
                                <div class="col-lg-9">
                                    <input name="end_second_term" value="{{ $settings->end_second_term }}" type="text" class="form-control date-pick" placeholder="تاريخ نهايه الترم الثاني">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label font-weight-semibold">شعار المدرسة</label>
                                <div class="col-lg-9">
                                    <div class="mb-3">
                                        <img width="100px" height="100px" src="{{ URL::asset('attachments/logo/'.$settings->logo) }}" alt="شعار المدرسه">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="inputGroupFile01" accept="image/*" name="logo">
                                            <label class="custom-file-label" for="inputGroupFile01">اختر الملف</label>
                                        </div>
                                    </div>
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
<!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
