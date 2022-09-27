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
    {{trans('main_sidebar.exams_list')}}
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
                    <a type="button" class="btn btn-success" href="{{ route('tests.create') }}">
                            <i class="ti-plus"></i> اضافه امتحان
                    </a>
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0 text-center">
                        <thead>
                            <tr class="alert-success">
                                <th>#</th>
                                <th>اسم الامتحان</th>
                                <th>اسم المعلم</th>
                                <th>المرحلة الدراسية</th>
                                <th>الصف الدراسي</th>
                                <th>الفصل</th>
                                <th>درجه الامتحان</th>
                                <th>تاريخ وضع الامتحان</th>
                                <th>تاريخ نهاية الامتحان</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach($exams as $exam)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$exam->name}}</td>
                                    <td>{{$exam->getTeachers->teacher_name}}</td>
                                    <td>{{$exam->getGrades->name}}</td>
                                    <td>{{$exam->getChapters->chapter_name}}</td>
                                    <td>{{$exam->getSections->section_name}}</td>
                                    <td>
                                        <span class="badge badge-pill badge-primary">
                                            {{$exam->score}}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge badge-pill badge-success">
                                            {{$exam->date_start}}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge badge-pill badge-danger">
                                            {{$exam->date_end}}
                                        </span>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-info" href="{{ route('tests.edit',$exam->id) }}" title="تعديل">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                           data-id="{{ $exam->id }}" data-name="{{ $exam->name }}"
                                           data-toggle="modal" href="#delete" title="حذف"><i class="fa fa-trash"></i>
                                        </a>
                                        <a class="btn btn-sm btn-primary" href="{{ route('tests.show',$exam->id) }}" title="عرض">
                                            <i class="fa fa-binoculars"></i>
                                        </a>
                                        <a class="btn btn-sm btn-info" href="{{ route('student.degrees',$exam->id) }}" title="عرض">
                                            <i class="fa fa-eye-slash"></i>
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


    <!-- delete Exam -->
    <div class="modal fade" id="delete">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">حذف امتحان</h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('tests.destroy','test') }}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>{{trans('grades_trans.msg_delete_stage')}}</p><br>
                        <input type="hidden" name="id" id="id" value="">
                        <input class="form-control" name="name" id="name" type="text" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('grades_trans.btn_cancel')}}</button>
                        <button type="submit" class="btn btn-danger">{{trans('grades_trans.btn_confirm')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- delete Exam -->

</div>
<!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
    <!-- Internal Modal js-->
    <script src="{{URL::asset('assets/js/modal.js')}}"></script>

    <!-- This For Delete Form -->
    <script>
        $('#delete').on('show.bs.modal',function (event){
            var button         = $(event.relatedTarget)
            var id             = button.data('id')
            var name           = button.data('name')
            var modal          = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
        })
    </script>
    <!-- This For Delete Form -->
@endsection
