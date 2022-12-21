<?php

use App\Http\Controllers\CategoryBuyingController;
use App\Http\Controllers\CategorySellingController;
use App\Http\Controllers\ConsigneeController;
use App\Http\Controllers\ContainerSizeTypeController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\JobSheetController;
use App\Http\Controllers\MandatoryTaxController;
use App\Http\Controllers\NotifyPartyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShipperController;
use App\Http\Controllers\TypeBillOfLadingController;
use App\Http\Controllers\TypeCurrencyController;
use App\Http\Controllers\TypePackagingController;
use App\Http\Controllers\TypeWeightController;
use App\Http\Controllers\TypeMeasurementController;
use App\Http\Controllers\TypePaymentController;
use App\Http\Controllers\UndernameController;
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

// Undername Controller
Route::middleware('auth')->group(function () {
    Route::controller(UndernameController::class)->group(function () {
        Route::get('/undername', 'index')->name('undername');
        Route::get('/undernameShow/{id}', 'show')->name('undername.show');
        Route::get('/undernameCreate', 'create')->name('undername.create');
        Route::post('/undernameStore', 'store')->name('undername.store');
        Route::get('/undernameEdit/{id}', 'edit')->name('undername.edit');
        Route::put('/undernameUpdate/{id}', 'update')->name(('undername.update'));
        Route::get('/undernameDestroy/{id}', 'destroy')->name('undername.destroy');
    });
});

// Consignee Controller
Route::middleware('auth')->group(function () {
    Route::controller(ConsigneeController::class)->group(function () {
        Route::get('/consignee', 'index')->name('consignee');
        Route::get('/consigneeShow/{id}', 'show')->name('consignee.show');
        Route::get('/consigneeCreate', 'create')->name('consignee.create');
        Route::post('/consigneeStore', 'store')->name('consignee.store');
        Route::get('/consigneeEdit/{id}', 'edit')->name('consignee.edit');
        Route::put('/consigneeUpdate/{id}', 'update')->name(('consignee.update'));
        Route::get('/consigneeDestroy/{id}', 'destroy')->name('consignee.destroy');
    });
});

// Notify Party Controller
Route::middleware('auth')->group(function () {
    Route::controller(NotifyPartyController::class)->group(function () {
        Route::get('/notifyParty', 'index')->name('notifyParty');
        Route::get('/notifyPartyShow/{id}', 'show')->name('notifyParty.show');
        Route::get('/notifyPartyCreate', 'create')->name('notifyParty.create');
        Route::post('/notifyPartyStore', 'store')->name('notifyParty.store');
        Route::get('/notifyPartyEdit/{id}', 'edit')->name('notifyParty.edit');
        Route::put('/notifyPartyUpdate/{id}', 'update')->name(('notifyParty.update'));
        Route::get('/notifyPartyDestroy/{id}', 'destroy')->name('notifyParty.destroy');
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

// Category Buying
Route::middleware('auth')->group(function () {
    Route::controller(CategoryBuyingController::class)->group(function () {
        Route::get('/categoryBuying', 'index')->name('categoryBuying');
        Route::get('/categoryBuyingShow/{id}', 'show')->name('categoryBuying.show');
        Route::get('/categoryBuyingCreate', 'create')->name('categoryBuying.create');
        Route::post('/categoryBuyingStore', 'store')->name('categoryBuying.store');
        Route::get('/categoryBuyingEdit/{id}', 'edit')->name('categoryBuying.edit');
        Route::put('/categoryBuyingUpdate/{id}', 'update')->name(('categoryBuying.update'));
        Route::get('/categoryBuyingDestroy/{id}', 'destroy')->name('categoryBuying.destroy');
    });
});

// Category Selling
Route::middleware('auth')->group(function () {
    Route::controller(CategorySellingController::class)->group(function () {
        Route::get('/categorySelling', 'index')->name('categorySelling');
        Route::get('/categorySellingShow/{id}', 'show')->name('categorySelling.show');
        Route::get('/categorySellingCreate', 'create')->name('categorySelling.create');
        Route::post('/categorySellingStore', 'store')->name('categorySelling.store');
        Route::get('/categorySellingEdit/{id}', 'edit')->name('categorySelling.edit');
        Route::put('/categorySellingUpdate/{id}', 'update')->name(('categorySelling.update'));
        Route::get('/categorySellingDestroy/{id}', 'destroy')->name('categorySelling.destroy');
    });
});


Route::middleware('auth')->group(function () {
    Route::controller(JobSheetController::class)->group(function () {
        Route::get('/jobSheet', 'index')->name('jobSheet');
        // Route::get('/jobSheetShow/{id}', 'show')->name('jobSheet.show');
        Route::get('/jobSheetCreate', 'create')->name('jobSheet.create');
        Route::post('/jobSheetStore', 'store')->name('jobSheet.store');
        // Route::get('/jobSheetEdit/{id}', 'edit')->name('jobSheet.edit');
        // Route::put('/jobSheetUpdate/{id}', 'update')->name(('jobSheet.update'));
        // Route::get('/jobSheetDestroy/{id}', 'destroy')->name('jobSheet.destroy');
    });
});

