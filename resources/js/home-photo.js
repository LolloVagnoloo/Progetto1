let photoArray = [
    'http://127.0.0.1:8000/build/assets/fano.jpg',
    'http://127.0.0.1:8000/build/assets/fano1.jpg',
    'http://127.0.0.1:8000/build/assets/fano2.jpeg',
    'http://127.0.0.1:8000/build/assets/fano3.jpeg',
    'http://127.0.0.1:8000/build/assets/fano4.jpeg'
    ]

let banner = document.querySelector('#banner')
let i = 0
setInterval(() => {

banner.setAttribute('src',photoArray[i])

switch(true){
case i ==4 : i = 0; break;
case i < 4 : i++;break;
}


}, 4000);
