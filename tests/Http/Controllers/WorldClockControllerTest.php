<?php declare(strict_types=1);

namespace InteractionDesignFoundation\WorldClockCard\Tests\Http\Controllers;

use InteractionDesignFoundation\WorldClockCard\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

final class WorldClockControllerTest extends TestCase
{
    #[Test]
    public function it_can_return_a_response(): void
    {
        $response = $this->post('nova-vendor/interaction-design-foundation/worldclock/timezones', [
            'timeFormat' => 'H:i',
            'nightHours' => [19, 6],
            'timezones' => ['Africa/Johannesburg', 'Asia/Singapore'],
        ]);

        $response->assertSuccessful();
    }

    #[Test]
    public function it_accepts_empty_array_of_timezones(): void
    {
        $response = $this->post('nova-vendor/interaction-design-foundation/worldclock/timezones', [
            'timeFormat' => 'H:i',
            'nightHours' => [19, 6],
            'timezones' => [],
        ]);

        $response->assertSuccessful();
    }
}
