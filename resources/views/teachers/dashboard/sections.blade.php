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
    {{trans('main_sidebar.sections_list')}}
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
                    <table id="datatable" class="table table-striped table-bordered p-0 text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم المرحلة</th>
                                <th>اسم القسم</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($sections as $index => $section)
                            <tr>
                                <td>{{ $index + 1 }}</td>
{{--                                <td>{{ $section->getChapters->getGrades->name }}</td>--}}{{-- OR--}}
                                <td>{{ $section->getGrades->name }}</td>
                                <td>{{ $section->section_name }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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
    <!-- Internal Modal js-->
    <script src="{{URL::asset('assets/js/modal.js')}}"></script>
@endsection
