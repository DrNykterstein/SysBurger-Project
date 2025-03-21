let paso = 1;
const pasoInicial = 1;
const pasoFinal = 3;

const pedido = {
    idpedidos:'',
    id:'',
    nombre : '',
    fecha : '',
    hora : '',
    servicios: []
}


document.addEventListener('DOMContentLoaded',function(){
    iniciarApp();
});

function iniciarApp(){
    mostrarSeccion();
    tabs(); //carga el menu
    paginador();
    paginaSiguiente();
    paginaAnterior();
    consultarAPI(); //Consulta la api para el menu
    idCliente();
    nombreCliente();
    seleccionarFecha();
    seleccionarHora();
    generarIdPedido();
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
        mostrarResumen();
    }else{
        paginaAnterior.classList.remove('ocultar');
        paginaSiguiente.classList.remove('ocultar');
    }
    mostrarSeccion();
}

function paginaAnterior(){
    const paginaAnterior = document.querySelector('#anterior');
    //cuando de click ejecuto la funcion 
    paginaAnterior.addEventListener('click', function(){
        if(paso <= pasoInicial) return;
        paso--;
        paginador();
    })
}

function paginaSiguiente(){
    const paginaSiguiente = document.querySelector('#siguiente');
    paginaSiguiente.addEventListener('click', function(){
        if(paso >= pasoFinal) return;
        paso++;
        paginador();
    })
}

function generarIdPedido() {
    // Genera un número aleatorio entre 10000 y 99999
    pedido.idpedidos = Math.floor(10000 + Math.random() * 90000);
}

async function consultarAPI(){
    try {
        const url = 'http://localhost:3000/api/servicios';
        const resultado = await fetch(url);
        const servicios = await resultado.json();
        mostrarServicios(servicios);
    } catch (error) {
        console.log(error);
    }
}

function mostrarServicios(servicios){
    servicios.forEach(servicio => {
        const {idservicios,nombre,precio} = servicio;
        const nombreServicio = document.createElement('P');
        nombreServicio.classList.add('nombre-servicio');
        nombreServicio.textContent = nombre;
        const precioServicio = document.createElement('P');
        precioServicio.classList.add('precio-servicio');
        precioServicio.textContent = `$ ${precio}`;

        const servicioDiv = document.createElement('DIV');
        servicioDiv.classList.add('servicio');

        servicioDiv.dataset.idservicios = idservicios;
        servicioDiv.onclick = function(){
            seleccionarServicio(servicio);
        }

        //Los muestro en pantalla
        servicioDiv.appendChild(nombreServicio);
        servicioDiv.appendChild(precioServicio);
        document.querySelector('#menu').appendChild(servicioDiv);

    });

}

function seleccionarServicio(servicio){
    const {idservicios}=servicio;
    const {servicios} = pedido;
    const divServicio = document.querySelector(`[data-idservicios="${idservicios}"]`);
    //Comprobar si seleccionaron algo del menu
    if(servicios.some(seleccionado => seleccionado.idservicios === servicio.idservicios)){
        pedido.servicios = servicios.filter(seleccionado => seleccionado.idservicios !== idservicios);
        divServicio.classList.remove('seleccionado');
    }else{
        pedido.servicios = [...servicios,servicio];
        divServicio.classList.add('seleccionado');
    }
    
}

function idCliente(){
    pedido.id = document.querySelector('#id').value;
}

function nombreCliente(){
    pedido.nombre = document.querySelector('#nombre').value;
}

function seleccionarFecha(){
    const inputFecha = document.querySelector('#fecha');
    inputFecha.addEventListener('input', function(e){
        pedido.fecha = e.target.value;
        
    });
}
function seleccionarHora(){
    const inputHora = document.querySelector('#hora');
    inputHora.addEventListener('input', function(e){
        pedido.hora = e.target.value;
    })
}

function mostrarAlertas(mensaje,tipo,elemento,desaparece=true){
    //Previene que se generen mas de una alerta
    const alertaPrevia = document.querySelector('.alerta');
    if(alertaPrevia){
        alertaPrevia.remove();
    }

    //crear el html de la aleta
    const alerta = document.createElement('DIV');
    alerta.textContent = mensaje;
    alerta.classList.add('alerta');
    alerta.classList.add(tipo);
    // selecciono donde la quiero mostrar la alerta
    const formulario = document.querySelector(elemento);
    //Muestro la alerta en pantalla
    formulario.appendChild(alerta);
    //Elimino la alerta
    if(desaparece){
        setTimeout(()=>{
            alerta.remove();
        },3000);
    }  
}


function mostrarResumen(){
    const resumen = document.querySelector('.contenido-resumen');
    while(resumen.firstChild){
        resumen.removeChild(resumen.firstChild);
    }
    if(Object.values(pedido).includes('') || pedido.servicios.length === 0){
        mostrarAlertas('Falta informacion','error','.contenido-resumen',false);
        return;
    }


    const {nombre,fecha,hora,servicios} = pedido;
    const nombreCliente = document.createElement('P');
    nombreCliente.innerHTML = `<span>Nombre:</span> ${nombre}`;
    const fechaPedido = document.createElement('P');
    fechaPedido.innerHTML = `<span>Fecha:</span> ${fecha}`;
    const horaPedido = document.createElement('P');
    horaPedido.innerHTML = `<span>Hora:</span> ${hora}`;

    const tituloMenu = document.createElement('H3');
    tituloMenu.textContent = 'Resumen del Pedido';
    resumen.appendChild(tituloMenu);

    servicios.forEach(servicio => {
        const{idservicios,precio,nombre} = servicio;
        const contenedorServicio = document.createElement('DIV');
        contenedorServicio.classList.add('contenedor-servicio');
        const textoServicio = document.createElement('P');
        textoServicio.textContent = nombre;
        const precioServicio = document.createElement('P');
        precioServicio.innerHTML = `<span>Precio:</span> $${precio}`;
        contenedorServicio.appendChild(textoServicio);
        contenedorServicio.appendChild(precioServicio);
        //lo muestro en el resumen
        resumen.appendChild(contenedorServicio);
    })

    const botonEnviarPedido = document.createElement('BUTTON');
    botonEnviarPedido.classList.add('boton');
    botonEnviarPedido.textContent = 'Realizar Pedido';
    botonEnviarPedido.onclick = realizarPedido;

    resumen.appendChild(nombreCliente);
    resumen.appendChild(fechaPedido);
    resumen.appendChild(horaPedido);
    resumen.appendChild(botonEnviarPedido);
}

async function realizarPedido(){
    const {nombre,fecha,hora,servicios,id,idpedidos} = pedido;
    const idservicios = servicios.map(servicio => servicio.idservicios);
    const datos = new FormData();
    datos.append('idpedidos',idpedidos);
    datos.append('usuarioid',id);
    datos.append('fecha',fecha);
    datos.append('hora',hora);
    datos.append('servicios',idservicios);
    // Peticion asincrona hacia la api
    const url = 'http://localhost:3000/api/servicios';
    const respuesta = await fetch(url,{
        method: 'POST',
        body: datos
    });

    const resultado = await respuesta.json();
}
