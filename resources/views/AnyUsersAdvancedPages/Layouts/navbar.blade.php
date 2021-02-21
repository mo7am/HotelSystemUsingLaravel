<nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">


            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{__('pageContent.navbar_Language')}} <span class="caret"></span>
                </a>
                <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                    <a class="dropdown-item" rel="alternate" hreflang="{{$localeCode}}" href="{{LaravelLocalization::getLocalizedURL($localeCode , null , [] , true)}}"><img src="{{asset('images/flags/'.$localeCode.'.png')}}" width="30px" height="20x">  {{$properties['native']}}</a>

                    @endforeach
                </div>

            </li>


                <input style="display: none" type="text" value="{{LaravelLocalization::setLocale()}}" id="getLocalValue">
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-envelope-o"></i>
                    <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="header">You have 4 messages</li>
                    <li>
                        <!-- inner menu: contains the actual data -->
                        <ul class="menu">
                            <li><!-- start message -->
                                <a href="#">
                                    <div class="pull-left">
                                        <img src="{{URL::asset('designAnyUserAdvancedPages/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                                    </div>
                                    <h4>
                                        Support Team
                                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                    </h4>
                                    <p>Why not buy a new awesome theme?</p>
                                </a>
                            </li>
                            <!-- end message -->
                            <li>
                                <a href="#">
                                    <div class="pull-left">
                                        <img src="{{URL::asset('designAnyUserAdvancedPages/dist/img/user3-128x128.jpg')}}" class="img-circle" alt="User Image">
                                    </div>
                                    <h4>
                                        AdminLTE Design Team
                                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                    </h4>
                                    <p>Why not buy a new awesome theme?</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="pull-left">
                                        <img src="{{URL::asset('designAnyUserAdvancedPages/dist/img/user4-128x128.jpg')}}" class="img-circle" alt="User Image">
                                    </div>
                                    <h4>
                                        Developers
                                        <small><i class="fa fa-clock-o"></i> Today</small>
                                    </h4>
                                    <p>Why not buy a new awesome theme?</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="pull-left">
                                        <img src="{{URL::asset('designAnyUserAdvancedPages/dist/img/user3-128x128.jpg')}}" class="img-circle" alt="User Image">
                                    </div>
                                    <h4>
                                        Sales Department
                                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                    </h4>
                                    <p>Why not buy a new awesome theme?</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="pull-left">
                                        <img src="{{URL::asset('designAnyUserAdvancedPages/dist/img/user4-128x128.jpg')}}" class="img-circle" alt="User Image">
                                    </div>
                                    <h4>
                                        Reviewers
                                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                                    </h4>
                                    <p>Why not buy a new awesome theme?</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
            </li>
            <!-- Notifications: style can be found in dropdown.less -->
            <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bell-o"></i>
                    <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="header">You have 10 notifications</li>
                    <li>
                        <!-- inner menu: contains the actual data -->
                        <ul class="menu">
                            <li>
                                <a href="#">
                                    <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                                    page and may cause design problems
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-users text-red"></i> 5 new members joined
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-user text-red"></i> You changed your username
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="footer"><a href="#">View all</a></li>
                </ul>
            </li>
            <!-- Tasks: style can be found in dropdown.less -->
            <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-flag-o"></i>
                    <span class="label label-danger">9</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="header">You have 9 tasks</li>
                    <li>
                        <!-- inner menu: contains the actual data -->
                        <ul class="menu">
                            <li><!-- Task item -->
                                <a href="#">
                                    <h3>
                                        Design some buttons
                                        <small class="pull-right">20%</small>
                                    </h3>
                                    <div class="progress xs">
                                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <!-- end task item -->
                            <li><!-- Task item -->
                                <a href="#">
                                    <h3>
                                        Create a nice theme
                                        <small class="pull-right">40%</small>
                                    </h3>
                                    <div class="progress xs">
                                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"
                                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                            <span class="sr-only">40% Complete</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <!-- end task item -->
                            <li><!-- Task item -->
                                <a href="#">
                                    <h3>
                                        Some task I need to do
                                        <small class="pull-right">60%</small>
                                    </h3>
                                    <div class="progress xs">
                                        <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar"
                                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                            <span class="sr-only">60% Complete</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <!-- end task item -->
                            <li><!-- Task item -->
                                <a href="#">
                                    <h3>
                                        Make beautiful transitions
                                        <small class="pull-right">80%</small>
                                    </h3>
                                    <div class="progress xs">
                                        <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar"
                                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                            <span class="sr-only">80% Complete</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <!-- end task item -->
                        </ul>
                    </li>
                    <li class="footer">
                        <a href="#">View all tasks</a>
                    </li>
                </ul>
            </li>
            <!-- User Account: style can be found in dropdown.less -->
            <li class=" user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span id="fnameuserforpage2" class="hidden-xs">{{auth()->user()->fname}} </span>
                    <span id="mnameuserforpage2" class="hidden-xs">{{auth()->user()->mname}} </span>
                    <img id="imgNav" src="{{URL::asset('images/users/'.auth()->user()->image)}}" class="user-image" alt="User Image">



                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                        <img id="imgDropNav" src="{{URL::asset('images/users/'.auth()->user()->image)}}" class="img-circle" alt="User Image">

                        <p>
                            {{auth()->user()->fname}} {{auth()->user()->mname}} -
                            @if(auth()->user()->type_id == 1 )
                                {{__('pageContent.navbar_manager')}}
                            @elseif(auth()->user()->type_id == 2)
                                {{__('pageContent.navbar_receptionist')}}
                            @elseif(auth()->user()->type_id == 3)
                                {{__('pageContent.navbar_acountant')}}
                            @elseif(auth()->user()->type_id == 4)
                                {{__('pageContent.navbar_housekeeping')}}
                            @elseif(auth()->user()->type_id == 5)
                                {{__('pageContent.navbar_chief')}}
                            @elseif(auth()->user()->type_id == 6)
                                {{__('pageContent.navbar_localguest')}}
                            @elseif(auth()->user()->type_id == 7)
                                {{__('pageContent.navbar_foreignguist')}}
                            @endif


                            @if(auth()->user()->created_at->format('m') == 1)
                            <small>{{__('pageContent.navbar_Membersince')}} {{ auth()->user()->created_at->format('d') }} {{__('pageContent.January')}}. {{ auth()->user()->created_at->format('Y') }}</small>
                                @elseif(auth()->user()->created_at->format('m') == 2)
                                    <small>{{__('pageContent.navbar_Membersince')}} {{ auth()->user()->created_at->format('d') }} {{__('pageContent.February')}}. {{ auth()->user()->created_at->format('Y') }}</small>
                            @elseif(auth()->user()->created_at->format('m') == 3)
                                <small>{{__('pageContent.navbar_Membersince')}} {{ auth()->user()->created_at->format('d') }} {{__('pageContent.March')}}. {{ auth()->user()->created_at->format('Y') }}</small>
                            @elseif(auth()->user()->created_at->format('m') == 4)
                                <small>{{__('pageContent.navbar_Membersince')}} {{ auth()->user()->created_at->format('d') }} {{__('pageContent.April')}}. {{ auth()->user()->created_at->format('Y') }}</small>
                            @elseif(auth()->user()->created_at->format('m') == 5)
                                <small>{{__('pageContent.navbar_Membersince')}} {{ auth()->user()->created_at->format('d') }} {{__('pageContent.May')}}. {{ auth()->user()->created_at->format('Y') }}</small>
                            @elseif(auth()->user()->created_at->format('m') == 6)
                                <small>{{__('pageContent.navbar_Membersince')}} {{ auth()->user()->created_at->format('d') }} {{__('pageContent.June')}}. {{ auth()->user()->created_at->format('Y') }}</small>
                            @elseif(auth()->user()->created_at->format('m') == 7)
                                <small>{{__('pageContent.navbar_Membersince')}} {{ auth()->user()->created_at->format('d') }} {{__('pageContent.July')}}. {{ auth()->user()->created_at->format('Y') }}</small>
                            @elseif(auth()->user()->created_at->format('m') == 8)
                                <small>{{__('pageContent.navbar_Membersince')}} {{ auth()->user()->created_at->format('d') }} {{__('pageContent.August')}}. {{ auth()->user()->created_at->format('Y') }}</small>
                            @elseif(auth()->user()->created_at->format('m') == 9)
                                <small>{{__('pageContent.navbar_Membersince')}} {{ auth()->user()->created_at->format('d') }} {{__('pageContent.september')}}. {{ auth()->user()->created_at->format('Y') }}</small>
                            @elseif(auth()->user()->created_at->format('m') == 10)
                                <small>{{__('pageContent.navbar_Membersince')}} {{ auth()->user()->created_at->format('d') }} {{__('pageContent.October')}}. {{ auth()->user()->created_at->format('Y') }}</small>
                            @elseif(auth()->user()->created_at->format('m') == 11)
                                <small>{{__('pageContent.navbar_Membersince')}} {{ auth()->user()->created_at->format('d') }} {{__('pageContent.November')}}. {{ auth()->user()->created_at->format('Y') }}</small>
                            @elseif(auth()->user()->created_at->format('m') == 12)
                                <small>{{__('pageContent.navbar_Membersince')}} {{ auth()->user()->created_at->format('d') }} {{__('pageContent.December')}}. {{ auth()->user()->created_at->format('Y') }}</small>

                                @endif
                        </p>
                    </li>

                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="pull-left">
                            <a href="{{route('MyProfile')}}" class="btn btn-default btn-flat"> {{__('pageContent.navbar_profile')}}</a>
                        </div>
                        <div class="pull-right">
                            <a  href="{{ route('logout') }}" class="btn btn-default btn-flat"> {{__('pageContent.navbar_signout')}}</a>
                        </div>
                    </li>
                </ul>
            </li>



            <!-- Control Sidebar Toggle Button -->

            <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>
        </ul>
    </div>
</nav>

@section('scripts')
    <script src="jquery-3.0.0.min.js"></script>

    <script type="text/javascript">





    </script>
@endsection