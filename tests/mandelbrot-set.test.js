const mandelbrotSet = require('../src/mandelbrot-set.js')
const Complex = require('Complex')

test('0 belongs to Mandelbrot Set', () => {
    const z = new Complex(0,0)
    expect(mandelbrotSet.numberBelongsToSet(z)).toBe(true);
});