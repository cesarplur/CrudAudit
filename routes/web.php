<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuditsController;
use App\Http\Controllers\AudittypeController;

Route::get('/', function () {
    return view('index');
});

Route::get('/', [AuditsController::class, 'index'])->name('Audits.index');
Route::post('/store', [AuditsController::class, 'store'])->name('Audits.store');
Route::get('/create', [AuditsController::class, 'create'])->name('Audits.create');
Route::get('/edit/{id}', [AuditsController::class, 'edit'])->name('Audits.edit');
Route::get('/show', [AuditsController::class, 'show'])->name('Audits.show');
Route::get('/', [AudittypeController::class, 'index'])->name('Audittype.index');
Route::post('/storetype', [AudittypeController::class, 'store'])->name('Audittype.store');
Route::post('/update/{id}', [AuditsController::class, 'update'])->name('Audits.update');
Route::post('/destroy/{id}', [AuditsController::class, 'destroy'])->name('Audits.destroy');