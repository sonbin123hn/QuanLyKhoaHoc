<aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    @if(Auth::user()->is_admin == 1 )
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/admin/dashboard')}}" aria-expanded="false">
                                <!-- <i class="mdi mdi-av-timer"></i> -->
                                <i class="fa fa-tachometer"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/admin/user/profile')}}" aria-expanded="false">
                                <i class="mdi mdi-account-circle"></i>
                                <span class="hide-menu">Profile</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/admin/listMember')}}" aria-expanded="false">
                                <i class="fa fa-users"></i>
                                <span class="hide-menu">List Member</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/admin/browsing-account')}}" aria-expanded="false">
                                <i class="fa fa-users"></i>
                                <span class="hide-menu">Account Management</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/admin/course')}}" aria-expanded="false">
                                <i class="mdi mdi-book-variant"></i>
                                <span class="hide-menu">Course Management</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/admin/teacher')}}" aria-expanded="false">
                                <i class="mdi mdi-clipboard-account"></i>
                                <span class="hide-menu">Teacher Management</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/admin/subject')}}" aria-expanded="false">
                                <i class="mdi mdi-book-open-variant"></i>
                                <span class="hide-menu">Subject Management</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/admin/classes')}}" aria-expanded="false">
                                <i class="mdi mdi-projector-screen"></i>
                                <span class="hide-menu">Class Management</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/admin/question')}}" aria-expanded="false">
                                <i class="mdi mdi-comment-question-outline"></i>
                                <span class="hide-menu">Question Management</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/admin/exams')}}" aria-expanded="false">
                                <i class="mdi mdi-book-plus"></i>
                                <span class="hide-menu">Exams Management</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/admin/scores')}}" aria-expanded="false">
                                <i class="mdi mdi-poll-box"></i>
                                <span class="hide-menu">Scores Management</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/admin/statistical')}}" aria-expanded="false">
                                <i class="mdi mdi-server"></i>
                                <span class="hide-menu">Statistical</span>
                            </a>
                        </li>
                    </ul>
                    @else
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/admin/dashboard')}}" aria-expanded="false">
                                <!-- <i class="mdi mdi-av-timer"></i> -->
                                <i class="fa fa-tachometer"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/admin/user/profile')}}" aria-expanded="false">
                                <i class="mdi mdi-account-circle"></i>
                                <span class="hide-menu">Profile</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/admin/listMember')}}" aria-expanded="false">
                                <i class="fa fa-users"></i>
                                <span class="hide-menu">List Member</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/admin/browsing-account')}}" aria-expanded="false">
                                <i class="fa fa-users"></i>
                                <span class="hide-menu">Account Management</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/admin/course')}}" aria-expanded="false">
                                <i class="mdi mdi-book-variant"></i>
                                <span class="hide-menu">Course Management</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/admin/teacher')}}" aria-expanded="false">
                                <i class="mdi mdi-clipboard-account"></i>
                                <span class="hide-menu">Teacher Management</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/admin/subject')}}" aria-expanded="false">
                                <i class="mdi mdi-book-open-variant"></i>
                                <span class="hide-menu">Subject Management</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/admin/classes')}}" aria-expanded="false">
                                <i class="mdi mdi-projector-screen"></i>
                                <span class="hide-menu">Classes Management</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/admin/question')}}" aria-expanded="false">
                                <i class="mdi mdi-comment-question-outline"></i>
                                <span class="hide-menu">Question Management</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/admin/exams')}}" aria-expanded="false">
                                <i class="mdi mdi-book-plus"></i>
                                <span class="hide-menu">Exams Management</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/admin/scores')}}" aria-expanded="false">
                                <i class="mdi mdi-poll-box"></i>
                                <span class="hide-menu">Scores Management</span>
                            </a>
                        </li>
                    </ul>
                    @endif
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>