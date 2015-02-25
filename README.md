# Laravel Baser

### Encode and decode integers with your own specified base!

## Requirements

 - Laravel
 - PHP

## Limits

 - Currently only supports integers between 0 and 100000000000000000000000000000 (on 64 bit machines - won'e be testing 32bit any time soon)

## Installation

 - composer.json - "elliottlan/laravel-baser": "dev-master"
 - Providers - 'Elliottlan\LaravelBaser\LaravelBaserServiceProvider'
 - Aliases - 'Baser' => 'Elliottlan\LaravelBaser\Facades\Baser',
 - ???
 - Profit.

## Usage examples

## Encode an int
```php
echo Baser::getTokenFromInt(436432278698); // 7GnTmBA
```

## Decode a token
```php
echo Baser::getIntFromToken('7GnTmBA'); // 436432278698
```

## Encode/Decode using bcmath (will increase maximum limit on 32bit machines)
```php
echo Baser::getTokenFromInt(323232, true); // 1m5q
echo Baser::getIntFromToken('1m5q', true); // 323232
```