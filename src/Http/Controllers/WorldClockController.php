<?php declare(strict_types=1);

namespace InteractionDesignFoundation\WorldClockCard\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class WorldClockController
{
    /** @return array{string, array{name: string, time: string, night: bool}} */
    public function timezones(Request $request): array
    {
        $request->validate([
            'timeFormat' => ['required'],
            'nightHours' => ['required'],
            'timezones' => ['array'],
        ]);

        $timeFormat = $request->input('timeFormat', 'h:i:s');

        $nightHours = $request->input('nightHours');
        $hideContinents = $request->json('hideContinents') === true;

        $times = [];
        foreach ($request->input('timezones', []) as $timezone) {
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
