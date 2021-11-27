<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
{{--                <div class="scrollbar side-menu-bg" style="overflow: scroll">--}}
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

                    <!-- Grades -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#grades">
                            <div class="pull-left"><i class="fas fa-school"></i><span
                                    class="right-nav-text">{{trans('main_sidebar.grades')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="grades" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('grade.index')}}">{{trans('main_sidebar.grades_list')}}</a></li>
                        </ul>
                    </li>
                    <!-- Grades -->

                    <!-- Chapters -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#chapters">
                            <div class="pull-left"><i class="fa fa-building"></i><span
                                    class="right-nav-text">{{trans('main_sidebar.chapters')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="chapters" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('chapter.index')}}">{{trans('main_sidebar.chapters_list')}}</a></li>
                        </ul>
                    </li>
                    <!-- Chapters -->

                    <!-- Sections -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections">
                            <div class="pull-left"><i class="fas fa-chalkboard"></i><span
                                    class="right-nav-text">{{trans('main_sidebar.sections')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="sections" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('section.index')}}">{{trans('main_sidebar.sections_list')}}</a></li>
                        </ul>
                    </li>
                    <!-- Sections -->

                    <!-- Students -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#students">
                            <div class="pull-left"><i class="fas fa-user-graduate"></i><span
                                    class="right-nav-text">{{trans('main_sidebar.students')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="students" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="chart-js.html">Chart.js</a> </li>
                        </ul>
                    </li>
                    <!-- Students -->

                    <!-- Teachers -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#teachers">
                            <div class="pull-left"><i class="fas fa-chalkboard-teacher"></i><span class="right-nav-text">{{trans('main_sidebar.teachers')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="teachers" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="editor.html">Editor</a> </li>
                        </ul>
                    </li>
                    <!-- Teachers -->

                    <!-- Specialization -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#specialization">
                            <div class="pull-left"><i class="fas fa-books"></i><span class="right-nav-text">{{trans('main_sidebar.specialization')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="specialization" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('specialization.index')}}">{{trans('main_sidebar.specialization_list')}}</a> </li>
                        </ul>
                    </li>
                    <!-- Specialization -->

                    <!-- Parents -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#parents">
                            <div class="pull-left"><i class="fas fa-user-tie"></i><span class="right-nav-text">{{trans('main_sidebar.parents')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="parents" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ url('/parent') }}">{{trans('main_sidebar.list_parent')}}</a> </li>
                        </ul>
                    </li>
                    <!-- Parents -->

                    <!-- Accounts -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#accounts">
                            <div class="pull-left"><i class="fas fa-money-bill-wave-alt"></i><span class="right-nav-text">{{trans('main_sidebar.accounts')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="accounts" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="editor.html">Editor</a> </li>
                        </ul>
                    </li>
                    <!-- Accounts -->

                    <!-- attendance_absence -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#attendance_absence">
                            <div class="pull-left"><i class="fas fa-calendar-alt"></i><span class="right-nav-text">{{trans('main_sidebar.attendance_absence')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="attendance_absence" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="editor.html">Editor</a> </li>
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
                            <li> <a href="editor.html">Editor</a> </li>
                        </ul>
                    </li>
                    <!-- Exams -->

                    <!-- Library -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#library">
                            <div class="pull-left"><i class="fas fa-book"></i><span class="right-nav-text">{{trans('main_sidebar.library')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="library" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="editor.html">Editor</a> </li>
                        </ul>
                    </li>
                    <!-- Library -->

                    <!-- Online -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#online">
                            <div class="pull-left"><i class="fas fa-video"></i><span class="right-nav-text">{{trans('main_sidebar.online')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="online" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="editor.html">Editor</a> </li>
                        </ul>
                    </li>
                    <!-- Online -->

                    <!-- Settings -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#settings">
                            <div class="pull-left"><i class="fas fa-cogs"></i><span class="right-nav-text">{{trans('main_sidebar.settings')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="settings" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="editor.html">Editor</a> </li>
                        </ul>
                    </li>
                    <!-- Settings -->

                    <!-- Users -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#users">
                            <div class="pull-left"><i class="fas fa-users"></i><span class="right-nav-text">{{trans('main_sidebar.users')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="users" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="editor.html">Editor</a> </li>
                        </ul>
                    </li>
                    <!-- Users -->

                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================-->
