<?php declare(strict_types=1);

use InteractionDesignFoundation\WorldClockCard\Http\Controllers\WorldClockController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Card API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your card. These routes
| are loaded by the ServiceProvider of your card. You're free to add
| as many additional routes to this file as your card may require.
|
*/

Route::post('/timezones', [WorldClockController::class, 'timezones'])->name('nova.cards.worldClock.refresh');
