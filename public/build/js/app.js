let paso=1;const pasoInicial=1,pasoFinal=3,pedido={nombre:"",fecha:"",hora:"",servicios:[]};function iniciarApp(){mostrarSeccion(),tabs(),paginador(),paginaSiguiente(),paginaAnterior(),consultarAPI(),nombreCliente(),seleccionarFecha(),seleccionarHora()}function mostrarSeccion(){const e=document.querySelector(".mostrar");e&&e.classList.remove("mostrar");document.querySelector(`#paso-${paso}`).classList.add("mostrar");const t=document.querySelector(".actual");t&&t.classList.remove("actual");document.querySelector(`[data-paso="${paso}"]`).classList.add("actual")}function tabs(){document.querySelectorAll(".tabs button").forEach((e=>{e.addEventListener("click",(function(e){paso=parseInt(e.target.dataset.paso),mostrarSeccion(),paginador()}))}))}function paginador(){const e=document.querySelector("#siguiente"),t=document.querySelector("#anterior");1===paso?(t.classList.add("ocultar"),e.classList.remove("ocultar")):3===paso?(t.classList.remove("ocultar"),e.classList.add("ocultar"),mostrarResumen()):(t.classList.remove("ocultar"),e.classList.remove("ocultar")),mostrarSeccion()}function paginaAnterior(){document.querySelector("#anterior").addEventListener("click",(function(){paso<=1||(paso--,paginador())}))}function paginaSiguiente(){document.querySelector("#siguiente").addEventListener("click",(function(){paso>=3||(paso++,paginador())}))}async function consultarAPI(){try{const e="http://localhost:3000/api/servicios",t=await fetch(e);mostrarServicios(await t.json())}catch(e){console.log(e)}}function mostrarServicios(e){e.forEach((e=>{const{idservicios:t,nombre:o,precio:n}=e,c=document.createElement("P");c.classList.add("nombre-servicio"),c.textContent=o;const a=document.createElement("P");a.classList.add("precio-servicio"),a.textContent=`$ ${n}`;const i=document.createElement("DIV");i.classList.add("servicio"),i.dataset.idservicios=t,i.onclick=function(){seleccionarServicio(e)},i.appendChild(c),i.appendChild(a),document.querySelector("#menu").appendChild(i)}))}function seleccionarServicio(e){const{idservicios:t}=e,{servicios:o}=pedido,n=document.querySelector(`[data-idservicios="${t}"]`);o.some((t=>t.idservicios===e.idservicios))?(pedido.servicios=o.filter((e=>e.idservicios!==t)),n.classList.remove("seleccionado")):(pedido.servicios=[...o,e],n.classList.add("seleccionado"))}function nombreCliente(){pedido.nombre=document.querySelector("#nombre").value}function seleccionarFecha(){document.querySelector("#fecha").addEventListener("input",(function(e){pedido.fecha=e.target.value}))}function seleccionarHora(){document.querySelector("#hora").addEventListener("input",(function(e){pedido.hora=e.target.value}))}function mostrarAlertas(e,t,o,n=!0){const c=document.querySelector(".alerta");c&&c.remove();const a=document.createElement("DIV");a.textContent=e,a.classList.add("alerta"),a.classList.add(t);document.querySelector(o).appendChild(a),n&&setTimeout((()=>{a.remove()}),3e3)}function mostrarResumen(){const e=document.querySelector(".contenido-resumen");for(;e.firstChild;)e.removeChild(e.firstChild);if(Object.values(pedido).includes("")||0===pedido.servicios.length)return void mostrarAlertas("Falta informacion","error",".contenido-resumen",!1);const{nombre:t,fecha:o,hora:n,servicios:c}=pedido,a=document.createElement("P");a.innerHTML=`<span>Nombre:</span> ${t}`;const i=document.createElement("P");i.innerHTML=`<span>Fecha:</span> ${o}`;const r=document.createElement("P");r.innerHTML=`<span>Hora:</span> ${n}`;const s=document.createElement("H3");s.textContent="Resumen del Pedido",e.appendChild(s),c.forEach((t=>{const{idservicios:o,precio:n,nombre:c}=t,a=document.createElement("DIV");a.classList.add("contenedor-servicio");const i=document.createElement("P");i.textContent=c;const r=document.createElement("P");r.innerHTML=`<span>Precio:</span> $${n}`,a.appendChild(i),a.appendChild(r),e.appendChild(a)}));const d=document.createElement("BUTTON");d.classList.add("boton"),d.textContent="Realizar Pedido",d.onclick=realizarPedido,e.appendChild(a),e.appendChild(i),e.appendChild(r),e.appendChild(d)}async function realizarPedido(){(new FormData).append();await fetch("http://localhost:3000/api/servicios",{method:"POST"})}document.addEventListener("DOMContentLoaded",(function(){iniciarApp()}));