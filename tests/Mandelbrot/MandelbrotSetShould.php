<?php

namespace Tests\Mandelbrot;

use Complex\Complex;
use Mandelbrot\Set;

class MandelbrotSetShould extends BaseTestClass {
    /** @test */
    public function not_include_complex_number_with_real_or_imaginary_part_greater_then_2() {
        $this->assertTrue(Set::bailout(new Complex('2.1')));
        $this->assertTrue(Set::bailout(new Complex('-2.1')));
        $this->assertTrue(Set::bailout(new Complex('2.1i')));
        $this->assertTrue(Set::bailout(new Complex('-2.1i')));
    }

    /**
     * @test
     * @dataProvider some_complex_number_that_belong_to_mandelbrot_set
     */
    public function contain_complex_numbers_that_do_not_diverge_when_iterated_from_z0_for_mandelbrot_sequence($c) {
        $this->assertTrue(Set::contains($c));
    }

    /**
     * @test
     * @dataProvider some_complex_number_that_do_not_belong_to_mandelbrot_set
     */
    public function not_contain_complex_numbers_that_diverge_when_iterated_from_z0_for_mandelbrot_sequence($c) {
        $this->assertFalse(Set::contains($c));
    }

    public function some_complex_number_that_belong_to_mandelbrot_set() {
        return [
            [new Complex('0')],
            [new Complex('-1')],
            [new Complex('-0.5')],
            [new Complex('-0.5+0.5i')],
            [new Complex('-0.5-0.5i')],
        ];
    }

    public function some_complex_number_that_do_not_belong_to_mandelbrot_set() {
        return [
            [new Complex('-2+2i')],
            [new Complex('2i')],
            [new Complex('2+2i')],
            [new Complex('2i')],
            [new Complex('-2i')],
            [new Complex('-2-2i')],
            [new Complex('-2')],
        ];
    }
}