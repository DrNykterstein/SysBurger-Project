<h1 class="nombre-pagina">Olvide Contraseña</h1>
<p class="descripcion-pagina">Reestablece tu Contraseña escribiendo tu correo</p>

<form action="/recuperar" class="formulario" method="POST">
    <div class="campo">
        <label for="correo">Correo Electronico</label>
        <input 
            type="email"
            id="email"
            name="email"
            placeholder="Tu Correo Electronico"
        >
    </div>


    <input type="submit" class="boton" value="Enviar Instrucciones">
</form>

<div class="acciones">
    <a href="/">Si ya tienes cuenta, Inicia Sesion</a>
    <a href="/crearCuenta">Crear cuenta</a>
</div>