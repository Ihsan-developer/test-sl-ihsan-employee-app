<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Contracts\RegisterResponse;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::twoFactorChallengeView(fn () => view('livewire.auth.two-factor-challenge'));
        Fortify::confirmPasswordView(fn () => view('livewire.auth.confirm-password'));

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        // Customize login redirect based on user role
        $this->app->singleton(LoginResponse::class, function () {
            return new class implements LoginResponse {
                public function toResponse($request)
                {
                    $user = auth()->user();

                    // Redirect based on user role
                    if ($user->isAdmin()) {
                        return redirect()->intended('/dashboard');
                    }

                    if ($user->isEmployee()) {
                        return redirect()->intended('/employee/dashboard');
                    }

                    // Default fallback
                    return redirect()->intended('/dashboard');
                }
            };
        });

        // Customize register redirect based on user role
        $this->app->singleton(RegisterResponse::class, function () {
            return new class implements RegisterResponse {
                public function toResponse($request)
                {
                    $user = auth()->user();

                    // After registration, users default to employee role
                    if ($user->isEmployee()) {
                        return redirect('/employee/dashboard');
                    }

                    return redirect('/dashboard');
                }
            };
        });
    }
}
