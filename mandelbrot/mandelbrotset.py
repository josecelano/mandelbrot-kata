import cmath


class MandelbrotSet:

    def number_belongs_to_set(self, number):
        z = complex(0, 0)
        for _ in range(0, 200):
            z = z ** 2 + number
            if self.bailout(z):
                return False
        return True

    def bailout(self, z):
        return abs(z.real) > 2 or abs(z.imag) > 2
