<?php

use App\Http\Controllers\ContainerSizeTypeController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\JobSheetController;
use App\Http\Controllers\MandatoryTaxController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShipperController;
use App\Http\Controllers\TypeBillOfLadingController;
use App\Http\Controllers\TypeCurrencyController;
use App\Http\Controllers\TypePackagingController;
use App\Http\Controllers\TypeWeightController;
use App\Http\Controllers\TypeMeasurementController;
use App\Http\Controllers\TypePaymentController;
use App\Http\Controllers\UndernameMBLController;
use App\Http\Controllers\UndernameHBLController;
use App\Http\Controllers\CategoryBuySellController;
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

// Undername M-BL Controller
Route::middleware('auth')->group(function () {
    Route::controller(UndernameMblController::class)->group(function () {
        Route::get('/undernameMbl', 'index')->name('undernameMbl');
        Route::get('/undernameMblShow/{id}', 'show')->name('undernameMbl.show');
        Route::get('/undernameMblCreate', 'create')->name('undernameMbl.create');
        Route::post('/undernameMblStore', 'store')->name('undernameMbl.store');
        Route::get('/undernameMblEdit/{id}', 'edit')->name('undernameMbl.edit');
        Route::put('/undernameMblUpdate/{id}', 'update')->name(('undernameMbl.update'));
        Route::get('/undernameMblDestroy/{id}', 'destroy')->name('undernameMbl.destroy');
    });
});

