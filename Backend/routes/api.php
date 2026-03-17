<!-- //routes/api.php -->
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
        AuthController,
        PatientController,
        DoctorController,
        AppointmentController,
        PrescriptionController,
        MedicalRecordController
        BillingController
};

// Public Routes (No Auth Required)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected Routes (Auth Required)
Route::middleware('auth:sanctum')->group(function () {
    // Patient Routes
    Route::apiResource('patients', PatientController::class);

    // Doctor Routes
    Route::apiResource('doctors', DoctorController::class);

    // Appointment Routes
    Route::apiResource('appointments', AppointmentController::class);

    // Prescription Routes
    Route::apiResource('prescriptions', PrescriptionController::class);

    // Medical Record Routes
    Route::apiResource('medical-records', MedicalRecordController::class);

    // Billing Routes
    Route::apiResource('billing', BillingController::class);

    // Logout Route
    Route::post('/logout', [AuthController::class, 'logout']);
});



