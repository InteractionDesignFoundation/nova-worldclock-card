<?php declare(strict_types=1);

namespace InteractionDesignFoundation\WorldClockCard\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class WorldClockController
{
    public function timezones(Request $request)
    {
        $timeFormat = $request->get('timeFormat', 'h:i:s');

        $nightHours = $request->get('nightHours');
        $hideContinents = $request->json('hideContinents') === true;

        $times = [];
        foreach ($request->get('timezones', []) as $timezone) {
            $time = now($timezone);
            $night = $this->isNight($time, (int) $nightHours[0], (int) $nightHours[1]);
            $times[$timezone] = [
                'name' => $this->prettifyTimezoneName($time->getTimezone()->getName(), $hideContinents),
                'time' => $time->format($timeFormat),
                'night' => $night,
            ];
        }

        return $times;
    }

    private function prettifyTimezoneName(string $timezone, bool $hideContinents): string
    {
        $prettifiedTimezone = ucwords(str_replace('_', ' ', $timezone));
        if ($hideContinents) {
            $prettifiedTimezoneParts = explode('/', $prettifiedTimezone);
            $prettifiedTimezone = end($prettifiedTimezoneParts);
        }

        return $prettifiedTimezone;
    }

    private function isNight(Carbon $dateTime, int $nightStart, int $nightEnd): bool
    {
        $currentHour = $dateTime->hour;

        return $currentHour >= $nightStart || $currentHour < $nightEnd;
    }
}
