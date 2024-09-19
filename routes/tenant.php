<?php

declare(strict_types=1);

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HRController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {

    Route::get('/organizations', [OrganizationController::class, 'index'])->name('organizations.index');

    Route::get('/organizations/{id}', [OrganizationController::class, 'show'])->name('organizations.show');

    Route::post('/organizations', [OrganizationController::class, 'store'])->name('organizations.store');

    Route::put('/organizations/{id}', [OrganizationController::class, 'update'])->name('organizations.update');

    Route::delete('/organizations/{id}', [OrganizationController::class, 'destroy'])->name('organizations.destroy');



        Route::get('/hrs', [HRController::class, 'index'])->name('hrs.index');

        Route::get('/hrs/{id}', [HRController::class, 'show'])->name('hrs.show');

        Route::post('/hrs', [HRController::class, 'store'])->name('hrs.store');

        Route::put('/hrs/{id}', [HRController::class, 'update'])->name('hrs.update');

        Route::delete('/hrs/{id}', [HRController::class, 'destroy'])->name('hrs.destroy');

        Route::get('/organization/{organization_id}/hrs', [HRController::class, 'getAllHRsByOrganization'])
        ->name('hrs.by_organization');


        Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors.index');

        Route::get('/doctors/{id}', [DoctorController::class, 'show'])->name('doctors.show');

        Route::post('/doctors', [DoctorController::class, 'store'])->name('doctors.store');

        Route::put('/doctors/{id}', [DoctorController::class, 'update'])->name('doctors.update');


        Route::delete('/doctors/{id}', [DoctorController::class, 'destroy'])->name('doctors.destroy');

        Route::get('/organization/{organization_id}/doctors', [DoctorController::class, 'getAllDoctorsByOrganization'])
            ->name('doctors.by_organization');

        Route::get('/students', [StudentController::class, 'index'])->name('students.index');

        Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show');

        Route::post('/students', [StudentController::class, 'store'])->name('students.store');

        Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');

        Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');

        Route::get('/organization/{organizationId}/students', [StudentController::class, 'getAllStudentsByOrganization'])
        ->name('students.by_organization');


        Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');

        Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');

        Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');

        Route::put('/courses/{id}', [CourseController::class, 'update'])->name('courses.update');

        Route::put('/courses/{id}/status', [CourseController::class, 'updateStatus'])->name('courses.update_status');

        Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');

        Route::get('/action-course', [CourseController::class, 'getActionCourse'])->name('courses.action');

});
