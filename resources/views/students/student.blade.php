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
    {{trans('main_sidebar.students')}}
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
                    <a type="button" class="modal-effect btn btn-success" href="student/create">
                            <i class="ti-plus"></i> اضافه طالب
                    </a>
                    <button type="button" class="btn btn-danger" id="btn_delete_all">
                        <i class="ti-trash"></i> حذف الصفوف المختاره
                    </button>
                    <!-- This Form For Filter -->
                    <form action="" method="POST" class="d-inline-block">
                        {{ csrf_field() }}
                        <select class="custom-select mr-sm-2" name="grade_id" data-style="btn-info" onchange="this.form.submit()">
                            <option value="" selected disabled>اظهر عن طريق المرحله</option>
                            <option value="">$grade->name</option>
                        </select>
                    </form>
                    <!-- This Form For Filter -->
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0 text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم الطالب</th>
                                <th>البريد الالكتروني</th>
                                <th>المرحله</th>
                                <th>الصف الدراسي</th>
                                <th>الفصل</th>
                                <th>ولي الامر</th>
                                <th>تاريخ الميلاد</th>
                                <th>النوع</th>
                                <th>الجنسيه</th>
                                <th>العمليات</th>
                                <th>اختر : <input type="checkbox" id="select_all" name="select_all" onclick="checkAll('box',this)"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $i = 1; @endphp
                        @foreach($all_students as $student)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $student->student_name }}</td>
                                <td>{{ $student->student_email }}</td>
                                <td>{{ $student->getGrades->name }}</td>
                                <td>{{ $student->getChapters->chapter_name }}</td>
                                <td>{{ $student->getSections->section_name }}</td>
                                <td>{{ $student->getParents->father_name }}</td>
                                <td>{{ $student->date_of_birth }}</td>
                                <td>{{ $student->getGenders->gender_name }}</td>
                                <td>{{ $student->getNationalities->name }}</td>
                                <td>
                                    <a class="modal-effect btn btn-info" href="{{ url('student/'.$student->id.'/edit') }}"
                                       title="تعديل"><i class="fa fa-edit"></i>
                                    </a>
                                    <a class="modal-effect btn btn-danger" data-effect="effect-scale"
                                       data-id="{{$student->id}}" data-student_name="{{$student->student_name}}"
                                       data-toggle="modal" href="#delete" title="حذف"><i class="fa fa-trash"></i>
                                    </a>
                                    <a class="modal-effect btn btn-warning" href="{{ route('student.show',$student->id) }}"
                                       title="عرض"><i class="fa fa-eye"></i>
                                    </a>
                                </td>
                                <td><input type="checkbox" name="box" class="box" value="$chapter->id"></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- This Is For Delete Student -->
    <div class="modal fade" id="delete">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">حذف الطالب</h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{route('student.destroy','test')}}" method="post">
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

    <!-- This Is For Delete Checked Chapters -->
    <div class="modal fade" id="delete_all">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">حذف الصف</h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>{{trans('grades_trans.msg_delete_stage')}}</p><br>
                        <input type="hidden" name="checked_chapters_id" id="checked_chapters_id" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('grades_trans.btn_cancel')}}</button>
                        <button type="submit" class="btn btn-danger">{{trans('grades_trans.btn_confirm')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- This Is For Delete Checked Chapters -->

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

    <!-- This For check all boxes -->
    <script>
        function checkAll(className,elem){
            var elements = document.getElementsByClassName(className)
            var l        = elements.length
            if (elem.checked){
                for (i = 0; i < l; i++){
                    elements[i].checked = true;
                }
            }else {
                for (i = 0; i < l; i++){
                    elements[i].checked = false;
                }
            }
        }
    </script>
    <!-- This For check all boxes -->

    <!-- This For delete all checked -->
    <script>
        $(function (){
            $('#btn_delete_all').click(function (){
                var selected = new Array();
                $('#datatable input[type = checkbox]:checked').each(function (){
                    selected.push(this.value);
                })
                if(selected.length > 0){
                    $('#delete_all').modal('show')
                    $('input[id = "checked_chapters_id"]').val(selected);
                }
            })
        })
    </script>
    <!-- This For delete all checked -->
@endsection
