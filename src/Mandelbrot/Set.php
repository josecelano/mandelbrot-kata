<?php

namespace Mandelbrot;

use ArbitraryPrecisionComplex\Complex;
use ArbitraryPrecisionComplex\DecimalFactory;

class Set {

    public static function contains(Complex $c, int $iterations = 200) {
        $z0 = new Complex(DecimalFactory::zero(), DecimalFactory::zero());
        $z = $z0;

        for ($i = 1; $i <= $iterations; $i++) {
            $f = Formula::calculate($z, $c);

            // DEBUG
            /*if ($c->getReal() == -1) {
                echo "Iter: " . $i . "\n";
                echo "c = " . $c->__toString() . "\n";
                echo "z = " . $z->__toString() . "\n";
                echo "f = " . $f->__toString() . "\n";
            }*/

            if (self::bailout($f)) {
                return false;
            }

            $z = $f;
        }

        return true;
    }

    public static function bailout(Complex $f): bool {
        return (($f->getReal()->abs()) > 2) || (($f->getImaginary()->abs()) > 2);
    }
}