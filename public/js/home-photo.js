let photoArray = [
    'https://tweban.dii.univpm.it/~grp_53/laraProject/public/build/assets/fano.jpg',
    'https://tweban.dii.univpm.it/~grp_53/laraProject/public/build/assets/fano1.jpg',
    'https://tweban.dii.univpm.it/~grp_53/laraProject/public/build/assets/fano2.jpg',
    'https://tweban.dii.univpm.it/~grp_53/laraProject/public/build/assets/fano3.jpg',
    'https://tweban.dii.univpm.it/~grp_53/laraProject/public/build/assets/fano4.jpg'
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
