<ul class="nav navbar-nav side-menu" id="sidebarnav">

    <!-- Dashboard -->
    <li>
        <a href="{{ url('/students/dashboard') }}">
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

    <!-- Exams -->
    <li>
        <a href="{{ route('student-exams.index') }}"><i class="fas fa-book-open"></i><span class="right-nav-text"></span>{{trans('main_sidebar.exams')}}</a>
    </li>
    <!-- Exams -->


    <!-- Profile -->
    <li>
        <a href="#"><i class="fas fa-cogs"></i><span class="right-nav-text"></span>الملف الشخصي</a>
    </li>
    <!-- Profile -->

</ul>
