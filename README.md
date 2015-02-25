## Laravel Baser

### Encode and decode integers with your own specified base!

#### Requirements

 - Laravel
 - PHP

#### Limits

 - Currently only supports integers between 0 and 100000000000000000000000000000 (on 64 bit machines - won'e be testing 32bit any time soon)

#### Installation

 - composer.json - "elliottlan/laravel-baser": "dev-master"
 - Providers - 'Elliottlan\LaravelBaser\LaravelBaserServiceProvider'
 - Aliases - 'Baser' => 'Elliottlan\LaravelBaser\Facades\Baser',
 - ???
 - Profit.

#### Usage examples

##### Encode an int
```php
echo Baser::getTokenFromInt(436432278698); // 7GnTmBA
```

##### Decode a token
```php
echo Baser::getIntFromToken('7GnTmBA'); // 436432278698
```

##### Use php-bcmath
```php
Baser::bcMath();
echo Baser::getTokenFromInt('19598531548'); // lolrly
echo Baser::getIntFromToken('lolrly'); // 19598531548
```

##### Define a codeset and encode/decode
```php
Baser::setCodeset('ABCEFGHKMNPRSTUVW1235789'); // set codeset to 'ABCEFGHKMNPRSTUVW1235789'
echo Baser::getTokenFromInt(646464); // B82MA
echo Baser::getIntFromToken('1m5q', true); // 646464
```

##### Simple URL Shortening service using this package
[Controller](https://github.com/ElliottLandsborough/Laravel-5-URL-Shorterner/blob/master/app/Http/Controllers/UrlController.php)
[Model](https://github.com/ElliottLandsborough/Laravel-5-URL-Shorterner/blob/master/app/Url.php)
[Migration](https://github.com/ElliottLandsborough/Laravel-5-URL-Shorterner/blob/master/database/migrations/2015_02_13_221304_create_url_table.php)
