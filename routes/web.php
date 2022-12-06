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
/*Route::post('/edit', [AuditoriaController::class, 'edit'])->name('auditoria.edit');*/
Route::get('/show', [AuditsController::class, 'show'])->name('Audits.show');
Route::get('/', [AudittypeController::class, 'index'])->name('Audittype.index');