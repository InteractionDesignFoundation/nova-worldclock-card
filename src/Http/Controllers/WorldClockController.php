<?php declare(strict_types=1);

namespace IDF\WorldClockCard\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class WorldClockController
{
    public function timezones(Request $request)
    {
        $timeFormat = $request->get('timeFormat', 'h:i:s');

        $nightStart = (int) $request->get('nightStart');
        $nightEnd = (int) $request->get('nightEnd');
        $hideContinents = $request->json('hideContinents') === true;

        $times = [];
        foreach ($request->get('timezones', []) as $timezone) {
            $time = now($timezone);
            $night = $this->isNight($time, $nightStart, $nightEnd);
            $times[] = [
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
            $prettifiedTimezoneParts = explode('/', $timezone);
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
