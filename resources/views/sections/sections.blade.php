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
    {{trans('main_sidebar.sections')}}
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
                            data-toggle="modal" data-target="#add">
                        <i class="ti-plus"></i> اضافه فصل جديد
                    </button>
                </div>
                <hr>
                <div class="accordion gray plus-icon round">
                    @foreach($grades_by_sections as $grade)
                        <div class="acd-group">
                            <a href="#" class="acd-heading">{{$grade->name}}</a>
                            <div class="acd-des">
                                <div class="row">
                                    <div class="col-xl-12 mb-30">
                                        <div class="card card-statistics h-100">
                                            <div class="card-body">
                                                <div class="d-block d-md-flex justify-content-between">
                                                    <div class="d-block"></div>
                                                </div>
                                                <div class="table-responsive mt-15">
                                                    <table class="table center-aligned-table mb-0">
                                                        <thead>
                                                            <tr class="text-dark">
                                                                <th>#</th>
                                                                <th>اسم الفصل</th>
                                                                <th>اسم الصف</th>
                                                                <th>الحاله</th>
                                                                <th>العمليات</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $i = 1 ;?>
                                                            @foreach($grade->getSections as $list_section)
                                                                <tr class="text-dark">
                                                                    <td>{{$i++}}</td>
                                                                    <td>{{$list_section->section_name}}</td>
                                                                    <td>{{$list_section->getChapters->chapter_name}}</td>
                                                                    <td>
                                                                        @if($list_section->status === 1)
                                                                            <span class="badge badge-pill badge-success">نشط</span>
                                                                        @else
                                                                            <span class="badge badge-pill badge-danger">غير نشط</span>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <a class="modal-effect btn btn-info" data-effect="effect-scale" data-toggle="modal"
                                                                           href="#edit{{ $list_section->id }}" title="تعديل"><i class="fa fa-edit"></i>
                                                                        </a>
                                                                        <a class="modal-effect btn btn-danger" data-effect="effect-scale"
                                                                           data-id="{{ $list_section->id }}" data-section_name="{{ $list_section->section_name }}"
                                                                           data-toggle="modal" href="#delete" title="حذف"><i class="fa fa-trash"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>

                                                                <!-- This Is For Edit Sections -->
                                                                <div class="modal fade" id="edit{{ $list_section->id }}" tabindex="-1" role="dialog"
                                                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                                                                    تعديل الفصل
                                                                                </h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form action="{{ route('section.update', 'test') }}" method="post">
                                                                                    {{ method_field('patch') }}
                                                                                    {{ csrf_field() }}
                                                                                    <div class="row">
                                                                                        <div class="col">
                                                                                            <input id="id" type="hidden" name="id" class="form-control" value="{{ $list_section->id }}">
                                                                                            <label for="section_name" class="mr-sm-2">اسم الفصل بالعربيه:</label>
                                                                                            <input id="section_name" type="text" name="section_name" class="form-control"
                                                                                                   value="{{ $list_section->getTranslation('section_name', 'ar') }}" required>
                                                                                        </div>
                                                                                        <div class="col">
                                                                                            <label for="section_name_en" class="mr-sm-2">اسم الفصل بالانجليزيه:</label>
                                                                                            <input type="text" class="form-control" id="section_name_en" name="section_name_en"
                                                                                                   value="{{ $list_section->getTranslation('section_name', 'en') }}" required>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col">
                                                                                            <label for="exampleFormControlTextarea1">اسم المرحله:</label>
                                                                                            <select class="form-control form-control-lg" id="exampleFormControlSelect1" id="grade_id" name="grade_id">
                                                                                                {{--<option value="{{ $grade->id }}">{{ $grade->name }}</option>--}}
                                                                                                @foreach ($all_grades as $grade)
                                                                                                    <option value="{{ $grade->id }}" {{ ($list_section->grade_id === $grade->id) ? 'selected' : '' }}>{{ $grade->name }}</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col">
                                                                                            <label for="exampleFormControlTextarea1">اسم المرحله:</label>
                                                                                            <select class="form-control form-control-lg" id="exampleFormControlSelect1" id="chapter_id" name="chapter_id">
                                                                                                {{--<option value="{{ $chapter->getGrades->id }}">{{ $chapter->getGrades->name }}</option>--}}
                                                                                                @foreach ($all_chapters as $chapter)
                                                                                                    <option value="{{ $chapter->id }}" {{ ($list_section->chapter_id === $chapter->id) ? 'selected' : '' }}>{{ $chapter->chapter_name }}</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="exampleFormControlTextarea1">الحاله:</label>
                                                                                        <select class="form-control form-control-lg" id="exampleFormControlSelect1" id="status" name="status">
                                                                                            <option value="1" {{ ($list_section->status === 1) ? 'selected' : '' }}>نشط</option>
                                                                                            <option value="2" {{ ($list_section->status === 2) ? 'selected' : '' }}>غير نشط</option>
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
                                                                <!-- This Is For Edit Sections -->

                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- This Is For Add New section -->
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">اضافه فصل جديد</h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('section.store') }}" method="post">
                        {{ csrf_field() }}

                        <div class="row" style="margin-bottom: 10px">
                            <div class="col">
                                <label for="exampleInputEmail1">اسم الفصل بالعربيه</label>
                                <input type="text" class="form-control" id="section_name" name="section_name" value="{{old('section_name')}}" required>
                            </div>
                            <div class="col">
                                <label for="exampleInputEmail1">اسم الفصل بالانجليزيه</label>
                                <input type="text" class="form-control" id="section_name_en" name="section_name_en" value="{{old('section_name_en')}}" required>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 15px">
                            <div class="col">
                                <label for="inputName" class="control-label">اسم المرحله</label>
                                <select name="grade_id" id="grade_id" class="form-control SlectBox" onchange="console.log($(this).val())">
                                    <option value="" selected disabled>اختر المرحله</option>
                                    @foreach($all_grades as $list_grade)
                                        <option value="{{ $list_grade->id }}">{{ $list_grade->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">اسم الصف</label>
                                <select id="chapter_id" name="chapter_id" class="form-control">
                                    <option value="" selected disabled>اختر الصف</option>
                                    @foreach($all_chapters as $chapter)
                                        <option value="{{ $chapter->id }}">{{ $chapter->chapter_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="control-label">اختر الحاله</label>
                            <select id="status" name="status" class="form-control">
                                <option value="1">نشط</option>
                                <option value="2">غير نشط</option>
                            </select>
                        </div>
                        <div class="modal-footer" style="margin-top: 10px">
                            <button type="submit" class="btn btn-success">{{trans('grades_trans.btn_confirm')}}</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('grades_trans.btn_close')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- This Is For Add New section -->

    <!-- delete section -->
    <div class="modal fade" id="delete">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">حذف الفصل</h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{route('section.destroy','test')}}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>{{trans('grades_trans.msg_delete_stage')}}</p><br>
                        <input type="hidden" name="id" id="id" value="">
                        <input class="form-control" name="section_name" id="section_name" type="text" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('grades_trans.btn_cancel')}}</button>
                        <button type="submit" class="btn btn-danger">{{trans('grades_trans.btn_confirm')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- delete section -->

</div>
<!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
    <!-- Internal Modal js-->
    <script src="{{URL::asset('assets/js/modal.js')}}"></script>

    {{-- Start This Ajax Code To Get Chapter Name And ID --}}
    <script>
        $(document).ready(function () {
            $('select[name="grade_id"]').on('change', function () {
                var grade_id = $(this).val();
                if (grade_id) {
                    $.ajax({
                        url: "{{ URL::to('chapter') }}/" + grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="chapter_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="chapter_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
    {{-- Start This Ajax Code To Get Chapter Name And ID --}}

    <!-- This For Delete Form -->
    <script>
        $('#delete').on('show.bs.modal',function (event){
            var button         = $(event.relatedTarget)
            var id             = button.data('id')
            var section_name   = button.data('section_name')
            var modal          = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #section_name').val(section_name);
        })
    </script>
    <!-- This For Delete Form -->
@endsection
