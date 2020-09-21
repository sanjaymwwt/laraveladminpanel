
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US">
    <head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <title>WAdmin Laravel | World Web Documentation</title>
        <link rel="shortcut icon" href="assets/images/favicon.png" />
        <meta name="robots" content="noodp,noydir"/>
        <meta name="description" content="WAdmin Laravel admin panel documentation  "/>

        <!-- CSS starts here -->
        <link rel="stylesheet" type="text/css" href="http://docs.worldwebtechnology.com/wadmin-ci-admin-panel/assets/css/bootstrap.min.css" media="screen" />        
        <link rel="stylesheet" type="text/css" href="http://docs.worldwebtechnology.com/wadmin-ci-admin-panel/assets/css/font-awesome.min.css" media="screen" />
        <link rel="stylesheet" href="assets/css/ionicons.min.css">
            <link rel="stylesheet" type="text/css" href="http://docs.worldwebtechnology.com/wadmin-ci-admin-panel/assets/css/custom.css" media="screen" />
            <!-- CSS ends here -->
            <!-- Js starts here -->
            <script type="text/javascript" src="http://docs.worldwebtechnology.com/wadmin-ci-admin-panel/assets/js/jquery.min.js"></script>            
            <script type="text/javascript" src="http://docs.worldwebtechnology.com/wadmin-ci-admin-panel/assets/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="http://docs.worldwebtechnology.com/wadmin-ci-admin-panel/assets/js/worldweb-custom.js"></script>
            <script type="text/javascript" src="http://docs.worldwebtechnology.com/wadmin-ci-admin-panel/assets/js/preetyphoto.js"></script>	
            <!-- Js ends here -->

            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
              <script src="assets/js/html5shiv.js"></script>
              <script src="assets/js/respond.min.js"></script>
            <![endif]-->
            <style>
                .adminsection p{
                    margin-top:10px;
                    margin-bottom:10px !important;
                }
            </style>            
    </head>
    <body>
        <div class="worldweb-wrapper">

            <div class="worldweb-header-strip">
                <div class="worldweb-header-container">
                    <a href="http://docs.worldwebtechnology.com/"><p class="worldweb-doc-header">World Web Documentation</p></a>
                </div>
            </div><!--worldweb-header-strip-->
            <div class="worldweb-middle-main container">
                <div class="row">	

                    <div class="worldweb-middle-head">
                        <h1>WAdmin - Laravel Admin Panel</h1>
                        <span class="worldweb-note-text">&ldquo;WAdmin - Laravel Admin Panel&rdquo; Documentation by &ldquo;World Web Technology&rdquo;</span>
                    </div><!-- end worldweb-middle-head -->	

                    <!-- Sidebar tab starts -->
                    <div class="mobile-icon-bar-main">
                        <div class="bar1"></div>
                        <div class="bar2"></div>
                        <div class="bar3"></div>
                    </div>
                    <div class="col-md-3 worldweb-sidebar-wrapper">
                        <div class="worldweb-sidebar-main">
                            <div id="worldweb-section-nav" class="worldweb-sidebar">
                                <ul class="nav">
                                    <li><a href="#introduction">Introduction</a></li>
                                    <li><a href="#requirement">Minimum Requirements</a></li>
                                    <li><a href="#feature">Features</a></li>                                    
                                    <li><a href="#installation">How to Install?</a>
                                        <ol class="nav">
                                            <li><a href="#create_db">Create the Database</a></li>
                                            <li><a href="#import_db">Import Database</a></li>
                                            <li><a href="#setup_base_url">Setup Base URL</a></li>
                                        </ol>
                                    </li>
                                    <li><a href="#configuration">Website Configuration</a>
                                        <ol class="nav">
                                            <li><a href="#email_config">Email Configuration</a></li>
                                            <li><a href="#db_config">Database Configuration</a></li>                                            
                                        </ol>
                                    </li>
                                    <li><a href="#modules">Modules</a>

                                    </li>
                                    <li><a href="#Customization">Customizing layouts & Code Snippet</a>
                                        <ol class="nav">
                                            <li><a href="#header">Header</a></li>
                                            <li><a href="#sidebar">Sidebar</a></li>
                                            <li><a href="#route">Route</a></li>                                            
                                            <li><a href="#footer">Footer</a></li>                                            
                                        </ol>
                                    </li>                                    
                                    <li><a href="#ThirdPartyLibraries">Third Party Libraries</a></li>                                    
                                    <li><a href="#visit_demo">Visit Demo</a></li>

                                    <!--<li><a href="#frontend">Frontend Behavior</a></li>-->
                                </ul>
                            </div><!-- end worldweb-sidebar -->

                            <!-- Call a function for purchase links section -->

                            <div class="worldweb-center worldweb-top10">
                                <a href="#" target="_blank" class="worldweb-btn-link btn btn-success">
                                    <i class="glyphicon glyphicon-download-alt"></i>
                                    <span>Purchase</span>
                                </a>
                                <a class="worldweb-btn-link btn btn-primary" target="_blank" href="http://docs.worldwebtechnology.com/wadmin-ci-admin-panel/changelog.txt">
                                    <i class="glyphicon glyphicon-th-list"></i>
                                    <span>Changelog</span>
                                </a>
                            </div><!-- end worldweb-sidebar-btn-group -->

                        </div><!-- end worldweb-sidebar-main -->
                    </div><!-- end col-md-3 worldweb-sidebar-wrapper -->
                    <!-- Sidebar tab ends -->

                    <div class="col-md-9">

                        <div class="worldweb-sidebar-tab-cnt">

                            <div id="introduction" class="worldweb-content">
                                <h2 class="worldweb-content-title">Introduction</h2>							                                
                                <p><b><a href="#" target="_blank">WAdmin - Laravel Admin Panel</a></b> is a powerful admin panel to start a new project in Laravel. It provides many ready made module so that you don't have to develop each module from scratch.</p>
                            </div><!-- end #introduction -->
                            <hr />
                            <div id="requirement" class="worldweb-content">
                                <h2 class="worldweb-content-title">Minimum Requirements</h2>
                                <p>To install <b><a href="#" target="_blank">WAdmin - Laravel Admin Panel</a></b>, Your web server must be running PHP 7.0 or higher, and Mysql 5 or higher. Below are a list of items and your web server should compatible with it.</p>
                                <ul>                                    
                                    <li>PHP 7.0+</li>
                                    <li>Laravel 5.8.0</li>
                                    <li>MYSQLi 5.1+</li>
                                    <li>Mcrypt Extension</li>
                                    <li>MBString Extension</li>
                                    <li>MYSQLi Extension</li>
                                    <li>CURL Extension (recommended)</li>								
                                </ul>
                                <br />							
                            </div><!-- end #requirement -->
                            <hr />
                            <div id="feature" class="worldweb-content">
                                <h2 class="worldweb-content-title">Features</h2>  
                                <p><b></b><a href="#" target="_blank">WAdmin - Laravel Admin Panel</a></b> provides following features</p>
                                <div>
                                    <ul class="features-list">
                                        <li>Login</li>
                                        <li>Forgot Password</li>
                                        <li>CMS Pages</li>
                                        <li>Menu Manager</li>
                                        <li>Email Templates</li>
                                        <li>Roles & Permissions</li>
                                        <li>Dynamic Graphs</li>
                                        <li>Simple Datatable</li>								
                                        <li>Ajax Datatable</li>								
                                        <li>Pagination in Datatable</li>								
                                        <li>Different Filters in Datatable</li>								
                                        <li>File & Video Upload</li>								

                                    </ul>
                                </div>
                                <div>
                                    <ul class="features-list">                                        							
                                        <li>Database Join</li>								
                                        <li>Database Backup</li>
                                        <li>General Settings</li>								
                                        <li>Invoices System</li>								
                                        <li>Readymade Widgets</li>								
                                        <li>UI Elements</li>								
                                        <li>Forms</li>								
                                        <li>Different Editors</li>								
                                        <li>Jquery Validation</li>								
                                        <li>Dynamic Charts</li>								
                                        <li>Calender</li>								
                                        <li>Mailbox</li>								
                                        <li>Other Sample Pages</li>								
                                    </ul>
                                </div>
                                <br />
                                <img src="assets/images/features.jpg" alt=""/>
                            </div><!-- end #feature -->
                            <hr />
                            <div id="installation" class="worldweb-content">
                                <h2 class="worldweb-content-title">How To Install</h2>
                                <p>You can download composer from this url "https://getcomposer.org/" and install in laravel directory for further package or command run using composer.</p>
                                <div id="create_db">
                                    <p><strong>Create the Database</strong></p>	
                                    <ol>
                                        <li>Login to cPanel by accessing <b>www.yourdomain.com/cpanel</b> and navigate go MySQL Databases.</li>
                                        <li>Create database first.</li>
                                        <li>Create user and setup your password.</li>
                                        <li>Add the user to database by selecting the database and the username.</li>                                        
                                    </ol>				

                                    <p>Make sure you have checked All privileged when adding the user to database.</p>							

                                </div>
                                <hr />
                                <div id="import_db">
                                    <p><strong>Import Database</strong></p>		    
                                    <ol>
                                        <li>Open the file <b>wadmin_laravel_admin_panel_db.sql</b> in database folder of package files and Import the Database. It will create all required database tables and sample content.</li>							
                                    </ol>				
                                </div>                                
                                <hr />
                                <div id="setup_base_url">
                                    <p><strong>Setup Base env file</strong></p>
                                    <p><strong>Go to main folder and open .env file </strong></p>
                                    <p>Where APP_URL is set as locahost</p>
                                </div>
                            </div><!-- end #installation -->
                            <hr />
                            <div id="configuration" class="worldweb-content">
                                <h2 class="worldweb-content-title">Website Configuration</h2>
                                <div id="email_config">
                                    <p><strong>Email Configuration</strong> In <strong>.env </strong> file set below variable for a send email.
                                        <pre>MAIL_DRIVER, MAIL_HOST, MAIL_PORT, MAIL_USERNAME, MAIL_PASSWORD, MAIL_ENCRYPTION </pre>                                    
                                        <p>We provides 2 method using which you can send email.</p>                                    
                                        <ul>
                                            <li><b>PHP Mail</b> - This is default PHP mail method.</li>
                                            <li><b>SMTP</b> - This is custom mail method. Sometimes mail sent to spam using PHP Mail method so in that case you can use SMTP Method.</li>
                                        </ul>                                    
                                        <p>For SMTP, you need to configure SMTP Username and Password and other details. You can do it from Settings -> Email Setting as shown in below screenshot</p>
                                        <p>Also you can change admin email where mail is come from</p>
                                        <div class="worldweb-box info"><strong>Note:</strong> You need to use a valid domain email address. And Email will work only on live server not on localhost.</div>
                                        <img src="assets/images/email_settings.png" alt=""/>
                                </div>
                                <hr />
                                <div id="db_config">
                                    <p></p>
                                    <p><strong>Database Configuration</strong></p>
                                    <p>Open your site main root folder then open <strong>.env</strong> file and change your database name, username and password here,</p>                                                                        
                                    <pre>
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_adminlte
DB_USERNAME=root
DB_PASSWORD=
                                    </pre>
                                </div>
                            </div><!-- end #configuration -->
                            <div class="worldweb-box info"><strong>Note:</strong> Now all setup done you can now open setup Laravel in browser using your domain link : http://www.domain.com                                 
                                <p>
                                    You can login with below Credentials:<br/>
                                    <b>Username</b> : superadmin<br/>
                                    <b>Password</b> : 123456789
                                </p>
                            </div>
                            <hr />
                            <div id="modules">
                                <h2 class="worldweb-content-title">Modules</h2>
                                <ul class="features-list">
                                    <li><a href="#dashboard">Dashboard</a></li>
                                    <li><a href="#admin_list">Admin List</a></li>
                                    <li><a href="#role_permission">Role & Permissions</a></li>
                                    <li><a href="#users">Users</a></li>                                            
                                    <li><a href="#cms_page">CMS Pages</a></li>                                            
                                    <li><a href="#settings">Settings</a></li>                                            
                                    <li><a href="#email_templates">Email Templates</a></li>                                            
                                    <li><a href="#Laravel_example">Laravel Examples</a></li>                                            
                                    <li><a href="#invoicing_system">Invoicing System</a></li>  
                                    <li><a href="#database_join_example">Database Joins Example</a></li>  
                                    <li><a href="#backup_export">Backup & Export</a></li>                                            
                                    <li><a href="#widgets">Widgets</a></li>                                            
                                    <li><a href="#ui_element">UI Elements</a></li>                                            
                                    <li><a href="#forms">Forms</a></li>                                            
                                    <li><a href="#page_examples">Other sample pages examples</a></li>                                            
                                    <li><a href="#charts">Charts</a></li>                                            
                                    <li><a href="#calendar">Calendar</a></li>                                            
                                    <li><a href="#mailbox">Mailbox</a></li>                                            
                                    <li><a href="#multilevel">Multilevel</a></li>
                                </ul>
                                </br/>                                
                                <div id="dashboard">
                                    <p><strong>Dashboard</strong></p>	
                                    <p>Dashboard module display user count with some graph data and static <b>WAdmin</b> theme data.</p>	
                                    <img src="assets/images/dashboard.png" alt="" class="" />				
                                </div>
                                <hr />
                                <div id="admin_list">
                                    <p><strong>Admin List</strong></p>	
                                    <p>Admin list display different admin with their role.</p>	
                                    <img src="assets/images/admin.png" alt="" class="" />				
                                </div>
                                <hr />
                                <div id="role_permission">
                                    <p><strong>Roles & Permissions</strong></p>	
                                    <p>This will diplay different role with their permission with modules.</p>	
                                    <img src="assets/images/role.png" alt="" class="" />				
                                </div>
                                <hr />
                                <div id="users">
                                    <p><strong>Users</strong></p>	
                                    <p>This will diplay user with their details, Also user can filter by status and email.</p>	
                                    <img src="assets/images/users.png" alt="" class="" />				
                                </div>
                                <hr />
                                <div id="cms_page">
                                    <p><strong>CMS Pages</strong></p>	
                                    <p>You can create pages for frontend, Also you can manage menu for frontend header,footer menu from backend.</p>	
                                    <img src="assets/images/pages.png" alt="" class="" />	
                                    <p></p>
                                    <img src="assets/images/menumanager.png" alt="" class="" />				
                                </div>
                                <hr />
                                <div id="settings">
                                    <p><strong>Settings</strong></p>	
                                    <p>You can add frontend site main logo, Admin mail, social icon link, google reCaptcha and you can add email setting, Also you can test email with different mail sending method.</p>	
                                    <img src="assets/images/setting.png" alt="" class="" />	                                    	
                                </div>
                                <hr />
                                <div id="email_templates">
                                    <p><strong>Email Templates</strong></p>	
                                    <p>You can add email template which can be use to manage for forgotpassword mail and new register user mail or other purpose.</p>	
                                    <img src="assets/images/email-template.png" alt="" class="" />	                                    	
                                </div>
                                <hr />
                                <div id="Laravel_example">
                                    <p><strong>Laravel Examples</strong></p>	
                                    <p>Laravel example with simple datatable, ajax datatable, pagination, advance search and advance search with data, Also file and video upload feature and export to csv and pdf format you can donwload table data.</p>	
                                    <img src="assets/images/server_side_datatable.png" alt="" class="" />	   
                                    <p></p>                                    
                                    <img src="assets/images/file_upload.png" alt="" class="" />	                                    	
                                </div>
                                <hr />
                                <div id="invoicing_system">
                                    <p><strong>Invoicing system</strong></p>	
                                    <p>Invoice system with pdf, print functionality aslo you can send email with invoice attachment using setting.</p>	
                                    <img src="assets/images/invoice.png" alt="" class="" />	                                    	
                                </div>
                                <hr />
                                <div id="database_join_example">
                                    <p><strong>Database Joins Example</strong></p>	
                                    <p>It provides serverside join of two table and also simple join.</p>	
                                    <img src="assets/images/datatable_join.png" alt="" class="" />	                                    	
                                </div>
                                <hr />
                                <div id="backup_export">
                                    <p><strong>Backup & Export</strong></p>	
                                    <p>It provide database export functionality.</p>	
                                    <img src="assets/images/export.png" alt="" class="" />	                                    	
                                </div>
                                <hr />
                                <div id="widgets">
                                    <p><strong>Widgets</strong></p>	
                                    <p>It provide all <b>WAdmin</b> theme widget.</p>	
                                    <img src="assets/images/widget.png" alt="" class="" />	                                    	
                                </div>
                                <hr />
                                <div id="ui_element">
                                    <p><strong>UI Elements</strong></p>	
                                    <p>It provide <b>WAdmin</b> theme all UI Elements. It contain general, icons, buttons, sliders, timeline and models.</p>	
                                    <img src="assets/images/ui_element.png" alt="" class="" />	                                    	
                                </div>
                                <hr />
                                <div id="forms">
                                    <p><strong>Forms</strong></p>	
                                    <p>It provide general, advance and editor form element. Also provide serverside validation and jquery validation in the form.</p>	
                                    <img src="assets/images/general.png" alt="" class="" />	                                    	
                                </div>
                                <hr />
                                <div id="page_examples">
                                    <p><strong>Other sample pages examples</strong></p>	
                                    <p>It provides ready made pages like invoice, login, register, lockscreen, 404 error, 505 error, blank page and pace pages.</p>	                                    
                                </div>
                                <hr />
                                <div id="charts">
                                    <p><strong>Charts</strong></p>	
                                    <p>It provide integration of ChartJS, Morris, Flot and dynamic charts using Laravel.</p>
                                    <img src="assets/images/charts.png" alt="" class="" />	
                                </div>
                                <hr />
                                <div id="calendar">
                                    <p><strong>Calendar</strong></p>	
                                    <p>Calendar module of <b>WAdmin theme</b> converted to Laravel.</p>                                    
                                </div>
                                <hr />
                                <div id="mailbox">
                                    <p><strong>Mailbox</strong></p>	
                                    <p>Mailbox, Compose and Read of <b>WAdmin theme</b> converted to Laravel.</p>                                    
                                </div>
                                <hr />
                                <div id="multilevel">
                                    <p><strong>Multilevel</strong></p>	
                                    <p>Multilevel menu example.</p>                                       
                                    <img src="assets/images/multilevel.png" alt="" class="" />
                                </div>
                            </div><!-- end #modules -->
                            <hr />
                            <div id="Customization" class="worldweb-content">
                                <h2 class="worldweb-content-title">Customizing the layouts & Code Snippet</h2>
                                <div id="header">
                                    <p><strong>Customizing Header</strong></p>

                                    <p>To customize header, Go to the site folder and open file <b>resources/views/backend/layouts/header.blade.php</b>. Here you can set logo, naviation and Account buttons. Change the code as per your needs.</p>
                                    <img src="assets/images/navbar.png" alt="" class="" />
                                </div>
                                <hr />
                                <div id="sidebar">
                                    <p><strong>Customizing Sidebar</strong></p>
                                    <p>Go to the website folder and open file <b>resources/views/backend/layouts/sidebar.blade.php</b>. Here you can add/remove/edit the main-menu and dropdown-menu</p>
                                </div>
                                <hr />
                                <div id="route">
                                    <p><strong>Route</strong></p>
                                    <p>If you want to change or want to add new route then go to <b>routes/backend.php</b>. Here you can change the route according to your requirements</p>
                                </div>
                                <div class="worldweb-box info"><strong>Note:</strong> Here we add custom route file other wise path for route file is  <b>routes/web.php</b>
                                </div>

                                <hr />
                                
                                <div id="footer">
                                    <p><strong>Customizing Footer</strong></p>
                                    <p>Go to the website folder and open file <b>resources/views/backend/layouts/footer.blade.php</b> and edit it according to your needs.</p>
                                </div>
                                <hr />                                
                            </div> <!-- end of customization -->
                            <hr />
                            <div id="ThirdPartyLibraries" class="worldweb-content">
                                <h2 class="worldweb-content-title">Third Party Libraries</h2>		
                                <p><a href="https://github.com/barryvdh/laravel-dompdf" target="_blank"><strong>DOMPDF (For PDF Generation)</strong></a></p>
                                
                                <p>Laravel dompdf via the Composer package manager use for download file as pdf.</p>                                

                                <p><a href="https://www.itsolutionstuff.com/post/laravel-56-import-export-to-excel-and-csv-exampleexample.html" target="_blank"><strong>Laravel Excel</strong></a></p>

                                <p>Maatwebsite package via the Composer package manager use for download files as excel.</p>                                
                            </div> <!-- end of third party libraries-->
                            <hr />
                            <div id="visit_demo">
                                <div id="pdfvouchers_demo" class="worldweb-content">
                                    <h2 class="worldweb-content-title">Have a look at demo</h2>
                                    <p>
                                        You can view a demo from here: <a target="_blank" title="WAdmin Laravel admin panel demo" href="http://demo.worldwebtechnology.com/wadmin-ci-admin-panel/">WAdmin Laravel Admin Panel</a><br/>
                                        <i>Username: superadmin</i><br/>
                                        <i>Password: 123456789</i>
                                    </p>                                    
                                </div>
                                <hr class="space"></hr>
                                <div id="contact-us" class="worldweb-help-wrp worldweb-edd-extension">
                                    <div class="worldweb-help-titlebar">
                                        <span>Need Support</span>
                                    </div>
                                    <div class="worldweb-help-titlebar-arr">&nbsp;</div>
                                    <div class="worldweb-help-left">
                                        <span>
                                            <strong>
                                                Created: January 1, 2020 <br>
                                                    By: <a href="https://worldwebtechnology.com/">World Web Technology</a><br>
                                                        Email: <a href="mailto:faq.worldweb@gmail.com">faq.worldweb@gmail.com</a>
                                                        </strong>
                                                        </span>
                                                        </div><!--end worldweb-help-left -->

                                                        <div class="worldweb-help-right worldweb-help-full">
                                                            <span>                                            
                                                                If you have any question which you couldn't get answered within our documentation then feel free to email us on <a href="mailto:faq.worldweb@gmail.com">faq.worldweb@gmail.com</a>.Thank you.
                                                            </span>
                                                        </div>
                                                        </div>
                                                        </div><!-- end #visit demo -->                           
                                                        </div><!-- end worldweb-middle -->
                                                        </div><!-- row -->
                                                        </div><!-- end worldweb-middle-main container -->

                                                        <script type="text/javascript" charset="utf-8">
                                                            $(document).ready(function () {
                                                                $("area[rel^='prettyPhoto']").prettyPhoto();

                                                                $(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed: 'normal', theme: 'pp_default', slideshow: 3000, autoplay_slideshow: false});

                                                            });
                                                        </script>
                                                        <!-- footer starts here -->
                                                        <div class="worldweb-footer-wrapper">
                                                            <div class="worldweb-footer">
                                                                Copyright &copy; <span class="worldweb-year"></span>, World Web Technology.
                                                            </div>
                                                        </div><!-- end worldweb-wrapper -->
                                                        <!-- footer ends here -->
                                                        <a class="worldweb-top" href="javascript:void(0);" title="Back to top"></a>

                                                        </div><!--worldweb-wrapper-->
                                                        </body>
                                                        </html>
