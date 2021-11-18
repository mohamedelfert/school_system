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
    {{trans('main_sidebar.chapters')}}
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
                            <i class="ti-plus"></i> اضافه صف جديد
                    </button>
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم الصف</th>
                                <th>اسم المرحله</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach($all_chapters as $chapter)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$chapter->chapter_name}}</td>
                                    <td>{{$chapter->grade_id}}</td>
                                    <td>
                                        <a class="modal-effect btn btn-info" data-effect="effect-scale"
                                           data-id="{{ $chapter->id }}" data-grade_name=""
                                           data-grade_name_en="" data-grade_notes="{{ $chapter->notes }}"
                                           data-toggle="modal" href="#exampleModal2" title="تعديل">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a class="modal-effect btn btn-danger" data-effect="effect-scale"
                                           data-id="{{ $chapter->id }}" data-grade_name="{{ $chapter->name }}"
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

<!----------------------------------------------->
{{--    <div class="col-xl-12 mb-30">--}}
{{--        <div class="card card-statistics h-100">--}}
{{--            <div class="card-body">--}}
{{--                <h5 class="card-title">Repeating Forms </h5>--}}
{{--                <div class="repeater">--}}
{{--                    <div data-repeater-list="group-a">--}}
{{--                        <div data-repeater-item>--}}
{{--                            <form class=" row mb-30">--}}
{{--                                <div class="col-lg-2">--}}
{{--                                    <input class="form-control" type="text" placeholder="Name" />--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-2">--}}
{{--                                    <input class="form-control" type="text" placeholder="Email" />--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-2">--}}
{{--                                    <div class="box">--}}
{{--                                        <select name="select-input" class="fancyselect">--}}
{{--                                            <option value="1">Sex</option>--}}
{{--                                            <option value="2">Male</option>--}}
{{--                                            <option value="3">Female</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-2">--}}
{{--                                    <input class="btn btn-danger btn-block" data-repeater-delete type="button" value="Delete"/>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="row mt-20">--}}
{{--                        <div class="col-12">--}}
{{--                            <input class="button" data-repeater-create type="button" value="Add new"/>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

<!----------------------------------------------->

    <!-- This Is For Add New Grade -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">اضافه صف جديد</h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col">
                                <label for="exampleInputEmail1">اسم الصف بالعربيه</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" required>
                            </div>
                            <div class="col">
                                <label for="exampleInputEmail1">اسم الصف بالانجليزيه</label>
                                <input type="text" class="form-control" id="name_en" name="name_en" value="{{old('name_en')}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">اسم المرحله</label>
                            <select name="garde" id="garde" class="form-control">
                                <option value="" selected disabled>اختر المرحله</option>
                                @foreach($all_grades as $grad)
                                    <option value="{{$grad->id}}">{{$grad->getTranslation('name','ar')}}</option>
                                @endforeach
                            </select>
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
                <form action="" method="post">
                    {{ method_field('patch') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <label for="exampleInputEmail1">اسم الصف بالعربيه</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" required>
                            </div>
                            <div class="col">
                                <label for="exampleInputEmail1">اسم الصف بالانجليزيه</label>
                                <input type="text" class="form-control" id="name_en" name="name_en" value="{{old('name_en')}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">اسم المرحله</label>
                            <select name="garde" id="garde" class="form-control">
                                <option value="" selected disabled>اختر المرحله</option>
                                <option value="1">المرحله الابتدائيه</option>
                                <option value="2">المرحله الاعداديه</option>
                                <option value="3">المرحله الثانويه</option>
                            </select>
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
                <form action="" method="post">
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
