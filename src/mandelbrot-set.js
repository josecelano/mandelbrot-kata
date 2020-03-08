const Complex = require('Complex')

function mandelbrotSet() {

    function numberBelongsToSet(number) {
        let z = new Complex(0,0)

        for (var i = 0; i < 200; i++) {
            z = z.pow(2).add(number);
            if (bailoutReached(z)) return false;
        }

        return true;
    }

    function bailoutReached(z){
        return Math.abs(z.real) > 2 || Math.abs(z.im) > 2
    } 

    return {
        numberBelongsToSet
    } 
}

module.exports = mandelbrotSet();