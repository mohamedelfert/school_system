<!DOCTYPE html>
<html lang="en">
@section('title')
    {{trans('main_sidebar.main_title')}}
@stop
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template"/>
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template"/>
    <meta name="author" content="potenzaglobalsolutions.com"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
    @include('layouts.head')
</head>

<body style="font-family: 'Cairo', sans-serif">

<div class="wrapper" style="font-family: 'Cairo', sans-serif">

    <!--=================================
preloader -->

    <div id="pre-loader">
        <img src="{{ URL::asset('assets/images/pre-loader/loader-01.svg') }}" alt="">
    </div>

    <!--=================================
preloader -->

@include('layouts.main-header')

@include('layouts.main-sidebar')

<!--=================================
 Main content -->
    <!-- main-content -->
    <div class="content-wrapper">
        <div class="page-title" style="margin-bottom: 15px;">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="mb-0" style="font-family: 'Cairo', sans-serif"> مرحبا بك
                        : {{ auth()->user()->father_name }}</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <h4 class="card-title">أبنائك</h4>
                        <div class="container py-5">
                            <div class="row justify-content-center">
                                @foreach($students as $index => $student)
                                    <div class="col-md-8 col-lg-6 col-xl-4">
                                        <div class="card mb-4">
                                            <div class="card-body text-center">
                                                @if($student->gender_id == 1)
                                                    <img src="{{ asset('assets/images/male.png') }}" alt="avatar"
                                                         class="rounded-circle img-fluid" style="width: 100px;">
                                                @elseif($student->gender_id == 2)
                                                    <img src="{{ asset('assets/images/female.png') }}" alt="avatar"
                                                         class="rounded-circle img-fluid" style="width: 100px;">
                                                @endif
                                                <hr>
                                                <div class="text-center">
                                                    <h5 class="card-title">{{ $student->student_name }}</h5>
                                                    <p class="text-muted mb-4">معلومات الطالب</p>
                                                </div>
                                                <div>
                                                    <div class="d-flex justify-content-between">
                                                        <span>المرحلة</span>
                                                        <span>{{$student->getGrades->name}}</span>
                                                    </div>
                                                    <div class="d-flex justify-content-between">
                                                        <span>الصف</span>
                                                        <span>{{$student->getChapters->chapter_name}}</span>
                                                    </div>
                                                    <div class="d-flex justify-content-between">
                                                        <span>الفصل</span>
                                                        <span>{{$student->getSections->section_name}}</span>
                                                    </div>
                                                    <div class="d-flex justify-content-between">
                                                        @if(\App\Models\Degree::where('student_id',$student->id)->count() != 0)
                                                            <span>عدد الاختبارات</span>
                                                            <span class="badge badge-success">
                                                                {{ \App\Models\Degree::where('student_id',$student->id)->count() }}
                                                            </span>
                                                        @else
                                                            <span>عدد الاختبارات</span>
                                                            <span class="badge badge-danger">
                                                                ( {{ \App\Models\Degree::where('student_id',$student->id)->count() }} )
                                                                لا يوجد اختبارات لديه
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="text-center mt-5 text-primary">
                                                        <a href="{{ route('children.results',$student->id) }}">
                                                            <i class="fas fa-eye"></i>
                                                            <span class="right-nav-text"></span>مشاهده درجات الاختبارات</a>
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
            </div>
        </div>

        <!--=================================footer -->

        @include('layouts.footer')
    </div><!-- main content wrapper end-->
</div>
<!--=================================footer -->

@include('layouts.footer-scripts')
@livewireScripts
@stack('scripts')

</body>

</html>
