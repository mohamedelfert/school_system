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
                            data-toggle="modal" href="#modaldemo8"><i class="ti-plus"></i> اضافة مرحله </button>
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم المرحله</th>
                                <th>ملاحظات</th>
                                <th>العمليات</th>
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
                                           data-id="{{ $grade->id }}" data-grade_name="{{ $grade->name }}"
                                           data-grade_notes="{{ $grade->notes }}" data-toggle="modal"
                                           href="#exampleModal2" title="تعديل"><i class="ti-settings"></i>
                                        </a>
                                        <a class="modal-effect btn btn-danger" data-effect="effect-scale"
                                           data-id="{{ $grade->id }}" data-toggle="modal"
                                           href="#modaldemo9" title="حذف"><i class="ti-trash"></i>
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
    <div class="modal" id="modaldemo8">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">اضافة مرحله</h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('grade.store') }}" method="post">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="exampleInputEmail1">اسم المرحله عربي</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">اسم المرحله انجليزي</label>
                            <input type="text" class="form-control" id="name_en" name="name_en" value="{{old('name_en')}}" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">ملاحظات</label>
                            <textarea class="form-control" id="notes" name="notes" rows="3">{{old('notes')}}</textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">تاكيد</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- This Is For Add New Grade -->

    <!-- edit Grade -->
{{--    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"--}}
{{--         aria-hidden="true">--}}
{{--        <div class="modal-dialog" role="document">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h5 class="modal-title" id="exampleModalLabel">تعديل المرحله</h5>--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <form action="" method="post">--}}
{{--                    {{ method_field('patch') }}--}}
{{--                    {{ csrf_field() }}--}}
{{--                    <div class="modal-body">--}}
{{--                        <div class="form-group">--}}
{{--                            <input type="hidden" name="id" id="id" value="">--}}
{{--                            <label for="recipient-name" class="col-form-label">اسم المرحله عربي:</label>--}}
{{--                            <input class="form-control" name="name_ar" id="name_ar" type="text">--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="recipient-name" class="col-form-label">اسم المرحله انجليزي:</label>--}}
{{--                            <input class="form-control" name="name_en" id="name_en" type="text">--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="message-text" class="col-form-label">ملاحظات:</label>--}}
{{--                            <textarea class="form-control" id="notes" name="notes"></textarea>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="modal-footer">--}}
{{--                        <button type="submit" class="btn btn-primary">تاكيد</button>--}}
{{--                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- edit Grade -->

    <!-- delete Grade -->
{{--    <div class="modal fade" id="modaldemo9">--}}
{{--        <div class="modal-dialog modal-dialog-centered" role="document">--}}
{{--            <div class="modal-content modal-content-demo">--}}
{{--                <div class="modal-header">--}}
{{--                    <h6 class="modal-title">حذف المرحله</h6>--}}
{{--                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>--}}
{{--                </div>--}}
{{--                <form action="" method="post">--}}
{{--                    {{ method_field('delete') }}--}}
{{--                    {{ csrf_field() }}--}}
{{--                    <div class="modal-body">--}}
{{--                        <p>هل انت متاكد من عملية الحذف ؟</p><br>--}}
{{--                        <input type="hidden" name="id" id="id" value="">--}}
{{--                        <input class="form-control" name="name_ar" id="name_ar" type="text" readonly>--}}
{{--                    </div>--}}
{{--                    <div class="modal-footer">--}}
{{--                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>--}}
{{--                        <button type="submit" class="btn btn-danger">تاكيد</button>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- delete Grade -->

</div>
<!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
    <!-- Internal Modal js-->
    <script src="{{URL::asset('assets/js/modal.js')}}"></script>
@endsection
