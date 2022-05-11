if (localStorage.getItem('visita') == null){
   localStorage.setItem('visita', 1);
}

let valorStorage = localStorage.getItem('visita');


document.body.addEventListener('click', (e) => {
  if (e.target.classList.contains('upper-canvas') && valorStorage == 1 && document.querySelector('.fpd-show')){
    const tercerHijo = document.querySelector('.fpd-show:nth-child(3)');
    if (tercerHijo.scrollWidth > tercerHijo.clientWidth){
      jQuery('.fpd-scroll-area').animate({scrollLeft: '500' }, 1000);
      jQuery('.fpd-scroll-area').animate({scrollLeft: '0' }, 1000);
      localStorage.setItem('visita', 2);
      valorStorage = localStorage.getItem('visita');
    }
  }

  if (e.target.classList.contains('fpd-gt-next') || e.target.classList.contains('fpd-primary')){
    let   contadorTour  = document.getElementsByClassName('fpd-gt-counter'),
          pasoContador  = contadorTour[0].innerHTML.split("/"),
          pasoInicial   = pasoContador[0],
          cantidadPasos = pasoContador[1],
          ventanaTour   = document.getElementsByClassName('fpd-gt-step'),
          cerrarTour    = document.getElementsByClassName('fpd-gt-back');
    
    if (e.target.className == 'fpd-gt-next fpd-btn fpd-primary'){
      ++pasoInicial; 
    }else if (e.target.className == 'fpd-gt-back fpd-btn fpd-primary'){
      --pasoInicial; 
    }

    if (e.target.className == 'fpd-btn fpd-primary'){
      ventanaTour[0].style.display = "none";
      localStorage.setItem('fpd-gt-closed', 'yes');
    }

    if (pasoInicial == cantidadPasos && ventanaTour[0].style.display != 'none'){
        let ciclo = setInterval( function(){
        cerrarTour[0].innerHTML = 'Cerrar';
        cerrarTour[0].classList.remove('fpd-gt-back');
        clearInterval(ciclo);
        ciclo = null;
      }, 50);
    }


  }

});

