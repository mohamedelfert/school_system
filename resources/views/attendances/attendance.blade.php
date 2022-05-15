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
    قائمه الحضور والغياب للطلاب
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
                <div class="text-danger" style="margin-bottom: 10px;font-size: large;font-weight: bold;font-family: 'Cairo', sans-serif">
                    تاريخ اليوم : {{date('Y-m-d')}}
                </div>
                <hr>
                <form method="post" action="{{ route('attendances.store') }}">
                    @csrf

                    <table id="datatable" class="table table-striped table-bordered p-0 text-center">
                        <thead>
                            <tr class="alert-success">
                                <th>#</th>
                                <th>اسم الطالب</th>
                                <th>البريد الالكتروني</th>
                                <th>النوع</th>
                                <th>المرحله الدراسيه</th>
                                <th>الصف الدراسي</th>
                                <th>الفصل</th>
                                <th>الحضور & الغياب</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach($students as $student)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$student->student_name}}</td>
                                    <td>{{$student->email}}</td>
                                    <td>{{$student->getGenders->gender_name}}</td>
                                    <td>{{$student->getGrades->name}}</td>
                                    <td>{{$student->getChapters->chapter_name}}</td>
                                    <td>{{$student->getSections->section_name}}</td>
                                    <td>
                                        @if(isset($student->getAttendances()->where('attendance_date',date('Y-m-d'))->first()->student_id))
                                            <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                                <input name="attendances[{{ $student->id }}]"
                                                       {{$student->getAttendances()->where('attendance_date',date('Y-m-d'))->first()->attendance_status == true ? 'checked':''}}
                                                       class="leading-tight" type="radio"
                                                       value="presence" disabled>
                                                <span class="text-success">حضور</span>
                                            </label>
                                            <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                                <input name="attendances[{{ $student->id }}]"
                                                       {{$student->getAttendances()->where('attendance_date',date('Y-m-d'))->first()->attendance_status == false ? 'checked':''}}
                                                       class="leading-tight" type="radio"
                                                       value="absence" disabled>
                                                <span class="text-danger">غياب</span>
                                            </label>
                                        @else
                                            <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                                <input name="attendances[{{ $student->id }}]" class="leading-tight" type="radio"
                                                       value="presence">
                                                <span class="text-success">حضور</span>
                                            </label>
                                            <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                                <input name="attendances[{{ $student->id }}]" class="leading-tight" type="radio"
                                                       value="absence">
                                                <span class="text-danger">غياب</span>
                                            </label>
                                        @endif

                                            <input type="hidden" class="form-control" name="student_id[]" value="{{@$student->id}}" required>
                                            <input type="hidden" class="form-control" name="grade_id" value="{{@$student->grade_id}}" required>
                                            <input type="hidden" class="form-control" name="chapter_id" value="{{@$student->chapter_id}}" required>
                                            <input type="hidden" class="form-control" name="section_id" value="{{@$student->section_id}}" required>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="modal-footer" style="margin-top: 10px">
                        <button type="submit" name="submit" class="btn btn-success">تاكيد</button>
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
    <!-- Internal Modal js-->
    <script src="{{URL::asset('assets/js/modal.js')}}"></script>
@endsection
