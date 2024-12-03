<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/sdasd', function () {
    return view('welcome');
});


// Route::get('/calculator',[CalculatorController::class, 'showCalculatorpage']);
// Route::post('/calculator',[CalculatorController::class, 'calculate'])->name('callcalculate');

// Route::get('/add',[PrelimTuquibController::class, 'showAddCalculatorpage']);
// Route::post('/add',[PrelimTuquibController::class, 'calculate'])->name('callcalculate');



// Route::get('/dashboard1',[PrelimTuquibController::class, 'showCalculatorpage']);
// Route::post('/calculator',[PrelimTuquibController::class, 'calculate'])->name('callcalculate');

// Route::get('/index', function () {
//     return view('mypages.index');
// })->name('index');

// Route::get('/gallery', function () {
//     return view('mypages.gallery');
// })->name('gallery');

// Route::get('/services', function () {
//     return view('mypages.services');
// })->name('services');




Route::get('/home1',function (){
    return view('prelim-raymund.home1');
})->name('home1');

Route::get('/add', function () {
    return view('prelim-raymund.add');
})->name('add');

Route::get('/sub', function () {
    return view('prelim-raymund.sub');
})->name('sub');
Route::get('/divide', function () {
    return view('prelim-raymund.divide');
})->name('divide');
Route::get('/multiply', function () {
    return view('prelim-raymund.multiply');
})->name('multiply');




Route::post('/add', [CalculatorController::class, 'add']);
Route::post('/sub', [CalculatorController::class, 'sub']);
Route::post('/multiply', [CalculatorController::class, 'multiply']);
Route::post('/divide', [CalculatorController::class, 'divide']);

// Route::get('/LogInna',function(){
//     return view('itequipment.dashboard');
// })->name('form_login');

// Route::post('/LogInna', function (){
//     return view('itequipment.dashboard');
// })->middleware('login.middleware');

// Route::get('/dashboard1', function (){
//     return view('itequipment.dashboard1');
// })->name('gotodashboard1');







Route::get('/', function (){
    return view('design.logindesign');
})->name('form_login');


Route::get('/signup',function(){
    return view('Design.signupdesign');
})->name('form_signup');



Route::middleware(['auth'])->group(function(){
    //ADMIN ROUTES
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function(){

        //route1
        Route::get('/main-dashboard',function(){
            return view('Design.dashboard');
        })->name('main-dashboard');

        //route2
        Route::controller(EventController::class)->group(function (){
            Route::get('/main-dashboard','index')->name('main-dashboard');
            Route::post('/add_event', 'add_event')->name('add_event');
            Route::put('/update_event/{id}','update_event')->name('update_event');
        });

    });

    //REGISTRAR ROUTE
    Route::middleware(['role:registrar'])->prefix('registrar')->name('registrar.')->group(function(){

        Route::get('/main-dashboard',function(){
            return view('Design.dashboard');
        })->name('main-dashboard');

    });

    //FACULTY ROUTE
    Route::middleware(['role:faculty'])->prefix('faculty')->name('faculty.')->group(function(){

        Route::get('/main-dashboard',function(){
            return view('Design.dashboard');
        })->name('main-dashboard');

    });




});



// Route::get('/dashboard', function () {
//     return view('Design.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');










Route::get('/showLogin', function (){
    return view('mymiddlewaredemo.login');
})->name('login_Form');

Route::post('/showLogin', function (){
    return view('mymiddlewaredemo.login');
})->middleware('login.middleware');

Route::get('/showDashboard', function (){
    return view('mymiddlewaredemo.dashboard');
})->name('gotodashboard');













// Route::get('/calculator', function () {
//     return view('mypages.calculator');
// })->name('calculator');







// Route::get('/Tuquib', function () {
//     return view('tuquib');
// })->name('cojie2');

// Route::get('/Tuquib1', function () {
//     return view('tuquib1');
// })->name('cojie');//name routes








Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
