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
    {{trans('main_sidebar.management_promotion')}}
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
                        <a type="button" class="modal-effect btn btn-primary" href="../student">
                            <i class="ti-back-left"></i> رجوع للطلاب
                        </a>
                        <a type="button" class="modal-effect btn btn-danger" data-toggle="modal"
                           href="#delete_all" data-effect="effect-scale">
                            <i class="fas fa-trash-undo-alt"></i> تراجع للكل
                        </a>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0 text-center">
                            <thead>
                            <tr>
                                <th class="alert-primary">#</th>
                                <th class="alert-primary">اسم الطالب</th>
                                <th class="alert-danger">المرحله السابقه</th>
                                <th class="alert-danger">الصف السابق</th>
                                <th class="alert-danger">الفصل السابق</th>
                                <th class="alert-danger">السنه الدراسيه السابقه</th>
                                <th class="alert-success">المرحله الحاليه</th>
                                <th class="alert-success">الصف الحالي</th>
                                <th class="alert-success">الفصل الحالي</th>
                                <th class="alert-success">السنه الدراسيه الحاليه</th>
                                <th class="alert-info">العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i = 1; @endphp
                            @foreach($promotions as $promotion)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $promotion->getStudents->student_name }}</td>
                                    <td>{{ $promotion->fromGrades->name }}</td>
                                    <td>{{ $promotion->fromChapters->chapter_name }}</td>
                                    <td>{{ $promotion->fromSections->section_name }}</td>
                                    <td>{{ $promotion->academic_year }}</td>
                                    <td>{{ $promotion->toGrades->name }}</td>
                                    <td>{{ $promotion->toChapters->chapter_name }}</td>
                                    <td>{{ $promotion->toSections->section_name }}</td>
                                    <td>{{ $promotion->academic_year_new }}</td>
                                    <td>
                                        <a class="modal-effect btn btn-info btn-sm" href=""
                                           title="تخرج"><i class="fa fa-graduation-cap"></i>
                                        </a>
                                        <a class="modal-effect btn btn-danger btn-sm" data-effect="effect-scale"
                                           data-id="{{ $promotion->id }}" data-student_name="{{ $promotion->getStudents->student_name }}"
                                           data-toggle="modal" href="#delete" title="تراجع"><i class="fas fa-trash-restore"></i>
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

        <!-- This Is For Delete All Student And Return Back Before Promotion -->
        <div class="modal fade" id="delete_all">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">تراجع عن ترقيه الكل</h6>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{route('promotion.destroy','test')}}" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <p>هل أنت متأكد من عمليه التراجع عن ترقيه الطلاب ؟</p><br>
                            <input type="hidden" name="page_id" id="page_id" value="1">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('grades_trans.btn_cancel')}}</button>
                            <button type="submit" class="btn btn-danger">{{trans('grades_trans.btn_confirm')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- This Is For Delete All Student And Return Back Before Promotion -->

        <!-- This Is For Delete Student -->
        <div class="modal fade" id="delete">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">حذف الطالب</h6>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{route('promotion.destroy','test')}}" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <p>{{trans('grades_trans.msg_delete_stage')}}</p><br>
                            <input type="hidden" name="id" id="id" value="">
                            <input class="form-control" name="student_name" id="student_name" type="text" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('grades_trans.btn_cancel')}}</button>
                            <button type="submit" class="btn btn-danger">{{trans('grades_trans.btn_confirm')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- This Is For Delete Student -->

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
            var button          = $(event.relatedTarget)
            var id              = button.data('id')
            var student_name    = button.data('student_name')
            var modal           = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #student_name').val(student_name);
        })
    </script>
    <!-- This For Delete Form -->

@endsection
