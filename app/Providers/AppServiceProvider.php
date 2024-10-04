<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        //
        $base_path = parse_url(url('/'), PHP_URL_PATH);
        if (! empty($base_path)) {
            Livewire::setScriptRoute(function ($handle) use ($base_path) {
                return Route::get($base_path.'/livewire/livewire.js', $handle);
            });
            Livewire::setUpdateRoute(function ($handle) use ($base_path) {
                return Route::post($base_path.'/livewire/update', $handle)->middleware(['web'])->name('custom.');
            });
        }
    }
}
