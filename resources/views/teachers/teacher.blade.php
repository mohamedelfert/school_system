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
    {{trans('main_sidebar.teachers_list')}}
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

{{--@if(session()->has('error'))--}}
{{--    <div class="alert alert-danger alert-dismissible fade show" role="alert">--}}
{{--        <strong>{{ session()->get('error') }}</strong>--}}
{{--        <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--            <span aria-hidden="true">&times;</span>--}}
{{--        </button>--}}
{{--    </div>--}}
{{--@endif--}}

<div class="row">
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div style="margin-bottom: 10px;">
                    <button type="button" class="modal-effect btn btn-success" data-effect="effect-scale"
                            data-toggle="modal" data-target="#add">
                            <i class="ti-plus"></i> اضافه معلم
                    </button>
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم المدرس</th>
                                <th>البريد الالكتروني</th>
                                <th>العنوان</th>
                                <th>التخصص</th>
                                <th>النوع</th>
                                <th>تاريخ الالتحاق</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach($all_teachers as $teacher)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$teacher->teacher_name}}</td>
                                    <td>{{$teacher->email}}</td>
                                    <td>{{$teacher->teacher_address}}</td>
                                    <td>{{$teacher->getSpecialization->name}}</td>
                                    <td>{{$teacher->getGender->gender_name}}</td>
                                    <td>{{$teacher->joining_at}}</td>
                                    <td>
                                        <a class="modal-effect btn btn-info" data-effect="effect-scale" data-toggle="modal"
                                           href="#edit{{$teacher->id}}" title="تعديل"><i class="fa fa-edit"></i>
                                        </a>
                                        <a class="modal-effect btn btn-danger" data-effect="effect-scale"
                                           data-id="{{ $teacher->id }}" data-teacher_name="{{ $teacher->teacher_name }}"
                                           data-toggle="modal" href="#delete" title="حذف"><i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>

                                <!-- edit Teacher -->
                                <div class="modal fade" id="edit{{$teacher->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">تعديل بيانات معلم</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('teacher.update','test')}}" method="post">
                                                {{ method_field('patch') }}
                                                {{ csrf_field() }}

                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="{{$teacher->id}}">
                                                    <div class="row" style="margin-bottom: 10px;">
                                                        <div class="col">
                                                            <label for="exampleInputEmail1">اسم المعلم بالعربيه</label>
                                                            <input type="text" class="form-control" id="teacher_name" name="teacher_name" value="{{$teacher->getTranslation('teacher_name','ar')}}" required>
                                                        </div>
                                                        <div class="col">
                                                            <label for="exampleInputEmail1">اسم المعلم بالانجليزيه</label>
                                                            <input type="text" class="form-control" id="teacher_name_en" name="teacher_name_en" value="{{$teacher->getTranslation('teacher_name','en')}}" required>
                                                        </div>
                                                    </div>
                                                    <div class="row" style="margin-bottom: 10px;">
                                                        <div class="col">
                                                            <label for="exampleInputEmail1">البريد الالكتروني</label>
                                                            <input type="email" class="form-control" id="email" name="email" value="{{$teacher->email}}" required>
                                                        </div>
                                                        <div class="col">
                                                            <label for="exampleInputEmail1">تاريخ الالتحاق</label>
                                                            <input type="date" class="form-control" id="joining_at" name="joining_at" value="{{$teacher->joining_at}}" required>
                                                        </div>
                                                    </div>
                                                    <div class="row" style="margin-bottom: 10px;">
                                                        <div class="col">
                                                            <label for="exampleInputEmail1">التخصص</label>
                                                            <select class="form-control form-control-lg" id="exampleFormControlSelect1" id="specialization_id" name="specialization_id">
                                                                @foreach ($all_specializations as $specialization)
                                                                    <option value="{{ $specialization->id }}" {{$teacher->specialization_id == $specialization->id ? 'selected' : ''}}>{{ $specialization->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col">
                                                            <label for="exampleInputEmail1">النوع</label>
                                                            <select class="form-control form-control-lg" id="exampleFormControlSelect1" id="gender_id" name="gender_id">
                                                                @foreach ($all_genders as $gender)
                                                                    <option value="{{ $gender->id }}" {{$teacher->gender_id == $gender->id ? 'selected' : ''}}>{{ $gender->gender_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="margin-bottom: 10px;">
                                                        <label for="exampleFormControlTextarea1">العنوان</label>
                                                        <textarea class="form-control" id="teacher_address" name="teacher_address" rows="3">{{$teacher->teacher_address}}</textarea>
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
                                <!-- edit Teacher -->

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- This Is For Add New Teacher -->
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">اضافه معلم جديد</h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('teacher.store') }}" method="post">
                        {{ csrf_field() }}

                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col">
                                <label for="exampleInputEmail1">اسم المعلم بالعربيه</label>
                                <input type="text" class="form-control" id="teacher_name" name="teacher_name" value="{{old('teacher_name')}}" required>
{{--                                @error('teacher_name')--}}
{{--                                    <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                                @enderror--}}
                            </div>
                            <div class="col">
                                <label for="exampleInputEmail1">اسم المعلم بالانجليزيه</label>
                                <input type="text" class="form-control" id="teacher_name_en" name="teacher_name_en" value="{{old('teacher_name_en')}}" required>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col">
                                <label for="exampleInputEmail1">البريد الالكتروني</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" required>
                            </div>
                            <div class="col">
                                <label for="exampleInputEmail1">كلمه المرور</label>
                                <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}" required>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col">
                                <label for="exampleInputEmail1">تاريخ الالتحاق</label>
                                <input type="date" class="form-control" id="joining_at" name="joining_at" value="{{old('joining_at')}}" required>
                            </div>
                            <div class="col">
                                <label for="exampleInputEmail1">التخصص</label>
                                <select class="form-control form-control-lg" id="exampleFormControlSelect1" id="specialization_id" name="specialization_id">
                                    <option value="">اختر التخصص</option>
                                    @foreach ($all_specializations as $specialization)
                                        <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="exampleInputEmail1">النوع</label>
                                <select class="form-control form-control-lg" id="exampleFormControlSelect1" id="gender_id" name="gender_id">
                                    <option value="">اختر النوع</option>
                                    @foreach ($all_genders as $gender)
                                        <option value="{{ $gender->id }}">{{ $gender->gender_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom: 10px;">
                            <label for="exampleFormControlTextarea1">العنوان</label>
                            <textarea class="form-control" id="teacher_address" name="teacher_address" rows="3">{{old('teacher_address')}}</textarea>
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
    <!-- This Is For Add New Teacher -->

    <!-- delete Teacher -->
    <div class="modal fade" id="delete">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">حذف معلم</h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{route('teacher.destroy','test')}}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}

                    <div class="modal-body">
                        <p>{{trans('grades_trans.msg_delete_stage')}}</p><br>
                        <input type="hidden" name="id" id="id" value="">
                        <input class="form-control" name="teacher_name" id="teacher_name" type="text" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('grades_trans.btn_cancel')}}</button>
                        <button type="submit" class="btn btn-danger">{{trans('grades_trans.btn_confirm')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- delete Teacher -->

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
            var name   = button.data('teacher_name')
            var modal  = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #teacher_name').val(name);
        })
    </script>
    <!-- This For Delete Form -->
@endsection
