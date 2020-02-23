<?php

namespace Tests\Mandelbrot;

use MandelBrot\Image;

class MandelbrotImageShould extends BaseTestClass {
    /** @test
     * @throws \Exception
     */
    public function generate_a_mandelbrot_image_with_same_width_and_height() {
        $resolution = 160;
        $image = new Image($resolution);

        $fileDir = __DIR__;
        $fileName = "/mandelbrot-{$resolution}x{$resolution}.png";
        $filePath = __DIR__ . $fileName;

        if (is_file($filePath)) {
            unlink($filePath);
        }

        $image->save($filePath);

        $this->assertFileExists($filePath);
    }
}