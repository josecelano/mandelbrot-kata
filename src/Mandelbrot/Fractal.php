<?php

namespace Mandelbrot;

use Complex\Complex;

class Fractal {

    /** @var integer */
    private $resolution;

    /**
     * MandelbrotImage constructor.
     * @param int $resolution
     */
    public function __construct(int $resolution) {
        if ($resolution < 1) {
            throw new \DomainException('Invalid image resolution. It should be greater than 0');
        }
        $this->resolution = $resolution;
    }

    /**
     * We are using the left top corner of a pixel as the complex number point.
     *
     * @param int $row
     * @param int $column
     * @return Complex
     */
    public function calculateComplexNumberForPixel(int $row, int $column): Complex {
        $this->validatePixelPosition($row, $column);

        // 2 is the Mandelbrot graph limit in real and imaginary parts
        $realPart = ((2 / ($this->resolution / 2)) * $column) - 2;
        $imaginaryPart = 2 - ((2 / ($this->resolution / 2)) * $row);

        return $this->crateComplex($imaginaryPart, $realPart);
    }

    public function pixelBelongsToMandelbrotSet(int $row, int $column) {
        $c = $this->calculateComplexNumberForPixel($row, $column);
        return Set::contains($c);
    }

    /**
     * @return int
     */
    public function getResolution(): int {
        return $this->resolution;
    }

    /**
     * @param int $x
     * @param int $y
     */
    private function validatePixelPosition(int $x, int $y) {
        if ($x < 0) {
            throw new \DomainException('Invalid negative x position');
        }

        if ($y < 0) {
            throw new \DomainException('Invalid negative y position');
        }

        if ($x > $this->resolution - 1) {
            throw new \DomainException('Invalid x position for current resolution');
        }

        if ($y > $this->resolution - 1) {
            throw new \DomainException('Invalid y position for current resolution');
        }
    }

    /**
     * This method is needed due to this strange Complex class behavior:
     * https://github.com/MarkBaker/PHPComplex/issues/11
     *
     * @param $imaginaryPart
     * @param $realPart
     * @return Complex
     */
    private function crateComplex($imaginaryPart, $realPart): Complex {
        if ($imaginaryPart == 0) {
            $c = new Complex($realPart);
        } else {
            $c = new Complex($realPart, $imaginaryPart);
        }
        return $c;
    }
}