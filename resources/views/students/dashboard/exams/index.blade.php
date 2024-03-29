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
    {{trans('main_sidebar.exams_list')}}
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
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0 text-center">
                        <thead>
                            <tr class="alert-success">
                                <th>#</th>
                                <th>اسم المادة</th>
                                <th>اسم الاختبار</th>
                                <th>تاريخ بداية الامتحان</th>
                                <th>تاريخ نهاية الامتحان</th>
                                <th>دخول / درجه الاختبار</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($exams as $index => $exam)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $exam->getSubjects->subject_name }}</td>
                                    <td>{{ $exam->name }}</td>
                                    <td>
                                        <span class="badge badge-pill badge-primary">
                                              {{ $exam->date_start }}
                                        </span>
                                      </td>
                                    <td>
                                     <span class="badge badge-pill badge-danger">
                                              {{ $exam->date_end }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($exam->degrees->count() > 0 && $exam->id === $exam->degrees[0]->exam_id)
                                            @if($exam->degrees[0]->score <= 25)
                                                <span class="badge badge-pill badge-danger">
                                                    {{ $exam->degrees[0]->score }}
                                                </span>
                                            @elseif($exam->degrees[0]->score > 25 && $exam->degrees[0]->score <= 60)
                                                <span class="badge badge-pill badge-primary">
                                                    {{ $exam->degrees[0]->score }}
                                                </span>
                                            @else
                                                <span class="badge badge-pill badge-success">
                                                    {{ $exam->degrees[0]->score }}
                                                </span>
                                            @endif
                                        @else
                                            <a class="btn btn-warning btn-sm" href="{{ route('student-exams.show',$exam->id) }}" onclick="alertAbuse()" title="دخول">
                                                <i class="fa fa-hourglass-start"></i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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
        function alertAbuse() {
            alert('الرجاء عدم إعادة تحميل الصفحة بعد دخول الامتحان - في حال عمل ذلك يتم إلغاء الامتحان تلقائيا');
        }
    </script>
@endsection
