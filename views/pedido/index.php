<h1 class="nombre-pagina-pedido">Crear Pedido</h1>
<div class="app">
    <div id="paso-1" class="seccion">
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
                    placeholder="Tu nombre"
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
        <p>Coloca tus datos y fecha de tu pedido</p>
    </div>

    <div id="paso-3" class="seccion">
        <h2>Resumen</h2>
        <p>Verificar Informacion</p>
    </div>
</div>