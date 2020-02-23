<?php

namespace Tests\Mandelbrot;

use Complex\Complex;
use MandelBrot\Fractal;

class MandelbrotFractalShould extends BaseTestClass {
    /** @test */
    public function have_a_resolution() {
        $fractal = new Fractal(100);
        $this->assertEquals(100, $fractal->getResolution());
    }

    /** @test */
    public function have_a_resolution_greater_than_0() {
        $this->expectException('DomainException');
        new Fractal(-1);
    }

    /** @test */
    public function calculate_the_complex_number_which_represents_a_pixel_in_the_graph_for_resolution_1() {
        $fractal = new Fractal(1);

        // Complex number is the top left corner of the pixel
        $c = $fractal->calculateComplexNumberForPixel(0, 0);

        $this->assertEquals(new Complex('-2+2i'), $c);
    }

    /** @test */
    public function calculate_the_complex_number_which_represents_a_pixel_in_the_graph_for_resolution_2() {
        $fractal = new Fractal(2);

        $px00 = $fractal->calculateComplexNumberForPixel(0, 0);
        $px01 = $fractal->calculateComplexNumberForPixel(0, 1);
        $px10 = $fractal->calculateComplexNumberForPixel(1, 0);
        $px11 = $fractal->calculateComplexNumberForPixel(1, 1);

        $pixels = [
            [$px00, $px01],
            [$px10, $px11],
        ];

        $expectedPixels = [
            [new Complex('-2+2i'), new Complex('2i')],
            [new Complex('-2'), new Complex('0')],
        ];

        $this->assertEquals($expectedPixels, $pixels);
    }

    /** @test */
    public function calculate_the_complex_number_which_represents_a_pixel_in_the_graph_for_resolution_4() {
        $resolution = 4;

        $fractal = new Fractal($resolution);

        $complexForPixel = [];
        for ($row = 0; $row < $resolution; $row++) {
            for ($column = 0; $column < $resolution; $column++) {
                $complexForPixel[$row][$column] = $fractal->calculateComplexNumberForPixel($row, $column);
            }
        }

        $expectedComplexForPixel = [
            [new Complex('-2+2i'), new Complex('-1+2i'), new Complex('0+2i'), new Complex('1+2i')],
            [new Complex('-2+1i'), new Complex('-1+1i'), new Complex('0+1i'), new Complex('1+1i')],
            [new Complex('-2'), new Complex('-1'), new Complex('0'), new Complex('1')],
            [new Complex('-2-1i'), new Complex('-1-1i'), new Complex('0-1i'), new Complex('1-1i')],
        ];

        $this->assertEquals($expectedComplexForPixel, $complexForPixel);
    }
}