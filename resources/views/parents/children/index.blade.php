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
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0 text-center">
                        <thead>
                            <tr class="alert-success">
                                <th>#</th>
                                <th>اسم الطالب</th>
                                <th>البريد الإلكتروني</th>
                                <th>النوع</th>
                                <th>المرحلة الدراسية</th>
                                <th>الصف الدراسي</th>
                                <th>الفصل</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $index => $student)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $student->student_name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->getGenders->gender_name }}</td>
                                    <td>{{ $student->getGrades->name }}</td>
                                    <td>{{ $student->getChapters->chapter_name }}</td>
                                    <td>{{ $student->getSections->section_name }}</td>
                                    <td>
                                        <a href="{{ route('children.results',$student->id) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye text-warning"></i>
                                            <span class="right-nav-text"></span>مشاهده درجات الاختبارات</a>
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
<!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
    <!-- Internal Modal js-->
@endsection
