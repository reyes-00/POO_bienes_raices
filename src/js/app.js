document.addEventListener('DOMContentLoaded',function() {
  eventListenrs();
  darkMode();
})

function darkMode() {

  const prefireDack = window.matchMedia('(prefers-color-scheme: dark)');
  prefireDack.addEventListener('change', function(){
    if (prefireDack.matches) {
      document.body.classList.add('dark-mode');
    }else{
      document.body.classList.remove('dark-mode');
  
    }
  })
  const darkMode = document.querySelector('.dark-mode');

  darkMode.addEventListener('click',function(){
    document.body.classList.toggle('dark-mode');
  })
}

function eventListenrs() {
  const mobileMenu = document.querySelector('.mobile-menu');
  mobileMenu.addEventListener('click',navegacionReponsive)
}

function navegacionReponsive(){
  const navegacion = document.querySelector('.navegacion');

  if(navegacion.classList.contains('mostrar')){
    navegacion.classList.remove('mostrar');
  }else{
    navegacion.classList.add('mostrar');

  }
}