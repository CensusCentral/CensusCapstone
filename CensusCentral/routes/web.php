<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GraphController;
use App\Http\Controllers\IsfController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisteredUserController;


use App\Http\Controllers\Auth\AuthenticatedSessionController;


Route::get('/', function () {
    return view('login.login');
});


//LOGIN
Route::get('login', [AuthenticatedSessionController::class, 'create'])
     ->middleware('guest')
     ->name('login');

Route::post('login', [AuthenticatedSessionController::class, 'store'])
     ->middleware('guest');


     Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
     ->middleware('auth')
     ->name('logout');

     Route::post('/accounts/register', [IsfController::class, 'register'])
     ->middleware(['auth', 'verified', 'rolemanager:admin'])
     ->name('register.save');


     

// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


// INTERFACE ROUTES
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified', 'rolemanager:admin'])->name('dashboard');

Route::get('/surveyTeam/STdashboard', function () {
    return view('surveyTeam.STdashboard');
})->middleware(['auth', 'verified', 'rolemanager:survey Team'])->name('STDashboard');

Route::get('/4ps/4psdashboard', function () {
    return view('4ps.4psdashboard');
})->middleware(['auth', 'verified', 'rolemanager:4ps'])->name('4psDashboard');



// DASHBOARD ROUTES
    Route::get('/admin/sideComponents/accounts/accounts', function () {
        return view('admin.sideComponents.accounts.accounts');
    })->middleware(['auth', 'verified', 'rolemanager:admin'])->name('admin.accounts');


    Route::get('/admin/sideComponents/accounts/accounts', [IsfController::class, 'accountIndex'])
    ->middleware(['auth', 'verified', 'rolemanager:admin'])
    ->name('admin.accounts');


    Route::get('/admin/sideComponents/censusForm/FormA', function () {
        return view('admin.sideComponents.censusForm.FormA');
    })->middleware(['auth', 'verified', 'rolemanager:admin'])->name('admin.form');


    Route::get('/admin/sideComponents/barangay/barangay', function () {
        return view('admin.sideComponents.barangay.barangay');
    })->middleware(['auth', 'verified', 'rolemanager:admin'])->name('admin.barangay');

    Route::get('/admin/barangay', [IsfController::class, 'index'])
    ->middleware(['auth', 'verified', 'rolemanager:admin'])
    ->name('admin.barangay');

    Route::get('/admin/sideComponents/reports/reports', function () {
        return view('admin.sideComponents.reports.reports');
    })->middleware(['auth', 'verified', 'rolemanager:admin'])->name('admin.reports');

    Route::get('/admin/sideComponents/penalties/penalties', function () {
        return view('admin.sideComponents.penalties.penalties');
    })->middleware(['auth', 'verified', 'rolemanager:admin'])->name('admin.penalties');

    Route::get('/admin/sideComponents/analysis/analysis', function () {
        return view('admin.sideComponents.analysis.analysis');
    })->middleware(['auth', 'verified', 'rolemanager:admin'])->name('admin.analysis');




    Route::controller(IsfController::class)->group(function() {
        Route::post('Isfhead/store', 'store')->name('Isfhead.store');
        Route::get('barangay/headIndex/{id}', 'headIndex')->name('barangay.headIndex');
        Route::get('barangay/memberIndex/{id}', 'memberIndex')->name('barangay.memberIndex');
        Route::put('barangay/update/{id}',  'update')->name('barangay.update');
    });
    

    

    Route::controller(GraphController::class)->group(function() {
       
        Route::get('admin/dashboard', [GraphController::class, 'totalPopulationByAllBarangays'])->name('dashboard');
        Route::get('/admin/sideComponents/reports/reports', 'getPopulationByBarangay')->name('admin.reports');
        
       
    });


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';


// Route::get('/barangay', [IsfController::class, 'index'])->name('barangay.index');

// Route::get('barangay/headIndex/{id}', [IsfController::class, 'headIndex'])->name('barangay.headIndex');
// Route::get('barangay/memberIndex/{id}', [IsfController::class, 'memberIndex'])->name('barangay.memberIndex');


// Route::post('/Isfhead', [IsfController::class, 'store'])->name('isfhead.store');

// Route::put('barangay/update/{id}', [IsfController::class, 'update'])->name('barangay.update');