# World Clock

[![Latest Stable Version](https://poser.pugx.org/idf/nova-worldclock-card/v/stable)](https://packagist.org/packages/idf/nova-worldclock-card)
[![Total Downloads](https://poser.pugx.org/idf/nova-worldclock-card/downloads)](https://packagist.org/packages/idf/nova-worldclock-card)

A Laravel Nova card to display world clock.

![image](https://user-images.githubusercontent.com/5278175/69892922-dc57ae80-131b-11ea-8345-6d0b816afb8e.png)

## Installation

You can install the package in to a Laravel app that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer require idf/nova-worldclock-card
```

## Usage

[Register your new card](https://nova.laravel.com/docs/2.0/customization/cards.html#registering-cards).

```php
public function cards()
{
  return [
     (new WorldClock())
        ->timezones([
            'Asia/Tokyo',
            'Asia/Dubai',
            'America/New_York',
            'America/Los_Angeles',
        ])
        ->timeFormat('h:i') // Optional, time format. Default is: 'h:i:s'
        ->updatePeriod(1000) // Optional, to set updating time period in millisecond. Default is 1000 ms (1sec)
        ->nightRange(22, 6) // Optional, to set range of night hours. Default is [19; 6).
        ->hideContinents() // Optional, hide continents from timezone-names.
  ];
}
```

### Changelog

Please see [Releases](https://github.com/InteractionDesignFoundation/nova-worldclock-card/releases) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Compiling Assets

```bash
# Compile and minify your assets:
npm run prod

# Compile your assets for local development:
npm run dev

# Run the NPM "watch" command to auto-compile your assets when they are changed:
npm run watch
```

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
