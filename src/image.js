const Jimp = require('jimp');

function image() {

    let resolution
    let pngImage

    function create(res) {
        resolution = res
        pngImage = new Jimp(resolution, resolution)
        return this
    }

    function setPixelColor(color, x, y) {
        pngImage.setPixelColor(color, x, y)
        return this
    }

    function save(filePath) {
        pngImage.write(filePath)
        return this
    }  
    
    function fillBackgroundWith(color) {
        for(x = 0 ; x < resolution ; x++) {
            for(y = 0 ; y < resolution ; y++) {
                pngImage.setPixelColor(color, x, y);
            }
        }
        return this
    } 

    return {
        create,
        setPixelColor,
        save,
        fillBackgroundWith
    } 
}

module.exports = image();