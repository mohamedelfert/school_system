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
                <form method="post" action="{{ route('attendance-search') }}">
                    @csrf

                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col">
                            <div class="form-group">
                                <label for="student_id">{{ trans('main_sidebar.students_list') }}</label>
                                <select class="form-control" name="student_id">
                                    <option value="all">الكل</option>
                                    @foreach($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->student_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="from_date">{{ trans('main_sidebar.from_date') }}</label>
                                <input type="text"  class="form-control range-from date-picker-default"
                                       placeholder="تاريخ البداية" required name="from_date">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="to_date">{{ trans('main_sidebar.to_date') }}</label>
                                <input type="text"  class="form-control range-from date-picker-default"
                                       placeholder="تاريخ البداية" required name="to_date">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer" style="margin-top: 10px">
                        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
                        <a class="btn btn-danger" href="{{ route('attendance-reports') }}" title="@lang('main_sidebar.clear')">
                            <i class="fa fa-eraser"></i></a>
                    </div>
                </form>

                @if(isset($attendances))
                    <table id="datatable" class="table table-striped table-bordered p-0 text-center">
                        <thead>
                        <tr class="alert-success">
                            <th>#</th>
                            <th>اسم الطالب</th>
                            <th>المرحلة الدراسية</th>
                            <th>الصف الدراسي</th>
                            <th>الفصل</th>
                            <th>التاريخ</th>
                            <th>الحضور & الغياب</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($attendances as $index => $attendance)
                            <tr>
                                <td>{{$index + 1}}</td>
                                <td>{{$attendance->getStudent->student_name}}</td>
                                <td>{{$attendance->getGrade->name}}</td>
                                <td>{{$attendance->getChapter->chapter_name}}</td>
                                <td>{{$attendance->getSection->section_name}}</td>
                                <td>{{$attendance->attendance_date}}</td>
                                <td>
                                    @if($attendance->attendance_status == 1)
                                        <span class="badge badge-pill badge-success">حضور</span>
                                    @elseif($attendance->attendance_status == 0)
                                        <span class="badge badge-pill badge-danger">غياب</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
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
