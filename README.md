# Laravel Baser

### Base encode and decode integers with your own specified base

[View the package](https://packagist.org/packages/elliottlan/laravel-baser) at packagist.org

#### Requirements

 - Laravel
 - PHP

#### Limits

 - Currently only supports integers from 1 to 100000000000000000000000000000 (on 64 bit machines)

#### Installation
1. Include the composer package
```
composer require elliottlan/laravel-baser
```
2. Add this line to 'Providers' in config/app.php
```
Elliottlan\LaravelBaser\LaravelBaserServiceProvider::class,
```
3. Add this line to 'Aliases' in config/app.php
```
'Baser' => Elliottlan\LaravelBaser\Facades\Baser::class,
```
4. Use 'Base' at the top of a controller
```
use Baser;
```
5. Try an example out
```
echo Baser::getTokenFromInt(436432278698); // 7GnTmBA
```

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
// calculate above the 32bit limit on old machines
echo Baser::bcMath()->getTokenFromInt(19598531548); // lolrly
echo Baser::bcMath()->getIntFromToken('lolrly'); // 19598531548
```

##### Define a codeset and encode/decode
```php
// set codeset to 'ABCEFGHKMNPRSTUVW1235789'
echo Baser::setCodeset('ABCEFGHKMNPRSTUVW1235789')->getTokenFromInt(646464); // B82MA
echo Baser::setCodeset('ABCEFGHKMNPRSTUVW1235789')->getIntFromToken('B82MA'); // 646464
```

##### Everything
```php
echo Baser::setCodeset('ABC')->bcMath()->getTokenFromInt(1337);
```

##### Simple URL Shortening service using this package
[Controller](https://github.com/ElliottLandsborough/Laravel-5-URL-Shorterner/blob/master/app/Http/Controllers/UrlController.php)
[Model](https://github.com/ElliottLandsborough/Laravel-5-URL-Shorterner/blob/master/app/Url.php)
[Migration](https://github.com/ElliottLandsborough/Laravel-5-URL-Shorterner/blob/master/database/migrations/2015_02_13_221304_create_url_table.php)
