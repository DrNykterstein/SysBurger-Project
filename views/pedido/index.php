<h1 class="nombre-pagina-pedido">Crear Pedido</h1>
<div class="app">
    <nav class="tabs">
        <button type="button" data-paso="1">Menu</button>
        <button type="button" data-paso="2">Pedido</button>
        <button type="button" data-paso="3">Resumen</button>
    </nav>


    <div id="paso-1" class="seccion mostrar">
        <h2>Menu</h2>
        <p class="text-center">Elige el de tu preferencia</p>
        <div id="menu" class="listado-menu"></div>
    </div>

    <div id="paso-2" class="seccion">
        <h2>Tus datos para el Pedido</h2>
        <form class="formulario-pedido">
            <div class="campo-pedido">
                <label for="nombre">Nombre</label>
                <input
                    id="nombre" 
                    type="text"
                    placeholder="<?php echo $nombre; ?>"
                    value="<?php echo $nombre; ?>"
                    disabled
                >
            </div>

            <div class="campo-pedido">
                <label for="fecha">fecha</label>
                <input
                    id="fecha" 
                    type="fecha"
                >
            </div>

            <div class="campo-pedido">
                <label for="hora">hora</label>
                <input
                    id="hora" 
                    type="time"
                >
            </div>
        </form>
        <p class="text-center">Coloca tus datos y fecha de tu pedido</p>
    </div>

    <div id="paso-3" class="seccion">
        <h2>Resumen</h2>
        <p class="text-center">Verificar Informacion</p>
    </div>


    <div class="paginacion">
        <button
            id="anterior"
            class="boton"
        >&laquo; Anterior</button>

        <button
            id="siguiente"
            class="boton"
        >Siguiente &raquo;</button>
    </div>
</div>



<?php 

    $script="
        <script src='build/js/app.js'></script>  
    "; 
?>