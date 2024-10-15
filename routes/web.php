<?php

use App\Models\Contact;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;


Route::get('/', [ContactController::class, 'index'])->name('contact.index');
Route::get('/contact/create', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');
Route::get('/contact/edit/{id}', [ContactController::class, 'edit'])->name('contact.edit');
Route::get('/contact/show/{id}', [ContactController::class, 'show'])->name('contact.show');
Route::put('/contact/update/{id}', [ContactController::class, 'update'])->name('contact.update');
Route::delete('/contact/delete/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');
