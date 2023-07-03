<?php declare(strict_types=1);

namespace InteractionDesignFoundation\WorldClockCard\Tests;

use Illuminate\Support\Facades\Route;
use InteractionDesignFoundation\WorldClockCard\CardServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

abstract class TestCase extends OrchestraTestCase
{
    /** @inheritDoc */
    public function setUp(): void
    {
        parent::setUp();

        Route::middlewareGroup('nova', []);
        Route::middlewareGroup('nova:api', []);
    }

    /** @inheritDoc */
    protected function getPackageProviders($app)
    {
        return [
            CardServiceProvider::class,
        ];
    }
}
