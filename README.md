## Laravel Baser

### Encode and decode integers with your own specified base!

[View the package](https://packagist.org/packages/elliottlan/laravel-baser) at packagist.org

#### Requirements

 - Laravel
 - PHP

#### Limits

 - Currently only supports integers from 1 to 100000000000000000000000000000 (on 64 bit machines)

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

##### Use big maths (requires php-bcmath)
```php
Baser::bcMath(); // calculate above the 32bit limit on old machines
echo Baser::getTokenFromInt('19598531548'); // lolrly
echo Baser::getIntFromToken('lolrly'); // 19598531548
```

##### Define a codeset and encode/decode
```php
Baser::setCodeset('ABCEFGHKMNPRSTUVW1235789'); // set codeset to 'ABCEFGHKMNPRSTUVW1235789'
echo Baser::getTokenFromInt(646464); // B82MA
echo Baser::getIntFromToken('B82MA'); // 646464
```

##### Simple URL Shortening service using this package
[Controller](https://github.com/ElliottLandsborough/Laravel-5-URL-Shorterner/blob/master/app/Http/Controllers/UrlController.php)
[Model](https://github.com/ElliottLandsborough/Laravel-5-URL-Shorterner/blob/master/app/Url.php)
[Migration](https://github.com/ElliottLandsborough/Laravel-5-URL-Shorterner/blob/master/database/migrations/2015_02_13_221304_create_url_table.php)
