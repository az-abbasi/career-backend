<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\AcademicRecordController;
use App\Http\Controllers\SkillAssessmentController;

// Public Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/careers', [CareerController::class, 'index']);
Route::get('/careers/{id}', [CareerController::class, 'show']);

// Protected Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::put('/profile', [AuthController::class, 'updateProfile']);

    // AI Recommendation
    Route::post('/ai-recommendation', [App\Http\Controllers\AIRecommendationController::class, 'recommend']);

    // Assessment
    Route::post('/assessment', [AssessmentController::class, 'store']);
    Route::get('/assessment', [AssessmentController::class, 'show']);

    // Academic Record
    Route::post('/academic-record', [AcademicRecordController::class, 'store']);
    Route::get('/academic-record', [AcademicRecordController::class, 'show']);

    // Skill Assessment
    Route::post('/skill-assessment', [SkillAssessmentController::class, 'store']);
    Route::get('/skill-assessment', [SkillAssessmentController::class, 'show']);

    // Feedback
    Route::post('/feedback', [App\Http\Controllers\FeedbackController::class, 'store']);
    Route::get('/feedback', [App\Http\Controllers\FeedbackController::class, 'index']);

    // Goals
Route::get('/goals', [App\Http\Controllers\GoalController::class, 'index']);
Route::post('/goals', [App\Http\Controllers\GoalController::class, 'store']);
Route::put('/goals/{id}', [App\Http\Controllers\GoalController::class, 'update']);
Route::delete('/goals/{id}', [App\Http\Controllers\GoalController::class, 'destroy']);
});

// Admin Routes
Route::middleware('auth:sanctum')->prefix('admin')->group(function () {
    Route::get('/students', [AuthController::class, 'getAllStudents']);
    Route::delete('/students/{id}', [AuthController::class, 'deleteStudent']);
    Route::get('/assessments', [AssessmentController::class, 'getAllAssessments']);
    Route::get('/academic-records', [AcademicRecordController::class, 'getAllRecords']);
    Route::post('/careers', [CareerController::class, 'store']);
    Route::put('/careers/{id}', [CareerController::class, 'update']);
    Route::delete('/careers/{id}', [CareerController::class, 'destroy']);
    Route::get('/feedback', [App\Http\Controllers\FeedbackController::class, 'index']);
});