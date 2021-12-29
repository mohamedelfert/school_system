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
    {{trans('main_sidebar.library_list')}}
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
                    <a type="button" class="btn btn-success" href="{{route('library.create')}}">
                            <i class="ti-plus"></i> اضافه كتاب
                    </a>
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0 text-center">
                        <thead>
                            <tr class="alert-success">
                                <th>#</th>
                                <th>اسم الكتاب</th>
                                <th>اسم المعلم</th>
                                <th>المرحله الدراسيه</th>
                                <th>الصف الدراسي</th>
                                <th>الفصل</th>
                                <th>تاريخ الاضافه</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach($all_books as $book)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$book->title}}</td>
                                    <td>{{$book->getTeachers->teacher_name}}</td>
                                    <td>{{$book->getGrades->name}}</td>
                                    <td>{{$book->getChapters->chapter_name}}</td>
                                    <td>{{$book->getSections->section_name}}</td>
                                    <td>{{$book->date}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="{{url('download/'.$book->file_name)}}" title="تحميل">
                                            <i class="fa fa-download"></i></a>
                                        <a class="btn btn-sm btn-info" href="{{route('library.edit',$book->id)}}" title="تعديل">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                           data-id="{{ $book->id }}" data-title="{{ $book->title }}" data-file_name="{{ $book->file_name }}"
                                           data-toggle="modal" href="#delete" title="حذف"><i class="fa fa-trash"></i>
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


    <!-- delete Book -->
    <div class="modal fade" id="delete">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">حذف كتاب</h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{route('library.destroy','test')}}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>{{trans('grades_trans.msg_delete_stage')}}</p><br>
                        <input type="hidden" name="id" id="id" value="">
                        <label for="exampleInputEmail1">عنوان الكتاب</label>
                        <input class="form-control" name="title" id="title" type="text" readonly><br>
                        <label for="exampleInputEmail1">اسم الملف</label>
                        <input class="form-control" name="file_name" id="file_name" type="text" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('grades_trans.btn_cancel')}}</button>
                        <button type="submit" class="btn btn-danger">{{trans('grades_trans.btn_confirm')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- delete Book -->

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
            var title          = button.data('title')
            var file_name      = button.data('file_name')
            var modal          = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #title').val(title);
            modal.find('.modal-body #file_name').val(file_name);
        })
    </script>
    <!-- This For Delete Form -->
@endsection
