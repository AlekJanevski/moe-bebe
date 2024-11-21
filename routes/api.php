<?php
use App\Http\Controllers\PatientBabyController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->get('/dashboard/baby-details', [PatientBabyController::class, 'getBabyDetails']);
