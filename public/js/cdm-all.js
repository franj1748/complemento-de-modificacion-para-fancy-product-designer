if (localStorage.getItem('visita') == null){
   localStorage.setItem('visita', 1);
}

let valorStorage = localStorage.getItem('visita');


document.body.addEventListener('click', (e) => {
  if (e.target.classList.contains('upper-canvas') && valorStorage == 1 && document.querySelector('.fpd-show')){
    let tercerHijo = $(".fpd-show div:nth-child(3)");
    if (tercerHijo[0].scrollWidth > tercerHijo[0].clientWidth){
      jQuery('.fpd-scroll-area').animate({scrollLeft: '500' }, 1000);
      jQuery('.fpd-scroll-area').animate({scrollLeft: '0' }, 1000);
      localStorage.setItem('visita', 2);
      valorStorage = localStorage.getItem('visita');
    }
  }

  if (e.target.classList.contains('fpd-gt-next') || e.target.classList.contains('fpd-primary')){
    let contadorTour = document.getElementsByClassName('fpd-gt-counter');
    let pasoContador = contadorTour[0].innerHTML.split("/");
    let pasoInicial = pasoContador[0];
    let cantidadPasos = pasoContador[1];
    let ventanaTour = document.getElementsByClassName('fpd-gt-step');
    let cerrarTour = document.getElementsByClassName('fpd-gt-back');
    
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


/* 
* Código inicial
jQuery(document).ready(function(){
    jQuery('body').on('click', '#cdm-aux-1', function(){
        setTimeout(function(){
          jQuery('#cdm-aux-0').animate({scrollLeft: '190' }, 1000);
          jQuery('#cdm-aux-0').animate({scrollLeft: '0' }, 1000);
        }, 1900);
    });
});
*/


