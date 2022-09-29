<ul class="nav navbar-nav side-menu" id="sidebarnav">

    <!-- Dashboard -->
    <li>
        <a href="{{ url('/parents/dashboard') }}">
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

    <!-- children -->
    <li>
        <a href="{{ route('parent.children') }}"><i class="fas fa-users"></i><span class="right-nav-text"></span>الأبناء</a>
    </li>
    <!-- children -->

    <!-- Attendance Report -->
    <li>
        <a href="{{ route('attendance.reports') }}"><i class="fas fa-pie-chart"></i><span class="right-nav-text"></span>تقرير الحضور والغياب</a>
    </li>
    <!-- Attendance Report -->

    <!-- Fees Report -->
    <li>
        <a href="{{ route('student-fees') }}"><i class="fas fa-money"></i><span class="right-nav-text"></span>تقرير المالية</a>
    </li>
    <!-- Fees Report -->

    <!-- Profile -->
    <li>
        <a href="{{ route('parent.showProfile') }}"><i class="fas fa-cogs"></i><span class="right-nav-text"></span>الملف الشخصي</a>
    </li>
    <!-- Profile -->

</ul>
