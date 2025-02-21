let paso = 1;


document.addEventListener('DOMContentLoaded',function(){
    iniciarApp();
});

function iniciarApp(){
    mostrarSeccion();
    tabs(); //carga el menu
    paginador();
}

function mostrarSeccion(){
    const seccionAnterior = document.querySelector('.mostrar');
    if(seccionAnterior){
        seccionAnterior.classList.remove('mostrar');
    }
    const seccion = document.querySelector(`#paso-${paso}`);
    seccion.classList.add('mostrar');

    //quita la clase actual
    const tabAnterior = document.querySelector('.actual');
    if(tabAnterior){
        tabAnterior.classList.remove('actual');
    }

    //Resalta el tab actual 
    const tab = document.querySelector(`[data-paso="${paso}"]`);
    //agrego la clase
    tab.classList.add('actual');
}


function tabs(){
    const botones = document.querySelectorAll('.tabs button');

    botones.forEach((boton)=>{
        boton.addEventListener('click',function(e){
            paso=parseInt(e.target.dataset.paso);
            mostrarSeccion();
            paginador();
        });
    })
}

function paginador(){
    const paginaSiguiente = document.querySelector('#siguiente');
    const paginaAnterior = document.querySelector('#anterior');
    if(paso === 1){
        paginaAnterior.classList.add('ocultar');
        paginaSiguiente.classList.remove('ocultar');
    }else if(paso === 3){
        paginaAnterior.classList.remove('ocultar');
        paginaSiguiente.classList.add('ocultar');
    }else{
        paginaAnterior.classList.remove('ocultar');
        paginaSiguiente.classList.remove('ocultar');
    }
}