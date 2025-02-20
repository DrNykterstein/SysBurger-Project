let paso = 1;


document.addEventListener('DOMContentLoaded',function(){
    iniciarApp();
});

function iniciarApp(){
    tabs(); //carga el menu
}

function mostrarSeccion(){
    const seccionAnterior = document.querySelector('.mostrar');
    if(seccionAnterior){
        seccionAnterior.classList.remove('mostrar');
    }
    const seccion = document.querySelector(`#paso-${paso}`);
    seccion.classList.add('mostrar');
}


function tabs(){
    const botones = document.querySelectorAll('.tabs button');

    botones.forEach((boton)=>{
        boton.addEventListener('click',function(e){
            paso=parseInt(e.target.dataset.paso);
            mostrarSeccion();
        });
    })
}