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
    {{trans('main_sidebar.online_classes')}}
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
                    <a type="button" class="btn btn-primary" href="{{ route('online-classes.create') }}">
                            <i class="fa fa-plus-circle"></i> اضافه حصه جديده
                    </a>
                    <a type="button" class="btn btn-info" href="{{ route('indirect.create') }}">
                        <i class="fa fa-plus-circle"></i> اضافه تفاصيل حصه اونلاين
                    </a>
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0 text-center">
                        <thead>
                            <tr class="alert-success">
                                <th>#</th>
                                <th>المرحله الدراسيه</th>
                                <th>الصف الدراسي</th>
                                <th>الفصل</th>
                                <th>اسم المعلم</th>
                                <th>عنوان الحصه</th>
                                <th>تاريخ البدايه</th>
                                <th>وقت الحصه</th>
                                <th>رابط الحصه</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach($onlineClasses as $online)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$online->getGrades->name}}</td>
                                    <td>{{$online->getChapters->chapter_name}}</td>
                                    <td>{{$online->getSections->section_name}}</td>
                                    <td>{{$online->getUsers->name}}</td>
                                    <td>{{$online->topic}}</td>
                                    <td>{{$online->start_at}}</td>
                                    <td>{{$online->duration}}</td>
                                    <td>
                                        <span class="badge badge-pill badge-primary">
                                            <a href="{{$online->join_url}}" target="_blank">انضم الان</a>
                                        </span>
                                    </td>
                                    <td>
                                        @if($online->integration == true)
                                            <a class="btn btn-info btn-sm" href="{{route('online_classes.edit',$online->meeting_id)}}" title="تعديل">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @elseif($online->integration == false)
                                            <a class="btn btn-warning btn-sm" href="{{route('online_classes.edit',$online->meeting_id)}}" title="تعديل">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endif
                                        <a class="modal-effect btn btn-danger btn-sm" data-effect="effect-scale"
                                           data-id="{{ $online->id }}" data-meeting_id="{{ $online->meeting_id }}"
                                           data-topic="{{ $online->topic }}" data-toggle="modal" href="#delete"
                                           title="حذف"><i class="fa fa-trash"></i>
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


    <!-- delete online class -->
    <div class="modal fade" id="delete">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">حذف حصه اونلاين</h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{route('online-classes.destroy','test')}}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>{{trans('grades_trans.msg_delete_stage')}}</p><br>
                        <input type="hidden" name="id" id="id" value="">
                        <input type="hidden" name="meeting_id" id="meeting_id" value="">
                        <input class="form-control" name="topic" id="topic" type="text" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('grades_trans.btn_cancel')}}</button>
                        <button type="submit" class="btn btn-danger">{{trans('grades_trans.btn_confirm')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- delete online class -->

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
            var meeting_id     = button.data('meeting_id')
            var topic          = button.data('topic')
            var modal          = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #meeting_id').val(meeting_id);
            modal.find('.modal-body #topic').val(topic);
        })
    </script>
    <!-- This For Delete Form -->
@endsection
