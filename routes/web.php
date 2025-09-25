<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

        // Employee Management
        Route::get('/employees', App\Livewire\EmployeeIndex::class)->name('employees.index');
        Route::get('/employees/create', App\Livewire\EmployeeCreate::class)->name('employees.create');
        Route::post('/employees', [App\Http\Controllers\EmployeeController::class, 'store'])->name('employees.store');
        Route::get('/employees/{employee}', App\Livewire\EmployeeShow::class)->name('employees.show');
        Route::get('/employees/{employee}/edit', App\Livewire\EmployeeEdit::class)->name('employees.edit');

    // Department Management
    Route::get('/departments', App\Livewire\DepartmentIndex::class)->name('departments.index');
    Route::get('/departments/create', App\Livewire\DepartmentCreate::class)->name('departments.create');

    // Position Management
    Route::get('/positions', App\Livewire\PositionIndex::class)->name('positions.index');
    Route::get('/positions/create', App\Livewire\PositionCreate::class)->name('positions.create');

    // Settings
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});

require __DIR__.'/auth.php';
