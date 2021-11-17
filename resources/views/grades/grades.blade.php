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
    {{trans('main_sidebar.grades')}}
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
                    <button type="button" class="modal-effect btn btn-success" data-effect="effect-scale"
                            data-toggle="modal" data-target="#exampleModal">
                            <i class="ti-plus"></i> {{trans('grades_trans.add_new_stage')}}
                    </button>
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{trans('grades_trans.stage_name')}}</th>
                                <th>{{trans('grades_trans.notes')}}</th>
                                <th>{{trans('grades_trans.control')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach($all_grades as $grade)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$grade->name}}</td>
                                    <td>{{$grade->notes}}</td>
                                    <td>
                                        <a class="modal-effect btn btn-info" data-effect="effect-scale"
                                           data-id="{{ $grade->id }}" data-grade_name="{{ $grade->getTranslation('name','ar') }}"
                                           data-grade_name_en="{{ $grade->getTranslation('name','en') }}" data-grade_notes="{{ $grade->notes }}"
                                           data-toggle="modal" href="#exampleModal2" title="تعديل">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a class="modal-effect btn btn-danger" data-effect="effect-scale"
                                           data-id="{{ $grade->id }}" data-grade_name="{{ $grade->name }}"
                                           data-toggle="modal" href="#modaldemo9" title="حذف"><i class="fa fa-trash"></i>
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

    <!-- This Is For Add New Grade -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">{{trans('grades_trans.add_new_stage')}}</h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('grade.store') }}" method="post">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col">
                                <label for="exampleInputEmail1">{{trans('grades_trans.name_ar')}}</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" required>
                            </div>
                            <div class="col">
                                <label for="exampleInputEmail1">{{trans('grades_trans.name_en')}}</label>
                                <input type="text" class="form-control" id="name_en" name="name_en" value="{{old('name_en')}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">{{trans('grades_trans.notes')}}</label>
                            <textarea class="form-control" id="notes" name="notes" rows="3">{{old('notes')}}</textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">{{trans('grades_trans.btn_confirm')}}</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('grades_trans.btn_close')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- This Is For Add New Grade -->

    <!-- edit Grade -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{trans('grades_trans.edit_stage')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('grade.update','test')}}" method="post">
                    {{ method_field('patch') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <input type="hidden" name="id" id="id" value="">
                                <label for="recipient-name" class="col-form-label">{{trans('grades_trans.name_ar')}}</label>
                                <input class="form-control" name="name" id="name" type="text">
                            </div>
                            <div class="col">
                                <label for="recipient-name" class="col-form-label">{{trans('grades_trans.name_en')}}</label>
                                <input class="form-control" name="name_en" id="name_en" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">{{trans('grades_trans.notes')}}</label>
                            <textarea class="form-control" id="notes" name="notes"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{trans('grades_trans.btn_confirm')}}</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('grades_trans.btn_close')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- edit Grade -->

    <!-- delete Grade -->
    <div class="modal fade" id="modaldemo9">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">{{trans('grades_trans.delete_stage')}}</h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{route('grade.destroy','test')}}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>{{trans('grades_trans.msg_delete_stage')}}</p><br>
                        <input type="hidden" name="id" id="id" value="">
                        <input class="form-control" name="grade_name" id="grade_name" type="text" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('grades_trans.btn_cancel')}}</button>
                        <button type="submit" class="btn btn-danger">{{trans('grades_trans.btn_confirm')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- delete Grade -->

</div>
<!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
    <!-- Internal Modal js-->
    <script src="{{URL::asset('assets/js/modal.js')}}"></script>

    <!-- This For Edit Form -->
    <script>
        $('#exampleModal2').on('show.bs.modal',function (event){
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name_ar = button.data('grade_name')
            var name_en = button.data('grade_name_en')
            var notes = button.data('grade_notes')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name_ar);
            modal.find('.modal-body #name_en').val(name_en);
            modal.find('.modal-body #notes').val(notes);
        })
    </script>
    <!-- This For Edit Form -->

    <!-- This For Delete Form -->
    <script>
        $('#modaldemo9').on('show.bs.modal',function (event){
            var button = $(event.relatedTarget)
            var id     = button.data('id')
            var name   = button.data('grade_name')
            var modal  = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #grade_name').val(name);
        })
    </script>
    <!-- This For Delete Form -->
@endsection
