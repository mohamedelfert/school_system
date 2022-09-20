<ul class="nav navbar-nav side-menu" id="sidebarnav">

    <!-- Dashboard -->
    <li>
        <a href="{{ url('/teachers/dashboard') }}">
            <div class="pull-left"><i class="ti-home"></i>
                <span class="right-nav-text">{{ trans('main_sidebar.dashboard') }}</span>
            </div>
            <div class="clearfix"></div>
        </a>
    </li>
    <!-- Dashboard -->

    <!-- Title -->
    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{ trans('main_sidebar.main_title') }}</li>
    <!-- Title -->

    <!-- Sections -->
    <li>
        <a href="{{route('sections')}}">
            <i class="fas fa-chalkboard"></i><span class="right-nav-text"></span>{{trans('main_sidebar.sections')}}
        </a>
    </li>
    <!-- Sections -->

    <!-- Students -->
    <li>
        <a href="{{route('students')}}">
            <i class="fas fa-users-class"></i><span class="right-nav-text"></span>{{trans('main_sidebar.students')}}
        </a>
    </li>
    <!-- Students -->

    <!-- Exams -->
    <li>
        <a href="javascript:void(0);" data-toggle="collapse" data-target="#exams">
            <div class="pull-left"><i class="fas fa-book-open"></i><span class="right-nav-text">{{trans('main_sidebar.exams')}}</span></div>
            <div class="pull-right"><i class="ti-plus"></i></div>
            <div class="clearfix"></div>
        </a>
        <ul id="exams" class="collapse" data-parent="#sidebarnav">
            <li> <a href="{{ route('tests.index')}}">{{trans('main_sidebar.exams_list')}}</a> </li>
            <li> <a href="{{ route('test-questions.index')}}">{{trans('main_sidebar.questions_list')}}</a> </li>
        </ul>
    </li>
    <!-- Exams -->

    <!-- Reports -->
    <li>
        <a href="javascript:void(0);" data-toggle="collapse" data-target="#reports">
            <div class="pull-left"><i class="fas fa-pie-chart"></i><span class="right-nav-text">{{trans('main_sidebar.reports')}}</span></div>
            <div class="pull-right"><i class="ti-plus"></i></div>
            <div class="clearfix"></div>
        </a>
        <ul id="reports" class="collapse" data-parent="#sidebarnav">
            <li> <a href="{{route('attendance-reports')}}">{{trans('main_sidebar.attendance_absence_report')}}</a> </li>
            <li> <a href="#">{{trans('main_sidebar.exams_report')}}</a> </li>
        </ul>
    </li>
    <!-- Reports -->

    <!-- Profile -->
    <li>
        <a href="#"><i class="fas fa-cogs"></i><span class="right-nav-text"></span>الملف الشخصي</a>
    </li>
    <!-- Profile -->

</ul>
