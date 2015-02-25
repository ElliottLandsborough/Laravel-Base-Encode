<?php

namespace Elliottlan\LaravelBaser;

class Baser
{
    // set default codeset
    private static $codeset = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

    // enabled bcmath functions
    private static $bcmath = false;

    // set a codeset - e.g 'ABCEFGHKMNPRSTUVW1235789'
    public static function setCodeset($codeset)
    {
        self::$codeset = $codeset;
    }

    // enable bcmath
    public static function bcMAth()
    {
        self::$bcmath = true;
    }

    // create a unique string for any whole number
    public static function getTokenFromInt($n = false)
    {
        $codeset = self::$codeset;
        $base = strlen($codeset);
        $converted = '';
        if (!self::$bcmath) {
            while ($n > 0) {
                $converted = substr($codeset, ($n % $base), 1) . $converted;
                $n = floor($n/$base);
            }
        } else {
            while ($n > 0) {
                $converted = substr($codeset, bcmod($n, $base), 1) . $converted;
                $n = self::bcFloor(bcdiv($n, $base));
            }
        }
        return $converted;
    }

    public static function getIntFromToken($code = false)
    {
        $codeset = self::$codeset;
        $base = strlen($codeset);
        if (!self::$bcmath) {
            $c = 0;
            for ($i = strlen($code); $i; $i--) {
                $c += strpos($codeset, substr($code, (-1 * ( $i - strlen($code) )), 1)) * pow($base, $i-1);
            }
            return $c;
        } else {
            $c = '0';
            for ($i = strlen($code); $i; $i--) {
                $c = bcadd($c, bcmul(strpos($codeset, substr($code, (-1 * ( $i - strlen($code) )), 1)), bcpow($base, $i-1)));
            }
            return bcmul($c, 1, 0);
        }
    }

    // floor using bcmath
    private static function bcFloor($x)
    {
        return bcmul($x, '1', 0);
    }

    // ceil using bcmath
    private static function bcCeil($x)
    {
        $floor = bcFloor($x);
        return bcadd($floor, ceil(bcsub($x, $floor)));
    }

    // round using bcmath
    private static function bcRound($x)
    {
        $floor = bcFloor($x);
        return bcadd($floor, round(bcsub($x, $floor)));
    }
}
