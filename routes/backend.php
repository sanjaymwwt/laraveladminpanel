<?php

use App\Http\Controllers\backend\Auth\LoginController;
use App\Http\Controllers\backend\Auth\RegisterController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\AccessDeniedController;
// Layouts
use App\Http\Controllers\backend\layoutOption\TopNavController;
use App\Http\Controllers\backend\layoutOption\BoxedController;
use App\Http\Controllers\backend\layoutOption\FixedController;
use App\Http\Controllers\backend\layoutOption\CollapsedSidebarController;
// Layouts End
use App\Http\Controllers\backend\WidgetsController;
use App\Http\Controllers\backend\Admin\AdminController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\backend\UsersController;
use App\Http\Controllers\backend\Admin\RolesController;
use App\Http\Controllers\backend\PageController;
use App\Http\Controllers\backend\MenuController;
use App\Http\Controllers\backend\EmailController;
use App\Http\Controllers\backend\SettingController;
use App\Http\Controllers\backend\ExampleController;
use App\Http\Controllers\backend\InvoiceController;
use App\Http\Controllers\backend\JoinController;
// Charts
use App\Http\Controllers\backend\Charts\ChartjsController;
use App\Http\Controllers\backend\Charts\MorrisController;
use App\Http\Controllers\backend\Charts\FlotChartsController;
use App\Http\Controllers\backend\Charts\LineChartsController;
// Charts End
// UI element
use App\Http\Controllers\backend\UI\UiController;
// UI element End
// UI element
use App\Http\Controllers\backend\ExportController;
// UI element End
use App\Http\Controllers\backend\FormController;
use App\Http\Controllers\backend\CalendarController;
use App\Http\Controllers\backend\MailboxController;
use App\Http\Controllers\backend\Pages\PagesController;

/*
  |--------------------------------------------------------------------------
  | Backend Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "backend" middleware group. Now create something great!
  |
 */
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [LoginController::class, 'login'])->name('login');
Route::get('/register', [RegisterController::class, 'registerForm'])->name('register');
Route::post('/register', [RegisterController::class, 'postRegister'])->name('register');
Route::get('/document', [RegisterController::class, 'document'])->name('document');

