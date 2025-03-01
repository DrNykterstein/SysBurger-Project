let paso=1;const pasoInicial=1,pasoFinal=3,pedido={nombre:"",fecha:"",hora:"",servicios:[]};function iniciarApp(){mostrarSeccion(),tabs(),paginador(),paginaSiguiente(),paginaAnterior(),consultarAPI()}function mostrarSeccion(){const e=document.querySelector(".mostrar");e&&e.classList.remove("mostrar");document.querySelector(`#paso-${paso}`).classList.add("mostrar");const o=document.querySelector(".actual");o&&o.classList.remove("actual");document.querySelector(`[data-paso="${paso}"]`).classList.add("actual")}function tabs(){document.querySelectorAll(".tabs button").forEach((e=>{e.addEventListener("click",(function(e){paso=parseInt(e.target.dataset.paso),mostrarSeccion(),paginador()}))}))}function paginador(){const e=document.querySelector("#siguiente"),o=document.querySelector("#anterior");1===paso?(o.classList.add("ocultar"),e.classList.remove("ocultar")):3===paso?(o.classList.remove("ocultar"),e.classList.add("ocultar")):(o.classList.remove("ocultar"),e.classList.remove("ocultar")),mostrarSeccion()}function paginaAnterior(){document.querySelector("#anterior").addEventListener("click",(function(){paso<=1||(paso--,paginador())}))}function paginaSiguiente(){document.querySelector("#siguiente").addEventListener("click",(function(){paso>=3||(paso++,paginador())}))}async function consultarAPI(){try{const e="http://localhost:3000/api/servicios",o=await fetch(e);mostrarServicios(await o.json())}catch(e){console.log(e)}}function mostrarServicios(e){e.forEach((e=>{const{idservicios:o,nombre:t,precio:c}=e,i=document.createElement("P");i.classList.add("nombre-servicio"),i.textContent=t;const s=document.createElement("P");s.classList.add("precio-servicio"),s.textContent=`$ ${c}`;const a=document.createElement("DIV");a.classList.add("servicio"),a.dataset.idservicios=o,a.onclick=function(){seleccionarServicio(e)},a.appendChild(i),a.appendChild(s),document.querySelector("#menu").appendChild(a)}))}function seleccionarServicio(e){const{idservicios:o}=e,{servicios:t}=pedido,c=document.querySelector(`[data-idservicios="${o}"]`);t.some((o=>o.idservicios===e.idservicios))?(pedido.servicios=t.filter((e=>e.idservicios!==o)),c.classList.remove("seleccionado")):(pedido.servicios=[...t,e],c.classList.add("seleccionado"))}document.addEventListener("DOMContentLoaded",(function(){iniciarApp()}));