// Undername H-BL Controller
Route::middleware('auth')->group(function () {
    Route::controller(UndernameHblController::class)->group(function () {
        Route::get('/undernameHbl', 'index')->name('undernameHbl');
        Route::get('/undernameHblShow/{id}', 'show')->name('undernameHbl.show');
        Route::get('/undernameHblCreate', 'create')->name('undernameHbl.create');
        Route::post('/undernameHblStore', 'store')->name('undernameHbl.store');
        Route::get('/undernameHblEdit/{id}', 'edit')->name('undernameHbl.edit');
        Route::put('/undernameHblUpdate/{id}', 'update')->name(('undernameHbl.update'));
        Route::get('/undernameHblDestroy/{id}', 'destroy')->name('undernameHbl.destroy');
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

// Type Measurement
Route::middleware('auth')->group(function () {
    Route::controller(TypeMeasurementController::class)->group(function () {
        Route::get('/typeMeasurement', 'index')->name('typeMeasurement');
        Route::get('/typeMeasurementShow/{id}', 'show')->name('typeMeasurement.show');
        Route::get('/typeMeasurementCreate', 'create')->name('typeMeasurement.create');
        Route::post('/typeMeasurementStore', 'store')->name('typeMeasurement.store');
        Route::get('/typeMeasurementEdit/{id}', 'edit')->name('typeMeasurement.edit');
        Route::put('/typeMeasurementUpdate/{id}', 'update')->name(('typeMeasurement.update'));
        Route::get('/typeMeasurementDestroy/{id}', 'destroy')->name('typeMeasurement.destroy');
    });
});

// Type Currency
Route::middleware('auth')->group(function () {
    Route::controller(TypeCurrencyController::class)->group(function () {
        Route::get('/typeCurrency', 'index')->name('typeCurrency');
        Route::get('/typeCurrencyShow/{id}', 'show')->name('typeCurrency.show');
        Route::get('/typeCurrencyCreate', 'create')->name('typeCurrency.create');
        Route::post('/typeCurrencyStore', 'store')->name('typeCurrency.store');
        Route::get('/typeCurrencyEdit/{id}', 'edit')->name('typeCurrency.edit');
        Route::put('/typeCurrencyUpdate/{id}', 'update')->name(('typeCurrency.update'));
        Route::get('/typeCurrencyDestroy/{id}', 'destroy')->name('typeCurrency.destroy');
    });
});

// Type Bill Of Lading
Route::middleware('auth')->group(function () {
    Route::controller(TypeBillOfLadingController::class)->group(function () {
        Route::get('/typeBillOfLading', 'index')->name('typeBillOfLading');
        Route::get('/typeBillOfLadingShow/{id}', 'show')->name('typeBillOfLading.show');
        Route::get('/typeBillOfLadingCreate', 'create')->name('typeBillOfLading.create');
        Route::post('/typeBillOfLadingStore', 'store')->name('typeBillOfLading.store');
        Route::get('/typeBillOfLadingEdit/{id}', 'edit')->name('typeBillOfLading.edit');
        Route::put('/typeBillOfLadingUpdate/{id}', 'update')->name(('typeBillOfLading.update'));
        Route::get('/typeBillOfLadingDestroy/{id}', 'destroy')->name('typeBillOfLading.destroy');
    });
});

// Type Payment
Route::middleware('auth')->group(function () {
    Route::controller(TypePaymentController::class)->group(function () {
        Route::get('/typePayment', 'index')->name('typePayment');
        Route::get('/typePaymentShow/{id}', 'show')->name('typePayment.show');
        Route::get('/typePaymentCreate', 'create')->name('typePayment.create');
        Route::post('/typePaymentStore', 'store')->name('typePayment.store');
        Route::get('/typePaymentEdit/{id}', 'edit')->name('typePayment.edit');
        Route::put('/typePaymentUpdate/{id}', 'update')->name(('typePayment.update'));
        Route::get('/typePaymentDestroy/{id}', 'destroy')->name('typePayment.destroy');
    });
});

// Type Mandatory Tax
Route::middleware('auth')->group(function () {
    Route::controller(MandatoryTaxController::class)->group(function () {
        Route::get('/mandatoryTax', 'index')->name('mandatoryTax');
        Route::get('/mandatoryTaxShow/{id}', 'show')->name('mandatoryTax.show');
        Route::get('/mandatoryTaxCreate', 'create')->name('mandatoryTax.create');
        Route::post('/mandatoryTaxStore', 'store')->name('mandatoryTax.store');
        Route::get('/mandatoryTaxEdit/{id}', 'edit')->name('mandatoryTax.edit');
        Route::put('/mandatoryTaxUpdate/{id}', 'update')->name(('mandatoryTax.update'));
        Route::get('/mandatoryTaxDestroy/{id}', 'destroy')->name('mandatoryTax.destroy');
    });
});

// Category Buy & Sell
Route::middleware('auth')->group(function () {
    Route::controller(CategoryBuySellController::class)->group(function () {
        Route::get('/categoryBuySell', 'index')->name('categoryBuySell');
        Route::get('/categoryBuySellShow/{id}', 'show')->name('categoryBuySell.show');
        Route::get('/categoryBuySellCreate', 'create')->name('categoryBuySell.create');
        Route::post('/categoryBuySellStore', 'store')->name('categoryBuySell.store');
        Route::get('/categoryBuySellEdit/{id}', 'edit')->name('categoryBuySell.edit');
        Route::put('/categoryBuySellUpdate/{id}', 'update')->name(('categoryBuySell.update'));
        Route::get('/categoryBuySellDestroy/{id}', 'destroy')->name('categoryBuySell.destroy');
    });
});

// Jobsheet
Route::middleware('auth')->group(function () {
    Route::controller(JobSheetController::class)->group(function () {
        Route::get('/jobSheet', 'index')->name('jobSheet');
        Route::get('jobSheetStatus/{id}', 'changeStatus')->name('jobSheet.changeStatus');
        // Route::get('/jobSheetShow/{id}', 'show')->name('jobSheet.show');
        Route::get('/jobSheetCreate', 'create')->name('jobSheet.create');
        Route::get('/jobSheetCreate/get-shippers/{nameShip}', 'getShippers');
        Route::get('/jobSheetCreate/get-undernameMbl/{nameUndMbl}', 'getUndernameMbls');
        Route::get('/jobSheetCreate/get-undernameHbl/{nameUndHbl}', 'getUndernameHbls');
        Route::get('/jobSheetCreate/get-sizeTypeCont/{nameSizeTypeCont}', 'getSizeTypeConts');
        Route::get('/jobSheetCreate/get-typePack/{nameTypePack}', 'getTypePack');

        Route::post('/jobSheetStore', 'store')->name('jobSheet.store');
        // Route::get('/jobSheetEdit/{id}', 'edit')->name('jobSheet.edit');
        // Route::put('/jobSheetUpdate/{id}', 'update')->name(('jobSheet.update'));
        // Route::get('/jobSheetDestroy/{id}', 'destroy')->name('jobSheet.destroy');
    });
});

