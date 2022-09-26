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
    {{$title}}
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
    <div class="col-lg-4 pull-right">
        <div class="card mb-4">
            <div class="card-body text-center">
                <img src="{{ asset('assets/images/student.jpg') }}"
                     alt="avatar"
                     class="rounded-circle img-fluid" style="width: 150px;">
                <h5 style="font-family: Cairo" class="my-3">{{ $student->student_name }}</h5>
                <p class="text-muted mb-1">{{ $student->email }}</p>
                <p class="text-muted mb-4">@lang('main_sidebar.student')</p>
            </div>
        </div>
    </div>
    <div class="col-lg-8 pull-left">
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{route('student.updateProfile',$student->id)}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">اسم المستخدم باللغة العربية</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">
                                <input type="text" name="name"
                                       value="{{ $student->getTranslation('student_name', 'ar') }}"
                                       class="form-control">
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">اسم المستخدم باللغة الانجليزية</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">
                                <input type="text" name="name_en"
                                       value="{{ $student->getTranslation('student_name', 'en') }}"
                                       class="form-control">
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">كلمة المرور</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">
                                <input type="password" id="password" class="form-control" name="password">
                            </p><br><br>
                            <input type="checkbox" class="form-check-input" onclick="myFunction()"
                                   id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">اظهار كلمة المرور</label>
                        </div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-success">تعديل البيانات</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
    <script type="text/javascript">
        function myFunction(){
            let x = document.getElementById('password');
            if(x.type === 'password'){
                x.type = 'text';
            }else{
                x.type = 'password';
            }
        }
    </script>
@endsection
