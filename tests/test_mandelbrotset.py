import unittest

from mandelbrot.mandelbrotset import MandelbrotSet


class ImageTest(unittest.TestCase):

    def test_0_belongs_to_mandelbrot_set(self):
        z = complex(0, 0)
        mandelbrot_set = MandelbrotSet()
        self.assertTrue(mandelbrot_set.number_belongs_to_set(z))

    def test_2_2i_does_not_belong_to_mandelbrot_set(self):
        z = complex(2, 2)
        mandelbrot_set = MandelbrotSet()
        self.assertFalse(mandelbrot_set.number_belongs_to_set(z))
