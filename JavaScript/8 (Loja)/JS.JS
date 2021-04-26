var circle = document.getElementById('circle');
var showTime = document.getElementById('time');
var timeStar = new Date().getTime();

showCircle();

function showCircle() {
    circle.style.display = 'block';
    circle.style.top = Math.random() * 100 + '%';
    circle.style.left = Math.random() * 100 + '%';
    circle.style.backgroundColor = randomColor();

    timeStar = new Date().getTime();

}

circle.onclick = function () {
    circle.style.display = 'none';

    var timeEnd = new Date().getTime();
    var time = (timeEnd - timeStar) / 1000;
    if (time <= 0.5) {
        alert('Urime ju keni Fituar');
    } else {
        setTimeout(showCircle, 1000);
    }

    showTime.innerHTML = time + 'Sekonda';

}

function randomColor() {
    {
        var s = '0123456789ABCDEF';
        var color = "#"
        for (var i = 0; i < 6; i++)
            color = color + s[Math.floor(Math.random() * 16)];
        console.log('Per i = ' + i + '- Color = ' + color);
    }
    return color;
}



// me ane te ni loop-e qe perseritet 6 here, pra per ti gjeneru 6 characteret qe po na vyjin nga stringu i karatereve te perziera numra dhe shkronja.  
// per qdo cikel shkojim tu e perzgjerdh ka ni karakter ne menyra random dhe tu ja shtu colorit 
// psh per i = 0; 
// color = "#3"; 
// per i = 1; 
// color = "#3G" 
// ..................... 
// per i = 5; 
// color = "#3GFF06"; color = color + s[Math.floor(Math.random()* 16)]; console.log('Per i = '+ i + '- Color = '+ color); } return color; }