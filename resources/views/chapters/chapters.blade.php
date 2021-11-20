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
                                    <td>{{$chapter->getGrades->name}}</td>
                                    <td>
{{--                                        <a class="modal-effect btn btn-info" data-effect="effect-scale"--}}
{{--                                           data-id="{{ $chapter->id }}" data-chapter_name="{{ $chapter->getTranslation('chapter_name','ar') }}"--}}
{{--                                           data-chapter_name_en="{{ $chapter->getTranslation('chapter_name','en') }}" data-grade_id="{{ $chapter->grade_id }}"--}}
{{--                                           data-toggle="modal" href="#exampleModal2" title="تعديل">--}}
{{--                                            <i class="fa fa-edit"></i>--}}
{{--                                        </a>--}}
                                        <a class="modal-effect btn btn-info" data-effect="effect-scale" data-toggle="modal" href="#edit{{ $chapter->id }}"
                                           title="تعديل"><i class="fa fa-edit"></i>
                                        </a>
                                        <a class="modal-effect btn btn-danger" data-effect="effect-scale"
                                           data-id="{{ $chapter->id }}" data-chapter_name="{{ $chapter->chapter_name }}"
                                           data-toggle="modal" href="#modaldemo9" title="حذف"><i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>

                                <!-- This Is For Edit Chapter -->
                                <div class="modal fade" id="edit{{ $chapter->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                                    تعديل الصف
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('chapter.update', 'test') }}" method="post">
                                                    {{ method_field('patch') }}
                                                    {{ csrf_field() }}
                                                    <div class="row">
                                                        <div class="col">
                                                            <input id="id" type="hidden" name="id" class="form-control" value="{{ $chapter->id }}">
                                                            <label for="chapter_name" class="mr-sm-2">اسم الصف بالعربيه:</label>
                                                            <input id="chapter_name" type="text" name="chapter_name" class="form-control"
                                                                   value="{{ $chapter->getTranslation('chapter_name', 'ar') }}" required>
                                                        </div>
                                                        <div class="col">
                                                            <label for="chapter_name_en" class="mr-sm-2">اسم الصف بالانجليزيه:</label>
                                                            <input type="text" class="form-control" id="chapter_name_en" name="chapter_name_en"
                                                                   value="{{ $chapter->getTranslation('chapter_name', 'en') }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">اسم المرحله:</label>
                                                        <select class="form-control form-control-lg" id="exampleFormControlSelect1" id="grade_id" name="grade_id">
{{--                                                            <option value="{{ $chapter->getGrades->id }}">{{ $chapter->getGrades->name }}</option>--}}
                                                            @foreach ($all_grades as $grade)
                                                                <option value="{{ $grade->id }}" {{ ($chapter->grade_id === $grade->id) ? 'selected' : '' }}>{{ $grade->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                                                        <button type="submit" class="btn btn-success">تاكيد</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- This Is For Edit Chapter -->

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--- This Is For Add New Chapters multi add --->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        اضافه صف جديد
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="row mb-30" action="{{route('chapter.store')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="repeater">
                                <div data-repeater-list="chapters_list">
                                    <div data-repeater-item>
                                        <div class="row">
                                            <div class="col">
                                                <label for="chapter_name" class="mr-sm-2">اسم الصف بالعربيه:</label>
                                                <input class="form-control" type="text" name="chapter_name" id="chapter_name" value="{{old('chapter_name')}}" required>
                                            </div>

                                            <div class="col">
                                                <label for="chapter_name_en" class="mr-sm-2">اسم الصف بالانجليزيه:</label>
                                                <input class="form-control" type="text" name="chapter_name_en" id="chapter_name_en" value="{{old('chapter_name_en')}}" required>
                                            </div>

                                            <div class="col">
                                                <label for="grade_id" class="mr-sm-2">اسم المرحله:</label>
                                                <div class="box">
                                                    <select name="grade_id" id="grade_id" class="fancyselect">
                                                        <option value="" selected disabled>اختر المرحله</option>
                                                        @foreach($all_grades as $grad)
                                                            <option value="{{$grad->id}}">{{$grad->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col" style="margin-top: 35px">
                                                <input class="btn btn-danger btn-block" data-repeater-delete type="button" value="حذف" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-12">
                                        <input class="btn btn-success" data-repeater-create type="button" value="اضفه حقل جديد"/>
                                    </div>
                                </div>
                                <div class="modal-footer" style="margin-top: 10px">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                    <button type="submit" class="btn btn-success">تاكيد</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--- This Is For Add New Chapters multi add --->

    <!-- This Is For Add New Chapter one row -->
{{--    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--        <div class="modal-dialog" role="document">--}}
{{--            <div class="modal-content modal-content-demo">--}}
{{--                <div class="modal-header">--}}
{{--                    <h6 class="modal-title">اضافه صف جديد</h6>--}}
{{--                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    <form action="" method="post">--}}
{{--                        {{ csrf_field() }}--}}

{{--                        <div class="row">--}}
{{--                            <div class="col">--}}
{{--                                <label for="exampleInputEmail1">اسم الصف بالعربيه</label>--}}
{{--                                <input type="text" class="form-control" id="chapter_name" name="chapter_name" value="{{old('chapter_name')}}" required>--}}
{{--                            </div>--}}
{{--                            <div class="col">--}}
{{--                                <label for="exampleInputEmail1">اسم الصف بالانجليزيه</label>--}}
{{--                                <input type="text" class="form-control" id="chapter_name_en" name="chapter_name_en" value="{{old('chapter_name_en')}}" required>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="exampleFormControlTextarea1">اسم المرحله</label>--}}
{{--                            <select name="grade_id" id="garde_id" class="form-control">--}}
{{--                                <option value="" selected disabled>اختر المرحله</option>--}}
{{--                                @foreach($all_grades as $grad)--}}
{{--                                    <option value="{{$grad->id}}">{{$grad->getTranslation('name','ar')}}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                        <div class="modal-footer">--}}
{{--                            <button type="submit" class="btn btn-success">{{trans('grades_trans.btn_confirm')}}</button>--}}
{{--                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('grades_trans.btn_close')}}</button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- This Is For Add New Chapter one row -->

    <!-- This Is For Edit Chapter -->
{{--    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"--}}
{{--         aria-hidden="true">--}}
{{--        <div class="modal-dialog" role="document">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h5 class="modal-title" id="exampleModalLabel">تعديل الصف</h5>--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <form action="{{route('chapter.update','test')}}" method="post">--}}
{{--                    {{ method_field('patch') }}--}}
{{--                    {{ csrf_field() }}--}}
{{--                    <div class="modal-body">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col">--}}
{{--                                <input type="hidden" name="id" id="id" value="">--}}
{{--                                <label for="exampleInputEmail1">اسم الصف بالعربيه</label>--}}
{{--                                <input type="text" class="form-control" id="chapter_name" name="chapter_name" required>--}}
{{--                            </div>--}}
{{--                            <div class="col">--}}
{{--                                <label for="exampleInputEmail1">اسم الصف بالانجليزيه</label>--}}
{{--                                <input type="text" class="form-control" id="chapter_name_en" name="chapter_name_en" required>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="exampleFormControlTextarea1">اسم المرحله</label>--}}
{{--                            <select name="garde_id" id="garde_id" class="form-control">--}}
{{--                                <option value="{{ $chapter->getGrades->id }}"> {{ $chapter->getGrades->name }}</option>--}}
{{--                                @foreach($all_grades as $grade)--}}
{{--                                    <option value="{{ $grade->id }}"> {{ $grade->name }}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="modal-footer">--}}
{{--                        <button type="submit" class="btn btn-primary">{{trans('grades_trans.btn_confirm')}}</button>--}}
{{--                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('grades_trans.btn_close')}}</button>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- edit Chapter -->

    <!-- This Is For Delete Chapter -->
    <div class="modal fade" id="modaldemo9">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">حذف الصف</h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{route('chapter.destroy','test')}}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>{{trans('grades_trans.msg_delete_stage')}}</p><br>
                        <input type="hidden" name="id" id="id" value="">
                        <input class="form-control" name="chapter_name" id="chapter_name" type="text" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('grades_trans.btn_cancel')}}</button>
                        <button type="submit" class="btn btn-danger">{{trans('grades_trans.btn_confirm')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- This Is For Delete Chapter -->

</div>
<!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
    <!-- Internal Modal js-->
    <script src="{{URL::asset('assets/js/modal.js')}}"></script>

    <!-- This For Edit Form -->
{{--    <script>--}}
{{--        $('#exampleModal2').on('show.bs.modal',function (event){--}}
{{--            var button = $(event.relatedTarget)--}}
{{--            var id = button.data('id')--}}
{{--            var chapter_name = button.data('chapter_name')--}}
{{--            var chapter_name_en = button.data('chapter_name_en')--}}
{{--            var grade_id = button.data('grade_id')--}}
{{--            var modal = $(this)--}}
{{--            modal.find('.modal-body #id').val(id);--}}
{{--            modal.find('.modal-body #chapter_name').val(chapter_name);--}}
{{--            modal.find('.modal-body #chapter_name_en').val(chapter_name_en);--}}
{{--            modal.find('.modal-body #grade_id').val(grade_id);--}}
{{--        })--}}
{{--    </script>--}}
    <!-- This For Edit Form -->

    <!-- This For Delete Form -->
    <script>
        $('#modaldemo9').on('show.bs.modal',function (event){
            var button = $(event.relatedTarget)
            var id     = button.data('id')
            var chapter_name   = button.data('chapter_name')
            var modal  = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #chapter_name').val(chapter_name);
        })
    </script>
    <!-- This For Delete Form -->
@endsection
