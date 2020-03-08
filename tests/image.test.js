const image = require('../src/image')

test('it generates a 160x160 pixels', () => {
    const white = 0xFFFFFFFF
    const black = 0x00000000

    const pnpImage = image.create(160)
        .fillBackgroundWith(white)
        .setPixelColor(black, 0, 0)
        .save('./tests/output/mandelbrot-160x160.png')
});