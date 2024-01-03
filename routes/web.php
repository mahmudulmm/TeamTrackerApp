<?php

use App\Http\Controllers\adminLoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CaseRegisterController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EpostController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PtypeController;
use App\Http\Controllers\PaymentoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\HostController;
use App\Http\Controllers\StatementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\homepageController;


Route::get('/',function ()  {
    return view('auth.login');
} );

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::prefix('admin')->group(function () {
    Route::get('/login', [adminLoginController::class,'showAdminLoginForm'])->name('admin-login');
    Route::post('/login',[adminLoginController::class,'login'])->name('login');
    Route::post('/logout',[adminLoginController::class,'logout'])->name('logout');
    Route::get('/home', [homepageController::class,'homepage'])->name('home');
    Route::get('/profile', [homepageController::class,'profile'])->name('admin-profile');
});

Route::prefix('meeting')->group(function () {
    Route::get('/allmeeting', [MeetingController::class, 'allmeeting'])->name('allmeeting');
    Route::get('/tometting', [MeetingController::class, 'tometting'])->name('tometting');
    Route::get('/mestatus', [MeetingController::class, 'mestatus'])->name('mestatus');
    
});

Route::prefix('employees')->group(function () {
    Route::get('/allemp', [EmployeeController::class, 'allemp'])->name('allemp');
    Route::get('/addemp', [EmployeeController::class, 'addemp'])->name('addemp');
    Route::post('/addemp', [EmployeeController::class, 'store'])->name('employees.store');
    Route::get('/empattendence', [EmployeeController::class, 'empattendence'])->name('empattendence');
    
});

Route::prefix('emposts')->group(function () {
    Route::get('/emppost', [EpostController::class, 'emppost'])->name('emposts.emppost');
    Route::post('/emppost', [EpostController::class, 'store'])->name('emposts.store');
    
});

Route::prefix('ptype')->group(function () {
    Route::get('/type', [PtypeController::class, 'type'])->name('type');
    Route::post('/type', [PtypeController::class, 'store'])->name('ptype.store');
    
});

Route::prefix('paymento')->group(function () {
    Route::get('/paymentop', [PaymentoController::class, 'paymentop'])->name('paymentop');
    Route::get('/show/{id}',[PaymentoController::class, 'show'])->name('paymento.show');
    Route::post('/paymentop', [PaymentoController::class, 'store'])->name('paymento.store');
    
});

Route::prefix('leaves')->group(function () {
    Route::get('/leave_apl', [LeaveController::class, 'leave_apl'])->name('leave_apl'); 
    Route::put('/leaves/update-status/{leave}', [LeaveController::class ,'updateStatus'])->name('leave_apl.updateStatus');
});

Route::prefix('holidays')->group(function () {
    Route::get('/holiday', [HolidayController::class, 'holiday'])->name('holidays.holiday');
    Route::post('/holiday', [HolidayController::class, 'store'])->name('holidays.store');
});

Route::prefix('elocations')->group(function () {
    Route::get('/elocationsmap', [LocationController::class, 'elocationsmap'])->name('elocationsmap'); 
});

Route::prefix('empnotifications')->group(function () {
    Route::get('/empnotification', [NotificationController::class, 'allnotification'])->name('allnotification');
    Route::get('/addempnotification', [NotificationController::class, 'addempnotification'])->name('addempnotification');
    Route::post('/addempnotification', [NotificationController::class, 'store'])->name('empnotifications.store');  
});

Route::prefix('order')->group(function () {
    Route::get('/allorder', [OrderController::class, 'allorder'])->name('allorder');
    Route::get('/addorder/{id}', [OrderController::class, 'addorder'])->name('order.addorder');
    Route::post('/addorder', [OrderController::class, 'store'])->name('order.store');
  
});

Route::prefix('products')->group(function () {
    Route::get('/allproduct', [ProductsController::class, 'allproduct'])->name('allproduct');
});

Route::prefix('statements')->group(function () {
    Route::get('/statement', [StatementController::class, 'statement'])->name('statement');
});


Route::prefix('invoice')->group(function () {
    Route::get('/allinvoice', [InvoiceController::class, 'allinvoice'])->name('allinvoice');
    Route::get('/previewi', [InvoiceController::class, 'previewi'])->name('previewi');
      Route::get('/addinvoice/{id}', [InvoiceController::class, 'addinvoice'])->name('invoice.addinvoice');
    Route::get('/addinvoice', [InvoiceController::class, 'addinvoice'])->name('addinvoice');
    
});

Route::prefix('host')->group(function () {
    Route::get('/zone', [HostController::class, 'zone'])->name('zone');
    Route::post('/zone', [HostController::class, 'store'])->name('zone.store');
    Route::get('/group', [HostController::class, 'group'])->name('group');
    Route::post('/group', [HostController::class, 'gstore'])->name('group.gstore');
    Route::get('/member', [HostController::class, 'member'])->name('member');
    Route::post('/member', [HostController::class, 'mstore'])->name('member.mstore');
    Route::get('/leader', [HostController::class, 'leader'])->name('leader');
    
    
});