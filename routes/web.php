<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDashDisplayingDatasController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CareersController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeAvatarController;
use App\Http\Controllers\EmployeeStatusController;
use App\Http\Controllers\Employee201FormController;
use App\Http\Controllers\EmployeeDocumentsController;
use App\Http\Controllers\EmployeePayslipController;
use App\Http\Controllers\OurClientsController;

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

//ROUTES FOR NAVIGATING THROUGH PAGES:

//For index page
Route::get('/', [PagesController::class, 'index']);

//For Employee login page
Route::get('/login', [PagesController::class, 'login']);

//Route for Admin Log In
Route::get('/loginAdmin', [PagesController::class, 'loginAdmin']);

//For User Dash page
Route::get('/userdash', [PagesController::class, 'userdash'])->middleware('Employee.Dash.Prevent');

//For Our Clients page
Route::get('/ourclients', [PagesController::class, 'ourclients']);

//For Contact Us page
Route::get('/contactus', [PagesController::class, 'contactus']);

//For Careers page
Route::get('/careers', [PagesController::class, 'careers']);

//For Admin Dash page   
Route::get('/admindash', [PagesController::class, 'admindash'])->middleware('Admin.Dash.Prevention');

//For About Us page
Route::get('/aboutus', [PagesController::class, 'aboutus']);



//ROUTES FOR FUNCTIONALITIES:

//For adding employee accounts via admin dashboard
Route::post('addemployee', [EmployeeController:: class, 'addemployee']);

//For Employee Login
Route::post('employeelogin', [EmployeeController::class, 'employeelogin']);

//For Employee Logout function
Route::post('logout-employee', [EmployeeController::class, 'logout'])->name('employee.logout');

//For Admin Login
Route::post('adminlogin', [AdminController::class, 'adminlogin']);

//For Admin Logout
Route::post('logout-admin', [AdminController::class, 'logout'])->name('admin.logout');

//For Contact Inquiry Sending data to database function
Route::post('sendinquiry',[ContactController::class, 'sendinquiry']);

//Route for update status in contact inquiry management
Route::post('admindash/{id}/update-status', [ContactController::class, 'updateStatus'])->name('admin.contactus.update-status');

//Route For Adding Employee Details to database
Route::post('addOrEditEmployeeDetails', [Employee201FormController::class, 'addOrEditEmployeeDetails']);

//Route For updating details of employee
Route::post('/employee/update/{id}', [Employee201FormController::class, 'updateDetails'])->name('employee.update');

//Route For Careers Sending Data to database function
Route::post('addCareers', [CareersController::class, 'addCareers']);

//Route For Deleting Career Items
Route::delete('deleteCareer/{id}', [CareersController::class, 'deleteCareer']);

//Route For Searching Employee names in admin
Route::get('/search/employees', [EmployeeController::class, 'employeeview'])->name('search.employees');

//ROute For Updating Status Of Employee
Route::put('admindash/{id}/updateEmployeeStatus', [EmployeeController::class, 'updateEmployeeStatus'])->name('updateEmployeeStatus');

//Route For Uploading Payslips file from admin to employee
Route::post('uploadEmployeePayslip', [EmployeePayslipController::class, 'uploadEmployeePayslip']);

//Route For The Payslip File to be downloadable
Route::get('download-payslip/{id}', [EmployeePayslipController::class, 'downloadPayslip'])->name('download.payslip');

//ROute For The Documents file to be downloadable
Route::get('download-documents/{id}', [EmployeeDocumentsController::class, 'downloadDocument'])->name('download.documents');

//Route To Send Employee Documents to database
Route::post('addDocument', [EmployeeDocumentsController::class , 'addDocument'])->name('add.Document');

//Route To Send Clients To Database
Route::post('add-clients', [OurClientsController::class, 'addClient'])->name('add.client');

//Route For Deleting Client Items
Route::delete('deleteClient/{id}', [OurClientsController::class, 'deleteClient']);





//ROUTES FOR FETCHING DATAS:

//Route For Fetching Added careers in Careers Blade View
Route::get('/careers', [CareersController::class, 'showingCareersPage']);

//Route For Proceeding to blade view Employee Details and fetching employee details
Route::get('/employee/details/{id}', [Employee201FormController::class, 'viewEmployeeDetails'])->name('employee.details');

//Route For Proceeding to blade view Employee Documents and fetching employee uploaded documents
Route::get('/employee/documents/{id}', [EmployeeDocumentsController::class, 'viewEmployeeDocuments'])->name('employee.documents');

//Route For Fetching Employee 201 Form details and Employee Payslip in their userdashboard
Route::get('userdash', [EmployeeController::class, 'viewEmployeeData'])->middleware('Employee.Dash.Prevent');//HAD TO PUT THE OTHER /USERDASH TO MIDDLEWARE BECAUSE IT STILL CAN ACCESS THE USERDASH URL WITHOUT LOGGING IN

//Route to display Clients in Clients Page
Route::get('/ourclients', [OurClientsController:: class, 'clientBladeDisplay']);

//Route For Displaying datas such as Careers, Employees, Clients, Contact Inquiries in admindash
Route::get('/admindash', [AdminDashDisplayingDatasController::class, 'adminDisplayDatasView'])->middleware('Admin.Dash.Prevention');

//HAD TO GROUP THE OTHER /ADMINDASH TO MIDDLEWARE BECAUSE IT STILL CAN ACCESS THE ADMINDASH URL WITHOUT LOGGING IN
//Route::middleware(['Admin.Dash.Prevention'])->group(function () {

    //Route For Fetching Added Careers
   // Route::get('/admindash', [CareersController::class, 'viewAdminCareers']);

    //Route For Fetching Data of Employee in Records Admin Dashboard
  //  Route::get('/admindash', [EmployeeController::class, 'employeeview']);

    //Route To Fetch Clients Records in admin dash
   // Route::get('/admindash', [OurClientsController::class, 'clientView']);

    //For Fetching data from contact us to admin dashboard
   // Route::get('/admindash', [ContactController::class, 'adminView']);

//});



//Routes auth middleware for any data that needs user authentication
Route::middleware(['auth'])->group(function () {

    //For Adding Avatar in User Dash
    Route::post('/employeeavatar', [EmployeeAvatarController::class, 'employeeavatar'])->name('employee.avatar');

    //For Deleting Uploded avatar
    Route::post('/deleteavatar', [EmployeeAvatarController::class, 'deleteAvatar'])->name('delete.avatar');

});