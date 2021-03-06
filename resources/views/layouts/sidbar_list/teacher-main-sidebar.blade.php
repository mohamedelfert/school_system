<ul class="nav navbar-nav side-menu" id="sidebarnav">

    <!-- Dashboard -->
    <li>
        <a href="{{ url('/dashboard') }}">
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

    <!-- attendance_absence -->
    <li>
        <a href="javascript:void(0);" data-toggle="collapse" data-target="#attendance_absence">
            <div class="pull-left"><i class="fas fa-calendar-alt"></i><span class="right-nav-text">{{trans('main_sidebar.attendance_absence')}}</span></div>
            <div class="pull-right"><i class="ti-plus"></i></div>
            <div class="clearfix"></div>
        </a>
        <ul id="attendance_absence" class="collapse" data-parent="#sidebarnav">
            <li> <a href="{{route('attendances.index')}}">{{trans('main_sidebar.student_list_attendance')}}</a> </li>
        </ul>
    </li>
    <!-- attendance_absence -->

    <!-- Exams -->
    <li>
        <a href="javascript:void(0);" data-toggle="collapse" data-target="#exams">
            <div class="pull-left"><i class="fas fa-book-open"></i><span class="right-nav-text">{{trans('main_sidebar.exams')}}</span></div>
            <div class="pull-right"><i class="ti-plus"></i></div>
            <div class="clearfix"></div>
        </a>
        <ul id="exams" class="collapse" data-parent="#sidebarnav">
            <li> <a href="{{route('exams.index')}}">{{trans('main_sidebar.exams_list')}}</a> </li>
            <li> <a href="{{route('questions.index')}}">{{trans('main_sidebar.questions_list')}}</a> </li>
        </ul>
    </li>
    <!-- Exams -->

    <!-- Online Classes-->
    <li>
        <a href="javascript:void(0);" data-toggle="collapse" data-target="#online">
            <div class="pull-left"><i class="fas fa-video"></i><span class="right-nav-text">{{trans('main_sidebar.online_classes')}}</span></div>
            <div class="pull-right"><i class="ti-plus"></i></div>
            <div class="clearfix"></div>
        </a>
        <ul id="online" class="collapse" data-parent="#sidebarnav">
            <li> <a href="{{route('online_classes.index')}}">{{trans('main_sidebar.online_classes_list')}}</a> </li>
        </ul>
    </li>
    <!-- Online -->

    <!-- Profile -->
    <li>
        <a href="#"><i class="fas fa-cogs"></i><span class="right-nav-text"></span>?????????? ????????????</a>
    </li>
    <!-- Profile -->

</ul>
