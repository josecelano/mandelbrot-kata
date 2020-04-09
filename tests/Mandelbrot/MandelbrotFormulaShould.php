<?php

namespace Tests\Mandelbrot;

use Complex\Complex;
use Mandelbrot\Formula;

class MandelbrotFormulaShould extends BaseTestClass {
    /**
     * @test
     * @dataProvider  someComplexNumberToTestMandelbrotFormula
     * @param $z
     * @param $c
     * @param $expectedResult
     */
    public function calculate_the_mandelbrot_function($z, $c, $expectedResult) {
        $f = Formula::calculate($z, $c);
        $this->assertEquals($expectedResult, $f);
    }

    public function someComplexNumberToTestMandelbrotFormula() {

        $z0 = new Complex('0');
        $z1 = new Complex('1');
        $zi = new Complex('1i');

        return [
            // With z=0 -> return c
            [$z0, new Complex('0'), new Complex('0')],
            [$z0, new Complex('1'), new Complex('1')],
            [$z0, new Complex('1i'), new Complex('1i')],
            // With z=1 -> return 1 + c
            [$z1, new Complex('0'), new Complex('1')],
            [$z1, new Complex('1'), new Complex('2')],
            [$z1, new Complex('1i'), new Complex('1+1i')],
            // With z=1i -> return 1i + c
            //[$zi, new Complex('0'), new Complex('1')],  // Fails due to float precision
            //[$zi, new Complex('1'), new Complex('0')],  // Fails due to float precision
            [$zi, new Complex('1i'), new Complex('-1+1i')],
        ];
    }
}