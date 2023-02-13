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

  const contacto = document.querySelectorAll('input[name="contacto"]');
  contacto.forEach(input => input.addEventListener('click',mostrarContenido)) 
  

}

function mostrarContenido(e){
  let contacto_info = document.querySelector('.contacto-info');
  if(e.target.value === 'telefono'){
    contacto_info.innerHTML= `
    <label  for="telefono">Ingresa el Telefono</label>
    <input type="number" id="telefono" placeholder="Tu telefono" name="telefono">
    <p>Eligio telefono eliga una fecha y hora</p>
    <label for="fecha">Fecha</label>
    <input type="date" id="fecha" name="fecha">
    <label for="hora">Hora</label>
    <input type="time" name="hora" id="hora">
    `;
  }else{
    contacto_info.innerHTML = `
    <label  for="email">Email</label>
    <input type="email" id="email" placeholder="Tu email" name="email">
    `;
  }
}


function navegacionReponsive(){
  const navegacion = document.querySelector('.navegacion');

  if(navegacion.classList.contains('mostrar')){
    navegacion.classList.remove('mostrar');
  }else{
    navegacion.classList.add('mostrar');

  }
}