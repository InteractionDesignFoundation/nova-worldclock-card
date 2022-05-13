<?php declare(strict_types=1);

namespace InteractionDesignFoundation\WorldClockCard;
use Laravel\Nova\Card;

class WorldClock extends Card
{
    /**
     * The width of the card (1/3, 1/2, or full).
     * @var string
     */
    public $width = '1/3';

    /**
     * Create a new element.
     * @param string|null $component
     * @return void
     */
    public function __construct($component = null)
    {
        parent::__construct($component);

        $this->withMeta([
            'timezoneDescriptions' => [],
            'nightHours' => [19, 6],
            'refreshRoute' => route('nova.cards.worldClock.refresh'),
            'timeFormat' => 'h:i',
        ]);
    }

    /** @inheritDoc */
    public function component()
    {
        return 'worldclock-card';
    }

    /**
     * @param list<string> $timezones
     * @return $this
     */
    public function timezones(array $timezones): static
    {
        return $this->withMeta([
            'timezones' => $timezones,
        ]);
    }

    /**
     * @param string $timeFormat Time, compatible with date() function, {@see https://www.php.net/manual/en/function.date.php}
     * @return $this
     */
    public function timeFormat(string $timeFormat): static
    {
        return $this->withMeta([
            'timeFormat' => $timeFormat,
        ]);
    }

    /**
     * Specify hours range: when a night starts and ends
     * @param int $nightStart
     * @param int $nightEnd
     * @return $this
     */
    public function nightRange(int $nightStart, int $nightEnd): static
    {
        return $this->withMeta([
            'nightHours' => [$nightStart, $nightEnd],
        ]);
    }

    /**
     * Hide continent from timezone name: Asia/Dubai => Dubai
     * @param bool $hideContinents
     * @return $this
     */
    public function hideContinents(bool $hideContinents = true): static
    {
        return $this->withMeta([
            'hideContinents' => $hideContinents,
        ]);
    }

    /**
     * How often to fetch new data from server.
     * Use carefully: it produces an API request once per interval.
     */
    public function updatePeriod(int $ms): static
    {
        return $this->withMeta([
            'ms' => $ms,
        ]);
    }

    /**
     * Add text description to timezones. Format: ['tzName' => 'Text description']
     * @param array<string, string> $descriptions
     * @return $this
     */
    public function timezoneDescriptions(array $descriptions): static
    {
        return $this->withMeta([
            'timezoneDescriptions' => $descriptions,
        ]);
    }
}
