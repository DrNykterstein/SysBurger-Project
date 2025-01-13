<h1 class="nombre-pagina">SysBurguer</h1>
<p class="descripcion-pagina">Inicia Sesion</p>


<form action="/" method="POST" class="formulario">
    <div class="campo">
        <label for="email">Correo Electronico</label>
        <input 
            type="email"
            id="email"
            placeholder="Tu Correo Electronico"
            name="email"
        />
    </div>

    <div class="campo">
        <label for="passoword">Contraseña</label>
        <input 
            type="password"
            id="password"
            placeholder="Escribe tu Contraseña"
            name="password"
        />
    </div>

    <input type="submit" class="boton" value="Iniciar Sesion">
</form>

<div class="acciones">
    <a href="/crearCuenta">Crear Cuenta</a>
    <a href="/recuperar">Olvide mi Contraseña</a>
</div>