import unittest
import os

from mandelbrot.image import Image


class ImageTest(unittest.TestCase):

    def test_image_instantiation(self):
        image = Image(160)
        self.assertIsInstance(image, Image)

    def test_generate_160_pixels_image(self):
        black = (0, 0, 0)
        file_path = 'tests/output/mandelbrot-160x160.png'

        image = Image(160)
        image.set_pixel_color(0, 0, black)
        image.save(file_path)
        self.assertTrue(os.path.isfile(file_path))
