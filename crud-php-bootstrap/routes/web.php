<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntryController;

Route::get('/', [EntryController::class, 'index']);
Route::get('/entries/trash', [EntryController::class, 'trash'])->name('entries.trash');
Route::post('/entries/{id}/restore', [EntryController::class, 'restore'])->name('entries.restore');
Route::post('/export', [EntryController::class, 'exportExcel'])->name('export.excel');


Route::resource('entries', EntryController::class);


