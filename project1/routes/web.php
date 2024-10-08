<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CalculatorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
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
