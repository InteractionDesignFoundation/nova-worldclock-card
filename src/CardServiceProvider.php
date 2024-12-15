<?php declare(strict_types=1);

namespace InteractionDesignFoundation\WorldClockCard;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Nova;

/** @phpcsSuppress SlevomatCodingStandard.Classes.RequireAbstractOrFinal.ClassNeitherAbstractNorFinal */
class CardServiceProvider extends ServiceProvider
{
    /** Bootstrap any application services. */
    public function boot(): void
    {
        $this->app->booted(function () {
            $this->routes();
        });

        Nova::serving(static function (): void {
            Nova::script('worldclock-card', __DIR__.'/../dist/js/card.js');
        });
    }

    /** Register the card's routes. */
    protected function routes(): void
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Route::middleware(['nova:api'])
            ->prefix('nova-vendor/interaction-design-foundation/worldclock')
            ->group(__DIR__.'/../routes/api.php');
    }
}
