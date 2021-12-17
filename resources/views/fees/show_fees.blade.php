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
                                <th>الاسم</th>
                                <th>المبلغ</th>
                                <th>المرحله الدراسيه</th>
                                <th>الصف الدراسي</th>
                                <th>السنه الدراسيه</th>
                                <th>ملاحظات</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach($all_fees as $fee)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$fee->name}}</td>
                                    <td>{{number_format($fee->amount, 2)}} $</td>
                                    <td>{{$fee->getGrades->name}}</td>
                                    <td>{{$fee->getChapters->chapter_name}}</td>
                                    <td>{{$fee->year}}</td>
                                    <td>{{$fee->notes}}</td>
                                    <td>
                                        <a class="modal-effect btn btn-info" href="{{ url('fees/'.$fee->id.'/edit') }}"
                                           title="تعديل"><i class="fa fa-edit"></i>
                                        </a>
                                        <a class="modal-effect btn btn-danger" data-effect="effect-scale"
                                           data-id="{{ $fee->id }}" data-name="{{ $fee->name }}"
                                           data-toggle="modal" href="#delete" title="حذف"><i class="fa fa-trash"></i>
                                        </a>
                                        <a class="modal-effect btn btn-warning" href="{{ route('fees.show',$fee->id) }}"
                                           title="عرض"><i class="fa fa-eye"></i>
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

    <!-- delete Fee -->
    <div class="modal fade" id="delete">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">حذف رسم دراسي</h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{route('fees.destroy','test')}}" method="post">
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
