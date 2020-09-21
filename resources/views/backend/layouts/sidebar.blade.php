<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('resources/assets/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo isset(Auth::user()->username) ? ucwords(Auth::user()->username) : ''?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="@if(Request::segment(2) == 'dashboard' || Request::segment(2) == 'dashboard2') active @else '' @endif treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(Request::segment(2) == 'dashboard') active @else '' @endif"><a href="{{ route('dashboard') }}"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                    <li class="@if(Request::segment(2) == 'dashboard2') active @else '' @endif"><a href="{{ route('dashboard2') }}"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
                </ul>
            </li>
            <li class="treeview @if(Request::segment(2) == 'topnav' || Request::segment(2) == 'boxed' || Request::segment(2) == 'fixed' || Request::segment(2) == 'collapsed-sidebar') active @else '' @endif">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>Layout Options</span>
                    <span class="pull-right-container">
                        <span class="label label-primary pull-right">4</span>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(Request::segment(2) == 'topnav') active @else '' @endif"><a href="{{ route('topnav') }}" target="_blank"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
                    <li class="@if(Request::segment(2) == 'boxed') active @else '' @endif"><a href="{{ route('boxed') }}" target="_blank"><i class="fa fa-circle-o"></i> Boxed</a></li>
                    <li class="@if(Request::segment(2) == 'fixed') active @else '' @endif"><a href="{{ route('fixed') }}" target="_blank"><i class="fa fa-circle-o"></i> Fixed</a></li>
                    <li class="@if(Request::segment(2) == 'collapsed-sidebar') active @else '' @endif"><a href="{{ route('collapsed-sidebar') }}" target="_blank"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
                </ul>
            </li>
            <?php
            if (in_array('view', App\Helpers\Helper::check_module_access('admin',Auth::user()->admin_role_id))) { ?>  
                <li class="@if(Request::segment(2) == 'admin') active @else '' @endif">
                    <a href="{{ route('admin') }}">
                        <i class="fa fa-user"></i> <span>Admin List</span>                    
                    </a>
                </li>
            <?php } ?>
            <?php if (in_array('view', App\Helpers\Helper::check_module_access('admin_roles',Auth::user()->admin_role_id))) { ?>  
                <li id="admin_roles" class="treeview @if(Request::segment(2) == 'admin_roles') active @else '' @endif">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Roles & Permissions</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li id="admin_roles" class="@if(Request::segment(2) == 'admin_roles') active @else '' @endif"><a href="{{ route('admin_roles') }}"><i class="fa fa-circle-o"></i> Roles & Permissions</a></li>
                    </ul>
                </li>
            <?php } ?>
            <?php if (in_array('view', App\Helpers\Helper::check_module_access('users',Auth::user()->admin_role_id))) { ?>  
                <li class="@if(Request::segment(2) == 'users') active @else '' @endif">
                    <a href="{{ route('users') }}">
                        <i class="fa fa-user"></i> <span>Users</span>                    
                    </a>
                </li>
            <?php } ?>
            <li id="front_pages" class="treeview @if(Request::segment(2) == 'front_pages' || Request::segment(2) == 'menus') active @else '' @endif">
                <a href="#">
                    <i class="fa fa-file-text-o"></i> <span>CMS Pages</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li id="front_pages" class="@if(Request::segment(2) == 'front_pages') active @else '' @endif"><a href="{{ route('front_pages') }}"><i class="fa fa-circle-o"></i> Pages</a></li>
                    <li id="menus" class="@if(Request::segment(2) == 'menus') active @else '' @endif"><a href="{{ route('menus') }}"><i class="fa fa-circle-o"></i> Menu Manager</a></li>
                </ul>
            </li>
            <li class="@if(Request::segment(2) == 'setting') active @else '' @endif">
                <a href="{{ route('setting') }}">
                    <i class="fa fa-gears"></i> <span>Settings</span>                    
                </a>
            </li>
            <li class="@if(Request::segment(2) == 'email_templates') active @else '' @endif">
                <a href="{{ route('email_templates') }}">
                    <i class="fa fa-envelope"></i> <span>Email Templates</span>                    
                </a>
            </li>
            <?php if (in_array('view', App\Helpers\Helper::check_module_access('example'))) { ?>  
                <li class="treeview @if(Request::segment(3) == 'simple_datatable' || Request::segment(3) == 'ajax_datatable' || Request::segment(3) == 'pagination' || Request::segment(3) == 'advance_search'  || Request::segment(3) == 'video_upload'  || Request::segment(3) == 'file_upload')  active @else '' @endif">
                    <a href="#">
                        <i class="fa fa-snowflake-o"></i>
                        <span>Laravel Examples</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="@if(Request::segment(3) == 'simple_datatable') active @else '' @endif"><a href="{{ route('simple_datatable') }}"><i class="fa fa-circle-o"></i> Simple Datatable</a></li>
                        <li class="@if(Request::segment(3) == 'ajax_datatable') active @else '' @endif"><a href="{{ route('ajax_datatable') }}"><i class="fa fa-circle-o"></i> Ajax Datatable</a></li>
                        <li class="@if(Request::segment(3) == 'pagination') active @else '' @endif"><a href="{{ route('pagination') }}"><i class="fa fa-circle-o"></i> Pagination</a></li>
                        <li class="@if(Request::segment(3) == 'advance_search') active @else '' @endif"><a href="{{ route('advance_search') }}"><i class="fa fa-circle-o"></i> Advance Search</a></li>
                        <li class="@if(Request::segment(3) == 'file_upload') active @else '' @endif"><a href="{{ route('file_upload') }}"><i class="fa fa-circle-o"></i> File Upload</a></li>
                        <li class="@if(Request::segment(3) == 'video_upload') active @else '' @endif"><a href="{{ route('video_upload') }}"><i class="fa fa-circle-o"></i> Video Upload</a></li>
                    </ul>
                </li>
            <?php } ?>
            <?php if (in_array('view', App\Helpers\Helper::check_module_access('invoices',Auth::user()->admin_role_id))) { ?>  
                <li id="admin_roles" class="treeview @if(Request::segment(2) == 'invoices') active @else '' @endif">
                    <a href="#">
                        <i class="fa fa-money"></i> <span>Invoicing System</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li id="admin_roles" class="@if(Request::segment(2) == 'invoices') active @else '' @endif"><a href="{{ route('invoices') }}"><i class="fa fa-circle-o"></i> Invoice List</a></li>
                    </ul>
                </li>
            <?php } ?>
            <?php if (in_array('view', App\Helpers\Helper::check_module_access('joins',Auth::user()->admin_role_id))) { ?>  
                <li id="admin_roles" class="treeview @if(Request::segment(2) == 'joins') active @else '' @endif">
                    <a href="#">
                        <i class="fa fa-i-cursor"></i> <span>Database Joins Example</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="@if(Request::segment(2) == 'joins' && Request::segment(3) == '') active @else '' @endif"><a href="{{ route('joins') }}"><i class="fa fa-circle-o"></i> Serverside Join</a></li>
                        <li class="@if(Request::segment(3) == 'simple') active @else '' @endif"><a href="{{ route('joins.simple') }}"><i class="fa fa-circle-o"></i> Simple Join</a></li>
                    </ul>
                </li>
            <?php } ?>
            <?php if (in_array('view', App\Helpers\Helper::check_module_access('export',Auth::user()->admin_role_id))) { ?>  
                <li id="" class="treeview @if(Request::segment(2) == 'export') active @else '' @endif">
                    <a href="#">
                        <i class="fa fa-life-ring"></i> <span>Backup & Export</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="@if(Request::segment(2) == 'export') active @else '' @endif"><a href="{{ route('export') }}"><i class="fa fa-circle-o"></i> Database Backup </a></li>
                    </ul>
                </li>
            <?php } ?>
                
            <li class="@if(Request::segment(2) == 'widgets') active @else '' @endif">
                <a href="{{ route('widgets') }}">
                    <i class="fa fa-th"></i> <span>Widgets</span>
                    <span class="pull-right-container">
                        <small class="label pull-right bg-green">new</small>
                    </span>
                </a>
            </li>
            <li class="treeview @if(Request::segment(3) == 'general' || Request::segment(3) == 'icons' || Request::segment(3) == 'buttons' || Request::segment(3) == 'sliders' || Request::segment(3) == 'timeline' || Request::segment(3) == 'modals') active @else '' @endif">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>UI Elements</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(Request::segment(3) == 'general') active @else '' @endif"><a href="{{ route('general') }}"><i class="fa fa-circle-o"></i> General</a></li>
                    <li class="@if(Request::segment(3) == 'icons') active @else '' @endif"><a href="{{ route('icons') }}"><i class="fa fa-circle-o"></i> Icons</a></li>                    
                    <li class="@if(Request::segment(3) == 'buttons') active @else '' @endif"><a href="{{ route('buttons') }}"><i class="fa fa-circle-o"></i> Buttons</a></li>                    
                    <li class="@if(Request::segment(3) == 'sliders') active @else '' @endif"><a href="{{ route('sliders') }}"><i class="fa fa-circle-o"></i> Sliders</a></li>                    
                    <li class="@if(Request::segment(3) == 'timeline') active @else '' @endif"><a href="{{ route('timeline') }}"><i class="fa fa-circle-o"></i> Timeline</a></li>                    
                    <li class="@if(Request::segment(3) == 'modals') active @else '' @endif"><a href="{{ route('modals') }}"><i class="fa fa-circle-o"></i> Modals</a></li>                                        
                </ul>
            </li>
            
            <li class="treeview @if(Request::segment(3) == 'generalform' || Request::segment(3) == 'advance' || Request::segment(3) == 'editors' || Request::segment(3) == 'jqueryValidation') active @else '' @endif">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Forms</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(Request::segment(3) == 'generalform') active @else '' @endif"><a href="{{ route('generalform') }}"><i class="fa fa-circle-o"></i> General Elements</a></li>
                    <li class="@if(Request::segment(3) == 'advance') active @else '' @endif"><a href="{{ route('advance') }}"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>                    
                    <li class="@if(Request::segment(3) == 'editors') active @else '' @endif"><a href="{{ route('editors') }}"><i class="fa fa-circle-o"></i> Editors</a></li>                                        
                    <li class="@if(Request::segment(3) == 'jqueryValidation') active @else '' @endif"><a href="{{ route('jqueryValidation') }}"><i class="fa fa-circle-o"></i> Jquery Validation</a></li>                                        
                </ul>
            </li>
            <li class="treeview @if(Request::segment(3) == 'invoice' || Request::segment(3) == 'profile' || Request::segment(3) == 'login' || Request::segment(3) == 'register' || Request::segment(3) == 'lockscreen' || Request::segment(3) == '404' || Request::segment(3) == '500' || Request::segment(3) == 'blank' || Request::segment(3) == 'pace') active @else '' @endif">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Examples</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(Request::segment(3) == 'invoice') active @else '' @endif"><a href="{{ route('invoice') }}"><i class="fa fa-circle-o"></i> Invoice</a></li>
                    <li class="@if(Request::segment(3) == 'profile') active @else '' @endif"><a href="{{ route('profile') }}"><i class="fa fa-circle-o"></i> Profile</a></li>
                    <li class="@if(Request::segment(3) == 'login') active @else '' @endif"><a href="{{ route('pages.login') }}"><i class="fa fa-circle-o"></i> Login</a></li>
                    <li class="@if(Request::segment(3) == 'register') active @else '' @endif"><a href="{{ route('pages.register') }}"><i class="fa fa-circle-o"></i> Register</a></li>
                    <li class="@if(Request::segment(3) == 'lockscreen') active @else '' @endif"><a href="{{ route('lockscreen') }}"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
                    <li class="@if(Request::segment(3) == '404') active @else '' @endif"><a href="{{ route('error404') }}"><i class="fa fa-circle-o"></i> 404 Error</a></li>
                    <li class="@if(Request::segment(3) == '500') active @else '' @endif"><a href="{{ route('error500') }}"><i class="fa fa-circle-o"></i> 500 Error</a></li>
                    <li class="@if(Request::segment(3) == 'blank') active @else '' @endif"><a href="{{ route('blank') }}"><i class="fa fa-circle-o"></i> Blank Page</a></li>
                    <li class="@if(Request::segment(3) == 'pace') active @else '' @endif"><a href="{{ route('pace') }}"><i class="fa fa-circle-o"></i> Pace Page</a></li>

                </ul>
            </li>
            <li class="treeview @if(Request::segment(2) == 'chartjs' || Request::segment(2) == 'morris' || Request::segment(2) == 'flot' || Request::segment(3) == 'laravelcharts' || Request::segment(2) == 'linecharts') active @else '' @endif">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Charts</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(Request::segment(2) == 'chartjs') active @else '' @endif"><a href="{{ route('chart.chartjs') }}"><i class="fa fa-circle-o"></i> ChartJS</a></li>
                    <li class="@if(Request::segment(2) == 'morris') active @else '' @endif"><a href="{{ route('chart.morris') }}"><i class="fa fa-circle-o"></i> Morris</a></li>
                    <li class="@if(Request::segment(2) == 'flot') active @else '' @endif"><a href="{{ route('chart.flot') }}"><i class="fa fa-circle-o"></i> Flot</a></li>
                    <li class="@if(Request::segment(2) == 'linecharts') active @else '' @endif"><a href="{{ route('chart.linecharts') }}"><i class="fa fa-circle-o"></i> Inline charts</a></li>
                    <li class="@if(Request::segment(3) == 'laravelcharts') active @else '' @endif"><a href="{{ route('chartjs.laravelcharts') }}"><i class="fa fa-circle-o"></i> Laravel charts</a></li>
                </ul>
            </li>
            <li class="@if(Request::segment(2) == 'calendar') active @else '' @endif">
                <a href="{{ route('calendar') }}">
                    <i class="fa fa-calendar"></i> <span>Calendar</span>
                    <span class="pull-right-container">
                        <small class="label pull-right bg-red">3</small>
                        <small class="label pull-right bg-blue">17</small>
                    </span>
                </a>
            </li>

            <li id="mailbox" class="treeview @if(Request::segment(3) == 'inbox' || Request::segment(3) == 'compose' || Request::segment(3) == 'read_mail') active @else '' @endif">
                <a href="">
                    <i class="fa fa-envelope"></i> <span>Mailbox</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li id="inbox" class="@if(Request::segment(3) == 'inbox') active @else '' @endif">
                        <a href="{{ route('mailbox.inbox') }}">Inbox
                            <span class="pull-right-container">
                                <span class="label label-primary pull-right">13</span>
                            </span>
                        </a>
                    </li>
                    <li class="@if(Request::segment(3) == 'compose') active @else '' @endif"><a href="{{ route('mailbox.compose') }}">Compose</a></li>
                    <li class="@if(Request::segment(3) == 'read_mail') active @else '' @endif"><a href="{{ route('mailbox.read_mail') }}">Read</a></li>
                </ul>
            </li>


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Multilevel</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-circle-o"></i> Level One
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-circle-o"></i> Level Two
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                </ul>
            </li>           
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>