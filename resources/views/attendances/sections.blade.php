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
    {{trans('main_sidebar.student_list_attendance')}}
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
                <div class="accordion gray plus-icon round">
                    @foreach($grades_by_sections as $grade)
                        <div class="acd-group">
                            <a href="#" class="acd-heading">{{$grade->name}}</a>
                            <div class="acd-des">
                                <div class="row">
                                    <div class="col-xl-12 mb-30">
                                        <div class="card card-statistics h-100">
                                            <div class="card-body">
                                                <div class="d-block d-md-flex justify-content-between">
                                                    <div class="d-block"></div>
                                                </div>
                                                <div class="table-responsive mt-15">
                                                    <table class="table center-aligned-table mb-0 text-center">
                                                        <thead>
                                                            <tr class="text-dark">
                                                                <th>#</th>
                                                                <th>اسم الفصل</th>
                                                                <th>اسم الصف</th>
                                                                <th>الحاله</th>
                                                                <th>عرض</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $i = 1 ;?>
                                                            @foreach($grade->getSections as $list_section)
                                                                <tr class="text-dark">
                                                                    <td>{{$i++}}</td>
                                                                    <td>{{$list_section->section_name}}</td>
                                                                    <td>{{$list_section->getChapters->chapter_name}}</td>
                                                                    <td>
                                                                        <span class="badge badge-pill badge-{{$list_section->status === 1 ? 'success':'danger'}}">
                                                                            {{$list_section->status === 1 ? 'نشط':'غير نشط'}}
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <a class="btn btn-warning btn-sm" href="{{route('attendances.show',$list_section->id)}}">
                                                                            <i class="fa fa-eye"> قائمه الطلاب </i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
