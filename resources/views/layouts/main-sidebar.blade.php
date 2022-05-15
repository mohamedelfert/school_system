<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
{{--                <div class="scrollbar side-menu-bg" style="overflow: scroll">--}}

                @if(auth('web')->check())
                    @include('layouts.sidbar_list.admin-main-sidebar')
                @elseif(auth('student')->check())
                    @include('layouts.sidbar_list.student-main-sidebar')
                @elseif(auth('teacher')->check())
                    @include('layouts.sidbar_list.teacher-main-sidebar')
                @elseif(auth('parent')->check())
                    @include('layouts.sidbar_list.parent-main-sidebar')
                @endif

            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================-->
