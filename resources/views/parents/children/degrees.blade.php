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
                                <th>اسم الاختبار</th>
                                <th>الدرجة</th>
                                <th>تاريخ إجراء الاختبار</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($degrees as $index => $degree)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $degree->student->student_name }}</td>
                                    <td>{{ $degree->exam->name }}</td>
                                    <td>
                                        @if($degree->score <= 25)
                                            <span class="badge badge-pill badge-danger">
                                                {{ $degree->score }}
                                            </span>
                                        @elseif($degree->score > 25 && $degree->score <= 60)
                                            <span class="badge badge-pill badge-primary">
                                                {{ $degree->score }}
                                            </span>
                                        @else
                                            <span class="badge badge-pill badge-success">
                                                {{ $degree->score }}
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge badge-pill badge-primary">
                                              {{ $degree->date }}
                                        </span>
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
