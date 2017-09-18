<?php

namespace Elliottlan\LaravelBaser;

class Baser
{
    // set default codeset
    protected $codeset = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    // enabled bcmath functions
    protected $bcmath = false;

    // set a codeset - e.g 'ABCEFGHKMNPRSTUVW1235789'
    public function setCodeset($codeset)
    {
        $this->codeset = $codeset;

        return $this;
    }

    // enable bcmath
    public function bcMath()
    {
        $this->bcmath = true;

        return $this;
    }

    // create a unique string for any whole number
    public function getTokenFromInt($n = false)
    {
        $codeset = $this->codeset;
        $base = strlen($codeset);
        $converted = '';
        if (!$this->bcmath) {
            while ($n > 0) {
                $converted = substr($codeset, ($n % $base), 1).$converted;
                $n = floor($n / $base);
            }
        } elseif (self::bcmathInstalled()) {
            while ($n > 0) {
                $converted = substr($codeset, bcmod($n, $base), 1).$converted;
                $n = self::bcFloor(bcdiv($n, $base));
            }
        }

        return $converted;
    }

    public function getIntFromToken($code = false)
    {
        $codeset = $this->codeset;
        $base = strlen($codeset);
        if (!$this->bcmath) {
            $c = 0;
            for ($i = strlen($code); $i; --$i) {
                $c += strpos($codeset, substr($code, (-1 * ($i - strlen($code))), 1)) * pow($base, $i - 1);
            }

            return $c;
        } elseif (self::bcmathInstalled()) {
            $c = '0';
            for ($i = strlen($code); $i; --$i) {
                $c = bcadd($c, bcmul(strpos($codeset, substr($code, (-1 * ($i - strlen($code))), 1)), bcpow($base, $i - 1)));
            }

            return bcmul($c, 1, 0);
        }
    }

    // check if php-bcmath is installed - otherwise die
    private static function bcmathInstalled()
    {
        return function_exists('bcadd') ? true : die('bcmath is not installed');
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
