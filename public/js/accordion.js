//Seleziono gli elementi con classe CSS accordion-item
const accordionItems = document.querySelectorAll('.accordion-item');

//Ciclo su ogni elemento
accordionItems.forEach(item => {
    //Seleziono in due costanti diverse gli elementi domanda e gli elementi risposta
  const header = item.querySelector('.accordion-header');
  const content = item.querySelector('.accordion-body');

  //Ascolto l'evento click
  header.addEventListener('click', () => {
    //Se il contenuto è visibile lo nasconde e viceversa
    if (content.style.display === 'block') {
      content.style.display = 'none';
    } else {
      content.style.display = 'block';
    }
  });
});
