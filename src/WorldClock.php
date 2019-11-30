<?php declare(strict_types=1);

namespace IDF\WorldClockCard;

use Illuminate\Support\Carbon;
use Laravel\Nova\Card;

class WorldClock extends Card
{
    /**
     * The width of the card (1/3, 1/2, or full).
     *
     * @var string
     */
    public $width = '1/3';

    /**
     * Create a new element.
     *
     * @param string|null $component
     * @return void
     */
    public function __construct($component = null)
    {
        parent::__construct($component);

        $this->withMeta([
            'timezoneDescriptions' => [],
            'nightHours' => [19, 6],
        ]);
    }

    /**
     * Get the component name for the element.
     *
     * @return string
     */
    public function component()
    {
        return 'worldclock';
    }

    /**
     * @param array $timezones
     * @return $this
     */
    public function timezones(array $timezones)
    {
        return $this->withMeta([
            'timezones' => $timezones,
        ]);
    }

    /**
     * @see https://www.php.net/manual/en/function.date.php
     *
     * @param string $timeFormat
     * @return $this
     */
    public function timeFormat(string $timeFormat)
    {
        return $this->withMeta([
            'timeFormat' => $timeFormat,
        ]);
    }

    /**
     * Specify hours range: when a night starts and ends
     *
     * @param int $nightStart
     * @param int $nightEnd
     * @return $this
     */
    public function nightRange(int $nightStart, int $nightEnd)
    {
        return $this->withMeta([
            'nightHours' => [$nightStart, $nightEnd],
        ]);
    }

    /**
     * Hide continent from timezone name: Asia/Dubai => Dubai
     *
     * @param bool $hideContinents
     * @return $this
     */
    public function hideContinents(bool $hideContinents = true)
    {
        return $this->withMeta([
            'hideContinents' => $hideContinents,
        ]);
    }

    /**
     * How often to fetch new data from server
     *
     * @param int $ms
     * @return $this
     */
    public function updatePeriod(int $ms = 1000)
    {
        return $this->withMeta([
            'ms' => $ms,
        ]);
    }

    /**
     * Add text description to timezones. Format: ['tzName' => 'Text description']
     *
     * @param array $descriptions
     * @return $this
     */
    public function timezoneDescriptions(array $descriptions)
    {
        return $this->withMeta([
            'timezoneDescriptions' => $descriptions,
        ]);
    }
}
