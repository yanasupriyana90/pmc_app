<?php

use App\Http\Controllers\ContainerSizeTypeController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShipperController;
use App\Http\Controllers\TypePackagingController;
use App\Http\Controllers\TypeWeightController;
use App\Models\Shipper;
use App\Models\TypePackaging;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'verified'])->get('/user', function () {
    // $users = User::all();
    $users = DB::table('users')->get();
    return view('master.user.index', compact('users'));
})->name('user');


// Shipper Controller
Route::middleware('auth')->group(function () {
    Route::controller(ShipperController::class)->group(function () {
        Route::get('/shipper', 'index')->name('shipper');
        Route::get('/shipperShow/{id}', 'show')->name('shipper.show');
        Route::get('/shipperCreate', 'create')->name('shipper.create');
        Route::post('/shipperStore', 'store')->name('shipper.store');
        Route::get('/shipperEdit/{id}', 'edit')->name('shipper.edit');
        Route::put('/shipperUpdate/{id}', 'update')->name(('shipper.update'));
        Route::get('/shipperDestroy/{id}', 'destroy')->name('shipper.destroy');
    });
});

// Division Controller
Route::middleware('auth')->group(function () {
    Route::controller(DivisionController::class)->group(function () {
        Route::get('/division', 'index')->name('division');
        Route::get('/divisionShow/{id}', 'show')->name('division.show');
        Route::get('/divisionCreate', 'create')->name('division.create');
        Route::post('/divisionStore', 'store')->name('division.store');
        Route::get('/divisionEdit/{id}', 'edit')->name('division.edit');
        Route::put('/divisionUpdate/{id}', 'update')->name(('division.update'));
        Route::get('/divisionDestroy/{id}', 'destroy')->name('division.destroy');
    });
});

// ContainerSizeType Controller
Route::middleware('auth')->group(function () {
    Route::controller(ContainerSizeTypeController::class)->group(function () {
        Route::get('/containerSizeType', 'index')->name('containerSizeType');
        Route::get('/containerSizeTypeShow/{id}', 'show')->name('containerSizeType.show');
        Route::get('/containerSizeTypeCreate', 'create')->name('containerSizeType.create');
        Route::post('/containerSizeTypeStore', 'store')->name('containerSizeType.store');
        Route::get('/containerSizeTypeEdit/{id}', 'edit')->name('containerSizeType.edit');
        Route::put('/containerSizeTypeUpdate/{id}', 'update')->name(('containerSizeType.update'));
        Route::get('/containerSizeTypeDestroy/{id}', 'destroy')->name('containerSizeType.destroy');
    });
});


// Type Packaging
Route::middleware('auth')->group(function () {
    Route::controller(TypePackagingController::class)->group(function () {
        Route::get('/typePackaging', 'index')->name('typePackaging');
        Route::get('/typePackagingShow/{id}', 'show')->name('typePackaging.show');
        Route::get('/typePackagingCreate', 'create')->name('typePackaging.create');
        Route::post('/typePackagingStore', 'store')->name('typePackaging.store');
        Route::get('/typePackagingEdit/{id}', 'edit')->name('typePackaging.edit');
        Route::put('/typePackagingUpdate/{id}', 'update')->name(('typePackaging.update'));
        Route::get('/typePackagingDestroy/{id}', 'destroy')->name('typePackaging.destroy');
    });
});


// Type Weight
Route::middleware('auth')->group(function () {
    Route::controller(TypeWeightController::class)->group(function () {
        Route::get('/typeWeight', 'index')->name('typeWeight');
        Route::get('/typeWeightShow/{id}', 'show')->name('typeWeight.show');
        Route::get('/typeWeightCreate', 'create')->name('typeWeight.create');
        Route::post('/typeWeightStore', 'store')->name('typeWeight.store');
        Route::get('/typeWeightEdit/{id}', 'edit')->name('typeWeight.edit');
        Route::put('/typeWeightUpdate/{id}', 'update')->name(('typeWeight.update'));
        Route::get('/typeWeightDestroy/{id}', 'destroy')->name('typeWeight.destroy');
    });
});
