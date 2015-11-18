<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                        <img alt="image" class="img-circle" src="{{asset('backend/theme/img/profile_small.jpg')}}" />
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{Auth()->user()->name}}</strong>
                            </span> <span class="text-muted text-xs block">Art Director<b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile.html"> {{trans('admin/common.profile')}}</a></li>
                        <li><a href="contacts.html"> {{trans('admin/common.contact')}}</a></li>
                        <li><a href="mailbox.html"> {{trans('admin/common.mailbox')}}</a></li>
                        <li class="divider"></li>
                        <li><a href="/admin/logout"> {{trans('admin/common.logout')}}</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    {{trans('admin/common.logo')}}
                </div>
            </li>
            <li class="active">
                <a href="{{route('admin.student.index')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Students</span></a>               
            </li>
            <li>
                <a href="{{route('admin.teacher.index')}}"><i class="fa fa-diamond"></i> <span class="nav-label">Teachers</span></a>
            </li>
            <li>
                <a href="{{route('admin.priod.index')}}"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Priods</span></a>               
            </li>
            <li>
                <a href="{{route('admin.class.index')}}"><i class="fa fa-envelope"></i> <span class="nav-label">Classes</span></a>                
            </li>
            <li>
                <a href="{{route('admin.subject.index')}}"><i class="fa fa-flask"></i> <span class="nav-label">Subjects</span> </a>
            </li>
            <li>
                <a href="{{route('admin.teachersubject.index')}}"><i class="fa fa-edit"></i> <span class="nav-label">Teacher Subject</span></a>
               
            </li>
            <li>
                <a href="{{route('admin.teachingclass.index')}}"><i class="fa fa-desktop"></i> <span class="nav-label">Teaching Class</span></a>
                
            </li>
            <li>
                <a href="{{route('admin.studentlearning.index')}}"><i class="fa fa-files-o"></i> <span class="nav-label">Student Learning</span></a>
                
            </li>
            <li>
                <a href="{{route('admin.scoretype.index')}}"><i class="fa fa-globe"></i> <span class="nav-label">Score Type</span></a>               
            </li>
            <li>
                <a href="{{route('admin.conduct.index')}}"><i class="fa fa-flask"></i> <span class="nav-label">Conduct</span></a>               
            </li>

            <li>
                <a href="{{route('admin.rankingacademic.index')}}"><i class="fa fa-laptop"></i> <span class="nav-label">Ranking Academics</span></a>
            </li>            
            <li>
                <a href="{{route('admin.award.index')}}"><i class="fa fa-picture-o"></i> <span class="nav-label">Award</span></a>                
            </li>
            <li>
                <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Menu Levels </span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="#">Third Level <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="#">Third Level Item</a>
                            </li>
                            <li>
                                <a href="#">Third Level Item</a>
                            </li>
                            <li>
                                <a href="#">Third Level Item</a>
                            </li>

                        </ul>
                    </li>
                    <li><a href="#">Second Level Item</a></li>
                    <li>
                        <a href="#">Second Level Item</a></li>
                    <li>
                        <a href="#">Second Level Item</a></li>
                </ul>
            </li>
          
        </ul>
    </div>
</nav>
