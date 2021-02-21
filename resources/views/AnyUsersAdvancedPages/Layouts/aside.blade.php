<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" >
        <!-- Sidebar user panel -->
        <div class="user-panel">

            @if(App::isLocale('ar'))
                <div class="pull-right image">
                    <img id="imgAsideAr" src="{{URL::asset('images/users/'.auth()->user()->image)}}" class="img-circle" alt="User Image">
                </div>
            @elseif(App::isLocale('en'))
                <div class="pull-left image">
                    <img id="imgAsideEn" src="{{URL::asset('images/users/'.auth()->user()->image)}}" class="img-circle" alt="User Image">
                </div>

            @endif

            <div class="pull-left info">
                <p> </p>
                <a href="#"><i class="fa fa-circle text-success"></i> {{__('pageContent.aside_online')}}</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{__('pageContent.aside_search')}}">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">{{__('pageContent.aside_mainNavigation')}}</li>


            @role('Manager')
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>{{__('pageContent.aside_dashboard')}}</span>



                    @if(App::isLocale('ar'))
                        <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                    @elseif(App::isLocale('en'))
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>

                    @endif



                </a>



                <ul class="treeview-menu">
                    <li class="active"><a href="{{url('/ajax_upload')}}"><i class="fa fa-circle-o"></i> {{__('pageContent.aside_test')}}</a></li>
                </ul>

            </li>
            @endrole


            @role('Manager')
            <li class=" treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>{{__('pageContent.aside_roomType')}}</span>



                    @if(App::isLocale('ar'))
                        <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                    @elseif(App::isLocale('en'))
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>

                    @endif



                </a>



                <ul class="treeview-menu">
                    <li class="active"><a href="{{route('RoomType')}}"><i class="fa fa-circle-o"></i> {{__('pageContent.aside_crudRoomType')}}</a></li>
                    <li ><a href="{{route('Manager.Room.Room')}}"><i class="fa fa-circle-o"></i> {{__('pageContent.aside_crudRoom')}}</a></li>

                </ul>



            </li>
            @endrole


            <li>

               @role('Manager')
                <a href="{{route('crudStaff')}}">
                    <i class="fa fa-th"></i> <span>{{__('pageContent.aside_crudStaff')}}</span>
                    <span class="pull-right-container">

            </span>
                </a>

           @endrole

            </li>

            @role('any')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>One To One Relations</span>
                    @if(App::isLocale('ar'))
                        <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                    @elseif(App::isLocale('en'))
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>

                    @endif
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('HasOne')}}"><i class="fa fa-circle-o"></i> OneToOne</a></li>
                    <li><a href="{{route('HasOneReverse')}}"><i class="fa fa-circle-o"></i> OneToOneReverse</a></li>
                    <li><a href="{{route('GetStaffHasPhone')}}"><i class="fa fa-circle-o"></i> OneToOne(WhereHas)</a></li>
                    <li><a href="{{route('GetStaffNotHasPhone')}}"><i class="fa fa-circle-o"></i> OneToOne(WhereDoesNotHave)</a></li>
                    <li><a href="{{route('GetStaffHasPhoneWithCondition')}}"><i class="fa fa-circle-o"></i> OneToOne(WhereHasWithCondition)</a></li>




                </ul>
            </li>





            @endrole


            @role('Receptionist')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>{{__('pageContent.availableroom')}}</span>
                    @if(App::isLocale('ar'))
                        <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                    @elseif(App::isLocale('en'))
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>

                    @endif
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('rooms')}}"><i class="fa fa-circle-o"></i> {{__('pageContent.rooms')}} </a></li>




                </ul>
            </li>
            @endrole

            @role('any')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>One To Many Relation</span>
                    @if(App::isLocale('ar'))
                        <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                    @elseif(App::isLocale('en'))
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>

                    @endif
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('SpecialistHasManyStaff')}}"><i class="fa fa-circle-o"></i> One To Many</a></li>
                    <li><a href="{{route('HasManyReverse')}}"><i class="fa fa-circle-o"></i> OneToOneReverse</a></li>

                </ul>
            </li>

            @endrole

            @role('Acountant')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Forms</span>
                    @if(App::isLocale('ar'))
                        <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                    @elseif(App::isLocale('en'))
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>

                    @endif
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
                    <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
                    <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
                </ul>
            </li>
            @endrole


            @role('Housekeaping')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Tables</span>
                    @if(App::isLocale('ar'))
                        <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                    @elseif(App::isLocale('en'))
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>

                    @endif
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
                    <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
                </ul>
            </li>
            @endrole


            @role('Cheif')
            <li>
                <a href="pages/calendar.html">
                    <i class="fa fa-calendar"></i> <span>Calendar</span>
                    <span class="pull-right-container">

            </span>
                </a>
            </li>

            @endrole


            @role('localguest')
            <li>
                <a href="pages/mailbox/mailbox.html">
                    <i class="fa fa-envelope"></i> <span>Mailbox</span>
                    <span class="pull-right-container">

            </span>
                </a>
            </li>

            @endrole


            @role('foreignguist')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Examples</span>
                    @if(App::isLocale('ar'))
                        <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                    @elseif(App::isLocale('en'))
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>

                    @endif
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
                    <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
                    <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
                    <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
                    <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
                    <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
                    <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
                    <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
                    <li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
                </ul>
            </li>

            @endrole

            @role('any')
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>

            @endrole
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
