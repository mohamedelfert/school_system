<!DOCTYPE html>
<html lang="en">
@section('title')
    {{trans('main_sidebar.main_title')}}
@stop
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
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
                    <div class="col-sm-6" >
                        <h4 class="mb-0" style="font-family: 'Cairo', sans-serif"> مرحبا بك أستاذ : {{ auth()->user()->teacher_name }}</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                        </ol>
                    </div>
                </div>
            </div>
            <!-- widgets -->
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-danger">
                                        <i class="fa fa-users highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">عدد الطلاب</p>
                                    <h4>{{ $studentsCount }}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i>
                                <a href="{{ route('students') }}">مشاهده</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-warning">
                                        <i class="fa fa-user-secret highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">عدد الاقسام</p>
                                    <h4>{{ $sectionsCount }}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i>
                                <a href="{{ route('sections') }}">مشاهده</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Orders Status widgets-->
            <div class="row">
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="tab nav-border" style="position: relative;">
                                <div class="d-block d-md-flex justify-content-between">
                                    <div class="d-block w-100">
                                        <h5 class="card-title">اخر العمليات علي النظام</h5>
                                    </div>
                                    <div class="d-block d-md-flex nav-tabs-custom">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active show" id="student-tab" data-toggle="tab"
                                                   href="#student" role="tab" aria-controls="student"
                                                   aria-selected="true">الطلاب</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="teacher-tab" data-toggle="tab" href="#teacher"
                                                   role="tab" aria-controls="teacher" aria-selected="false">المعلمين
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="parent-tab" data-toggle="tab" href="#parent"
                                                   role="tab" aria-controls="parent" aria-selected="false">اوليا الامور
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="fee-tab" data-toggle="tab" href="#fee"
                                                   role="tab" aria-controls="fee" aria-selected="false">الفواتير
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade active show" id="student" role="tabpanel" aria-labelledby="student-tab">
                                        <table class="table table-striped table-bordered p-0 text-center">
                                            <thead>
                                            <tr class="alert-success">
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
                                                <th>تاريخ الاضافه</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @forelse(\App\Models\Student::latest()->take(5)->get() as $student)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $student->student_name }}</td>
                                                    <td>{{ $student->email }}</td>
                                                    <td>{{ $student->getGrades->name }}</td>
                                                    <td>{{ $student->getChapters->chapter_name }}</td>
                                                    <td>{{ $student->getSections->section_name }}</td>
                                                    <td>{{ $student->getParents->father_name }}</td>
                                                    <td>{{ $student->date_of_birth }}</td>
                                                    <td>{{ $student->getGenders->gender_name }}</td>
                                                    <td>{{ $student->getNationalities->name }}</td>
                                                    <td>{{ $student->created_at }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td class="alert-danger" colspan="12">لا توجد بيانات</td>
                                                </tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade active show" id="teacher" role="tabpanel" aria-labelledby="teacher-tab">
                                        <table class="table table-striped table-bordered p-0 text-center">
                                            <thead>
                                            <tr class="alert-info">
                                                <th>#</th>
                                                <th>اسم المدرس</th>
                                                <th>البريد الالكتروني</th>
                                                <th>العنوان</th>
                                                <th>التخصص</th>
                                                <th>النوع</th>
                                                <th>تاريخ الالتحاق</th>
                                                <th>تاريخ الاضافه</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @forelse(\App\Models\Teacher::latest()->take(5)->get() as $teacher)
                                                <tr>
                                                    <td>{{$i++}}</td>
                                                    <td>{{$teacher->teacher_name}}</td>
                                                    <td>{{$teacher->email}}</td>
                                                    <td>{{$teacher->teacher_address}}</td>
                                                    <td>{{$teacher->getSpecialization->name}}</td>
                                                    <td>{{$teacher->getGender->gender_name}}</td>
                                                    <td>{{$teacher->joining_at}}</td>
                                                    <td>{{$teacher->created_at}}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td class="alert-danger" colspan="12">لا توجد بيانات</td>
                                                </tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade active show" id="parent" role="tabpanel" aria-labelledby="parent-tab">
                                        <table class="table table-striped table-bordered p-0 text-center">
                                            <thead>
                                            <tr class="alert-primary">
                                                <th>#</th>
                                                <th>اسم ولي الامر</th>
                                                <th>البريد الالكتروني</th>
                                                <th>العنوان</th>
                                                <th>رقم الهويه</th>
                                                <th>رقم الهاتف</th>
                                                <th>تاريخ الاضافه</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @forelse(\App\Models\MyParent::latest()->take(5)->get() as $parent)
                                                <tr>
                                                    <td>{{$i++}}</td>
                                                    <td>{{$parent->father_name}}</td>
                                                    <td>{{$parent->email}}</td>
                                                    <td>{{$parent->father_address}}</td>
                                                    <td>{{$parent->father_id}}</td>
                                                    <td>{{$parent->father_phone}}</td>
                                                    <td>{{$parent->created_at}}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td class="alert-danger" colspan="12">لا توجد بيانات</td>
                                                </tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade active show" id="fee" role="tabpanel" aria-labelledby="fee-tab">
                                        <table class="table table-striped table-bordered p-0 text-center">
                                            <thead>
                                            <tr class="alert-warning">
                                                <th>#</th>
                                                <th>تاريخ الفاتوره</th>
                                                <th>اسم الطالب</th>
                                                <th>المرحله الدراسيه</th>
                                                <th>الصف الدراسي</th>
                                                <th>نوع الرسوم</th>
                                                <th>المبلغ</th>
                                                <th>تاريخ الاضافه</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @forelse(\App\Models\FeesInvoices::latest()->take(5)->get() as $fee)
                                                <tr>
                                                    <td>{{$i++}}</td>
                                                    <td>{{$fee->invoice_date}}</td>
                                                    <td>{{$fee->getStudent->student_name}}</td>
                                                    <td>{{$fee->getgrades->name}}</td>
                                                    <td>{{$fee->getChapters->chapter_name}}</td>
                                                    <td>{{$fee->getStudyFees->name}}</td>
                                                    <td>{{number_format($fee->amount, 2)}} $</td>
                                                    <td>{{$fee->created_at}}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td class="alert-danger" colspan="12">لا توجد بيانات</td>
                                                </tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--=================================
wrapper -->




            <div class="row">
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="tab nav-border" style="position: relative;">
                                <livewire:calendar />
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