// password restet
Route::get('password/reset', 'auth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
Route::post('password/email', 'auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'auth\ResetPasswordController@showResetForm')->name('password.reset.token');
Route::post('password/update', 'auth\ResetPasswordController@update')->name('password.update');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile', [ProfileController::class, 'profile'])->name('admin.profile');
    Route::post('/profile', [ProfileController::class, 'profileupdate'])->name('admin.profileupdate');
    Route::any('/profile/changes_pwd', [ProfileController::class, 'changes_pwd'])->name('admin.changes_pwd');
    Route::any('/access_denied', [AccessDeniedController::class, 'index'])->name('access_denied.index');
    Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard2', [DashboardController::class, 'dashboard2'])->name('dashboard2');
    Route::get('/topnav', [TopNavController::class, 'index'])->name('topnav');
    Route::get('/boxed', [BoxedController::class, 'index'])->name('boxed');
    Route::get('/fixed', [FixedController::class, 'index'])->name('fixed');
    Route::get('/collapsed-sidebar', [CollapsedSidebarController::class, 'index'])->name('collapsed-sidebar');

// admin start
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::post('/admin/add', [AdminController::class, 'store'])->name('admin.store');
    Route::post('admin/update/{id}', ['as' => 'admin.update', 'uses' => 'admin\AdminController@update']);
    Route::get('admin/delete/{id}', ['as' => 'admin.delete', 'uses' => 'admin\AdminController@delete']);
    Route::post('/admin/datatable_json', [AdminController::class, 'datatable_json'])->name('admin.datatable_json');
    Route::post('/admin/search', [AdminController::class, 'search'])->name('admin.search');
    Route::post('/admin/change_status', [AdminController::class, 'change_status'])->name('admin.change_status');
// admin end
// users start
    Route::get('/users', [UsersController::class, 'index'])->name('users');
    Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
    Route::get('/users/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
    Route::post('/users/add', [UsersController::class, 'store'])->name('users.store');
//Route::post('users/update/', [UsersController::class, 'update'])->name('users.update');
    Route::post('users/update/{id}', ['as' => 'users.update', 'uses' => 'UsersController@update']);
    Route::post('/users/datatable_json', [UsersController::class, 'datatable_json'])->name('users.datatable_json');
    Route::post('/users/search', [UsersController::class, 'search'])->name('users.search');
    Route::post('/users/change_status', [UsersController::class, 'change_status'])->name('users.change_status');
    Route::post('/users/multidel', [UsersController::class, 'multidel'])->name('users.multidel');
// Users end
// Role start
    Route::get('/admin_roles', [RolesController::class, 'index'])->name('admin_roles');
    Route::get('/roles/create', [RolesController::class, 'create'])->name('roles.create');
    Route::get('/roles/edit/{id}', [RolesController::class, 'edit'])->name('roles.edit');
    Route::post('/roles/add', [RolesController::class, 'store'])->name('roles.store');
//Route::post('roles/access/{id}', [RolesController::class, 'access'])->name('roles.access');
    Route::get('roles/access/{id}', ['as' => 'roles.access', 'uses' => 'admin\RolesController@access']);
    Route::post('roles/set_access/', [RolesController::class, 'set_access'])->name('roles.set_access');
    Route::post('roles/destroy/{id}', ['as' => 'roles.destroy', 'uses' => 'admin\RolesController@destroy']);
    Route::post('roles/update/{id}', ['as' => 'roles.update', 'uses' => 'admin\RolesController@update']);
    Route::post('/roles/change_status', [RolesController::class, 'change_status'])->name('roles.change_status');
// Role end

    Route::get('/widgets', [WidgetsController::class, 'index'])->name('widgets');

// Frontend page start
    Route::get('/front_pages', [PageController::class, 'index'])->name('front_pages');
    Route::get('/front_pages/create', [PageController::class, 'create'])->name('front_pages.create');
    Route::post('/front_pages/add', [PageController::class, 'store'])->name('front_pages.store');
    Route::get('/front_pages/edit/{id}', [PageController::class, 'edit'])->name('admin.edit');
    Route::post('front_pages/update/{id}', ['as' => 'front_pages.update', 'uses' => 'PageController@update']);
    Route::get('front_pages/delete/{id}', ['as' => 'admin.delete', 'uses' => 'admin\AdminController@delete']);
    Route::post('/front_pages/datatable_json', [PageController::class, 'datatable_json'])->name('admin.datatable_json');
//  Frontend page end
// menu manager start here
    Route::any('/menus', [MenuController::class, 'index'])->name('menus');
    Route::post('/menus/save_menu_name', [MenuController::class, 'save_menu_name'])->name('menus.save_menu_name');
    Route::post('/menus/add_menu', [MenuController::class, 'add_menu'])->name('menus.add_menu');
    Route::post('/menus/reset_list', [MenuController::class, 'reset_list'])->name('menus.reset_list');
    Route::post('/menus/delete_main_menu', [MenuController::class, 'delete_main_menu'])->name('menus.delete_main_menu');
    Route::post('/menus/delete_menu_page', [MenuController::class, 'delete_menu_page'])->name('menus.delete_menu_page');
    Route::post('/menus/save_menu', [MenuController::class, 'save_menu'])->name('menus.save_menu');

// menu manager start here

    Route::get('/setting', [SettingController::class, 'index'])->name('setting');
    Route::post('/setting/update_settings', [SettingController::class, 'update_settings'])->name('setting.update_settings');
    Route::post('/setting/DeleteImage', [SettingController::class, 'DeleteImage'])->name('setting.DeleteImage');

// email tempalte start
    Route::get('/email_templates', [EmailController::class, 'index'])->name('email_templates');
    Route::get('/email_templates/create', [EmailController::class, 'create'])->name('email_templates.create');
    Route::post('/email_templates/add', [EmailController::class, 'store'])->name('email_templates.store');
    Route::get('/email_templates/edit/{id}', [EmailController::class, 'edit'])->name('email_templates.edit');
    Route::post('email_templates/update/{id}', ['as' => 'email_templates.update', 'uses' => 'EmailController@update']);
    Route::post('email_templates/multidel', ['as' => 'email_templates.multidel', 'uses' => 'EmailController@multidel']);
    Route::post('/email_templates/datatable_json', [EmailController::class, 'datatable_json'])->name('admin.datatable_json');
//  email tempalte end
//  exmaples datatables start
    Route::get('/example/simple_datatable', [ExampleController::class, 'simple_datatable'])->name('simple_datatable');
    Route::get('/example/ajax_datatable', [ExampleController::class, 'ajax_datatable'])->name('ajax_datatable');
    Route::get('/example/pagination', [ExampleController::class, 'pagination'])->name('pagination');
    Route::get('/example/advance_search', [ExampleController::class, 'advance_search'])->name('advance_search');
    Route::get('/example/file_upload', [ExampleController::class, 'file_upload'])->name('file_upload');
    Route::get('/example/video_upload', [ExampleController::class, 'video_upload'])->name('video_upload');
    Route::post('example/multidel', ['as' => 'example.multidel', 'uses' => 'ExampleController@multidel']);
    Route::get('/example/export_csv', [ExampleController::class, 'export_csv'])->name('export_csv');
    Route::get('/example/create_users_pdf', [ExampleController::class, 'create_users_pdf'])->name('create_users_pdf');
    Route::get('/example/excelDownload', [ExampleController::class, 'excelDownload'])->name('excelDownload');
    Route::any('/example/datatable_json', [ExampleController::class, 'datatable_json'])->name('example.datatable_json');
    Route::any('/example/advance_datatable_json', [ExampleController::class, 'advance_datatable_json'])->name('example.advance_datatable_json');
    Route::post('/example/change_status', [ExampleController::class, 'change_status'])->name('example.change_status');
    Route::post('example/search', ['as' => 'example.search', 'uses' => 'ExampleController@search']);
    Route::post('example/img_upload', ['as' => 'example.file_upload', 'uses' => 'ExampleController@img_upload']);
    Route::post('example/videofile_upload', ['as' => 'example.videofile_upload', 'uses' => 'ExampleController@videofile_upload']);
    Route::get('example/DeleteImage', ['as' => 'example.DeleteImage', 'uses' => 'ExampleController@DeleteImage']);
    Route::get('example/DeleteImage', ['as' => 'example.DeleteImage', 'uses' => 'ExampleController@DeleteImage']);
//  email tempalte end
    //invoice stystem

    Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices');
    Route::get('/invoices/invoice_pdf_download/{id}', [InvoiceController::class, 'invoice_pdf_download'])->name('invoices.invoice_pdf_download');
    Route::get('/invoices/invoice_delete/{id}', [InvoiceController::class, 'invoice_delete'])->name('invoices.invoice_delete');
    Route::any('invoices/customer_detail/', ['as' => 'invoices.customer_detail', 'uses' => 'InvoiceController@customer_detail']);
    Route::get('/invoices/add_invoice', [InvoiceController::class, 'add_invoice'])->name('invoices.add_invoice');
    Route::get('/invoices/{id}', [InvoiceController::class, 'view_invoice'])->name('invoices.view_invoice');
    Route::post('/invoices/add', [InvoiceController::class, 'store'])->name('invoices.store');
    Route::get('/invoices/edit_invoice/{id}', [InvoiceController::class, 'edit_invoice'])->name('invoices.edit_invoice');
    Route::post('invoices/update/{id}', ['as' => 'invoices.update', 'uses' => 'InvoiceController@update']);
    Route::any('invoices/create_pdf/', ['as' => 'invoices.create_pdf', 'uses' => 'InvoiceController@create_pdf']);
    Route::post('invoices/send_email_with_invoice/', ['as' => 'invoices.send_email_with_invoice', 'uses' => 'InvoiceController@send_email_with_invoice']);

    // joins

    Route::get('/joins', [JoinController::class, 'index'])->name('joins');
    Route::get('/joins/simple', [JoinController::class, 'simple'])->name('joins.simple');
    Route::any('/joins/datatable_json', [JoinController::class, 'datatable_json'])->name('joins.datatable_json');



// Charts
    Route::get('/chartjs', [ChartjsController::class, 'index'])->name('chart.chartjs');
    Route::get('/morris', [MorrisController::class, 'index'])->name('chart.morris');
    Route::get('/flot', [FlotChartsController::class, 'index'])->name('chart.flot');
    Route::get('/linecharts', [LineChartsController::class, 'index'])->name('chart.linecharts');
    Route::get('/chartjs/laravelcharts', [ChartjsController::class, 'laravelcharts'])->name('chartjs.laravelcharts');
// Charts End
// UI elements start
    Route::get('/ui/general', [UiController::class, 'general'])->name('general');
    Route::get('/ui/icons', [UiController::class, 'icons'])->name('icons');
    Route::get('/ui/buttons', [UiController::class, 'buttons'])->name('buttons');
    Route::get('/ui/sliders', [UiController::class, 'sliders'])->name('sliders');
    Route::get('/ui/timeline', [UiController::class, 'timeline'])->name('timeline');
    Route::get('/ui/modals', [UiController::class, 'modals'])->name('modals');
// UI elements end  
// Form elements start
    Route::get('/forms/generalform', [FormController::class, 'generalform'])->name('generalform');
    Route::get('/forms/advance', [FormController::class, 'advance'])->name('advance');
    Route::get('/forms/editors', [FormController::class, 'editors'])->name('editors');
    Route::get('/forms/jqueryValidation', [FormController::class, 'jqueryValidation'])->name('jqueryValidation');
// Form elements end  

    Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar');
    Route::get('/export', [ExportController::class, 'index'])->name('export');
    Route::get('/export/dbexport', [ExportController::class, 'dbexport'])->name('export.dbexport');


// Pages start
    Route::get('/pages/invoice', [PagesController::class, 'invoice'])->name('invoice');
    Route::get('/pages/profile', [PagesController::class, 'profile'])->name('profile');
    Route::get('/pages/login', [PagesController::class, 'login'])->name('pages.login');
    Route::get('/pages/register', [PagesController::class, 'register'])->name('pages.register');
    Route::get('/pages/lockscreen', [PagesController::class, 'lockscreen'])->name('lockscreen');
    Route::get('/pages/404', [PagesController::class, 'error404'])->name('error404');
    Route::get('/pages/500', [PagesController::class, 'error500'])->name('error500');
    Route::get('/pages/blank', [PagesController::class, 'blank'])->name('blank');
    Route::get('/pages/pace', [PagesController::class, 'pace'])->name('pace');
// pages end here
    // Mailbox start
    Route::get('/mailbox/inbox', [MailboxController::class, 'inbox'])->name('mailbox.inbox');
    Route::get('/mailbox/compose', [MailboxController::class, 'compose'])->name('mailbox.compose');
    Route::get('/mailbox/read_mail', [MailboxController::class, 'read_mail'])->name('mailbox.read_mail');
    // Mailbox end  
});

