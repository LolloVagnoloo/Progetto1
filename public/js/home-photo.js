//Definisco un array di immagini
let photoArray = [
    'https://tweban.dii.univpm.it/~grp_53/laraProject/public/build/assets/fano.jpg',
    'https://tweban.dii.univpm.it/~grp_53/laraProject/public/build/assets/fano1.jpg',
    'https://tweban.dii.univpm.it/~grp_53/laraProject/public/build/assets/fano2.jpg',
    'https://tweban.dii.univpm.it/~grp_53/laraProject/public/build/assets/fano3.jpg',
    'https://tweban.dii.univpm.it/~grp_53/laraProject/public/build/assets/fano4.jpg'
    ]

//Seleziono l'item con tag banner e lo salvo nella let banner
let banner = document.querySelector('#banner')
let i = 0 //Indice scorrimento
setInterval(() => {
//Imposto src con URL dell'immagine corrente dell'array
banner.setAttribute('src',photoArray[i])
//Scorro le immagini con uno switch facendo ripartire il giro quando i=4
switch(true){
case i ==4 : i = 0; break;
case i < 4 : i++;break;
}

//4000ms di delay per lo scorrimento
}, 4000);
