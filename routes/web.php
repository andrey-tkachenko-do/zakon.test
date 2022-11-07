<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::controller(SearchController::class)->middleware(['verified'])->group(function () {
    Route::get('/', 'index')->name('search-index');
    Route::get('/search', 'searchResults')->name('search-documents');
});


Route::resource('document', DocumentController::class);

require __DIR__.'/auth.php';
