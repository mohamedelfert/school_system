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
    {{trans('main_sidebar.study_fees')}}
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
                    <a type="button" class="modal-effect btn btn-success" href="{{route('fees.create')}}">
                        <i class="ti-plus"></i> اضافه رسوم جديده
                    </a>
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>اسم الطالب</th>
                                <th>المرحله الدراسيه</th>
                                <th>الصف الدراسي</th>
                                <th>السنه الدراسيه</th>
                                <th>المبلغ الكلي</th>
                                <th>المبلغ المسدد</th>
                                <th>المبلغ المتبقي</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
{{--                            <?php $i = 1; ?>--}}
{{--                            @foreach($all_grades as $f)--}}
{{--                                <tr>--}}
{{--                                    <td>{{$i++}}</td>--}}
{{--                                    <td>{{$f->name}}</td>--}}
{{--                                    <td>{{$f->amount}}</td>--}}
{{--                                    <td>{{$f->getGrades->name}}</td>--}}
{{--                                    <td>{{$f->getChapters->chapter_name}}</td>--}}
{{--                                    <td>{{$f->year}}</td>--}}
{{--                                    <td>{{$f->notes}}</td>--}}
{{--                                    <td>--}}
{{--                                        <a class="modal-effect btn btn-info" href="{{ url('fees/'.$f->id.'/edit') }}"--}}
{{--                                           title="تعديل"><i class="fa fa-edit"></i>--}}
{{--                                        </a>--}}
{{--                                        <a class="modal-effect btn btn-danger" data-effect="effect-scale"--}}
{{--                                           data-id="{{ $f->id }}" data-name="{{ $f->name }}"--}}
{{--                                           data-toggle="modal" href="#delete" title="حذف"><i class="fa fa-trash"></i>--}}
{{--                                        </a>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- delete Fee -->
    <div class="modal fade" id="delete">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">حذف رسم دراسي</h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="" method="post">
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
    <!-- delete Fee -->

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
            var button = $(event.relatedTarget)
            var id     = button.data('id')
            var name   = button.data('name')
            var modal  = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
        })
    </script>
    <!-- This For Delete Form -->
@endsection
