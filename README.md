# World Clock Laravel Nova Card

[![Latest Stable Version](https://poser.pugx.org/interaction-design-foundation/nova-worldclock-card/v/stable)](https://packagist.org/packages/interaction-design-foundation/nova-worldclock-card)
[![Total Downloads](https://poser.pugx.org/interaction-design-foundation/nova-worldclock-card/downloads)](https://packagist.org/packages/interaction-design-foundation/nova-worldclock-card)

A Laravel Nova card to display world clock.

![image](https://user-images.githubusercontent.com/5278175/69902036-267f7500-139a-11ea-834b-cd9f34f47b6f.png)


## Installation

You can install the package in to a Laravel app that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer require interaction-design-foundation/nova-worldclock-card
```


## Usage

[Register your new card](https://nova.laravel.com/docs/2.0/customization/cards.html#registering-cards).

```php
use InteractionDesignFoundation\WorldClockCard\WorldClock;

public function cards()
{
  return [
     (new WorldClock())
        ->timezones([
            'Asia/Tokyo',
            'Asia/Dubai',
            'America/New_York',
            'Europe/Kiev',
        ])
        ->timeFormat('h:i') // Optional, time format. Default is: 'h:i'
        ->updatePeriod(1000) // Optional, to set updating time period in millisecond.
        ->nightRange(22, 6) // Optional, to set range of night hours. Default is [19; 6).
        ->hideContinents() // Optional, hide continents from timezone-names.
        ->timezoneDescriptions([ // Optional, add text description to timezones.
            'Asia/Tokyo' => 'Yuto, Hana',
            'Asia/Dubai' => 'Alya, Omar, Ibrahim',
        ]),
  ];
}
```


### Changelog

Please see [Releases](https://github.com/InteractionDesignFoundation/nova-worldclock-card/releases) for more information on what has changed recently.


## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.


## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
