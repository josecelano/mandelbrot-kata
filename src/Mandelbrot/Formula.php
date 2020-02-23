<?php

namespace MandelBrot;

use Complex\Complex;

class Formula {
    public static function calculate(Complex $z, Complex $c) {
        return $z->pow(2)->add($c);
    }
}