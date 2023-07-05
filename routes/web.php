<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoicesReport;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomersReport;

use App\Http\Controllers\FrontController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\InvoiceAchiveController;
use App\Http\Controllers\InvoiceDetailController;
use App\Http\Controllers\InvoiceAttachmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('invoices', InvoiceController::class);

Route::resource('sections', SectionController::class);

Route::resource('products', ProductController::class);

Route::resource('InvoiceAttachments', InvoiceAttachmentController::class);


Route::resource('Archive', InvoiceAchiveController::class);


Route::get('/section/{id}', [InvoiceController::class, 'getproducts']);


Route::get('/edit_invoice/{id}', [InvoiceController::class, 'edit']);


Route::get('/Status_show/{id}', [InvoiceController::class, 'show'])->name('Status_show');


Route::get('/Status_Update/{id}', [InvoiceController::class, 'Status_Update'])->name('Status_Update');


Route::get('Invoice_Paid', [InvoiceController::class, 'Invoice_Paid']);


Route::get('Invoice_UnPaid', [InvoiceController::class, 'Invoice_UnPaid']);


Route::get('Invoice_Partial', [InvoiceController::class, 'Invoice_Partial']);


Route::get('Print_invoice/{id}', [InvoiceController::class, 'Print_invoice']);


Route::get('MarkAsRead_all', [InvoiceController::class, 'MarkAsRead_all'])->name('MarkAsRead_all');

Route::get('unreadNotifications_count', [InvoiceController::class, 'unreadNotifications_count'])->name('unreadNotifications_count');

Route::get('unreadNotifications', [InvoiceController::class, 'unreadNotifications'])->name('unreadNotifications');

Route::get('export_invoices', [InvoiceController::class, 'export']);

Route::group(['middleware' => ['auth']], function() {


    Route::resource('roles', RoleController::class);

    Route::resource('users', UserController::class);

    });

Route::get('invoices_report', [InvoicesReport::class, 'index']);

Route::post('Search_invoices', [InvoicesReport::class, 'Search_invoices']);


Route::get('customers_report', [CustomersReport::class, 'index'])->name("customers_report");

Route::post('Search_customers', [CustomersReport::class, 'Search_customers']);


Route::get('/InvoicesDetails/{id}', [InvoiceDetailController::class, 'edit']);


Route::get('download/{invoice_number}/{file_name}', [InvoiceDetailController::class, 'get_file']);


Route::get('View_file/{invoice_number}/{file_name}', [InvoiceDetailController::class, 'open_file']);


Route::get('delete_file', [InvoiceDetailController::class, 'destroy'])->name('delete_file');









Route::get('/{page}', [AdminController::class , 'index']);


Route::group(['middleware' => ['auth' , 'checkUser']] , function(){

    Route::get('/front/home', [FrontController::class, 'index'])->name('fronts.home');
    Route::get('/front/Orders', [FrontController::class, 'show_orders'])->name('fronts.order');


    Route::get('/front/show_invoice/{id}', [FrontController::class, 'show_invoice']);


});
