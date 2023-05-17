<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\ClientController;

Route::get('/', [DomainController::class, 'index']);

Route::get('/domains/create', [DomainController::class, 'create'])->name('domains.create');
Route::post('/domains', [DomainController::class, 'store'])->name('domains.store');
Route::get('/domains', [DomainController::class, 'index'])->name('domains.index');
Route::get('/domains/{id}/edit', [DomainController::class, 'edit'])->name('domains.edit');
Route::put('/domains/{id}', [DomainController::class, 'update'])->name('domains.update');
Route::delete('/domains/{domain}', [DomainController::class, 'destroy'])->name('domains.destroy');

Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
Route::get('/clients/{id}/edit', [ClientController::class, 'edit'])->name('clients.edit');
Route::put('/clients/{id}', [ClientController::class, 'update'])->name('clients.update');
Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');