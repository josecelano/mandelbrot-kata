from PIL import Image as BaseImage


class Image:
    def __init__(self, resolution):
        self.img = BaseImage.new("RGB", (resolution, resolution), color="white")

    def set_pixel_color(self, x, y, color=(255, 255, 255)):
        self.img.putpixel((x, y), color)

    def save(self, file_path):
        self.img.save(file_path)
