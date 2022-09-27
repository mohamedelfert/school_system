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
                                <th>رقم اخر سؤال</th>
                                <th>الدرجة</th>
                                <th>التلاعب</th>
                                <th>تاريخ إجراء الامتحان</th>
                                <th>العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; ?>
                            @foreach($degrees as $degree)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $degree->student->student_name }}</td>
                                    <td>{{ $degree->question_id }}</td>
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
                                        @if($degree->abuse == 0)
                                            <span class="badge badge-pill badge-success">
                                            {{ $degree->abuse }}
                                        </span>
                                        @else
                                            <span class="badge badge-pill badge-danger">
                                            {{ $degree->abuse }}
                                        </span>
                                        @endif
                                    </td>
                                    <td>{{ $degree->date }}</td>
                                    <td>
                                        @if($degree->abuse == 0)
                                            <a class="modal-effect btn btn-sm btn-primary" data-effect="effect-scale"
                                               data-toggle="modal" href="#" title="إعادة" disabled>
                                                <i class="fa fa-repeat"></i>
                                            </a>
                                        @else
                                            <a class="modal-effect btn btn-sm btn-primary" data-effect="effect-scale"
                                               data-toggle="modal" href="#repeat{{ $degree->exam_id }}" title="إعادة">
                                                <i class="fa fa-repeat"></i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>

                                <!-- repeat Exam -->
                                <div class="modal fade" id="repeat{{ $degree->exam_id }}">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content modal-content-demo">
                                            <div class="modal-header">
                                                <h6 class="modal-title">إعادة امتحان</h6>
                                                <button aria-label="Close" class="close" data-dismiss="modal"
                                                        type="button"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <form action="{{ route('test.repeat','test') }}" method="post">
                                                {{ method_field('POST') }}
                                                {{ csrf_field() }}
                                                <div class="modal-body">
                                                    <p>فتح إعادة الامتحان</p><br>
                                                    <input type="hidden" name="exam_id" id="exam_id" value="{{ $degree->exam_id }}">
                                                    <input type="hidden" name="student_id" id="student_id" value="{{ $degree->student_id }}">
                                                    <input class="form-control" name="student_name" id="student_name"
                                                           value="{{ $degree->student->student_name }}" type="text"
                                                           readonly>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{trans('grades_trans.btn_cancel')}}</button>
                                                    <button type="submit"
                                                            class="btn btn-danger">{{trans('grades_trans.btn_confirm')}}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- repeat Exam -->

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
@endsection
