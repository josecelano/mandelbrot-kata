<?php

namespace MandelBrot;

use Complex\Complex;

class Set {

    public static function contains(Complex $c, int $iterations = 200) {
        $z0 = new Complex('0');
        $z = $z0;

        for ($i = 1; $i <= $iterations; $i++) {
            $f = Formula::calculate($z, $c);

            if (self::bailout($f)) {
                return false;
            }

            $z = $f;
        }

        return true;
    }

    public static function bailout(Complex $f): bool {
        return (abs($f->getReal()) > 2) || (abs($f->getImaginary()) > 2);
    }
}