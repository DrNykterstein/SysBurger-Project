 <h1 class="nombre-pagina">Crear cuenta</h1>
 <p class="descripcion-pagina">Llena el siguiente Formulario</p>


 <form action="/crearCuenta" class="formulario" method="/POST">
    <div class="campo">
        <label for="nombre">Nombre</label>
        <input 
            type="text"
            id="nombre"
            name="nombre"
            placeholder="Tu nombre"     
        >
    </div>

    <div class="campo">
        <label for="apellido">Apellido</label>
        <input 
            type="text"
            id="apellido"
            name="apelldio"
            placeholder="Tu Apellido"     
        >
    </div>

    <div class="campo">
        <label for="telefono">Telefono</label>
        <input 
            type="tel"
            id="telefono"
            name="telefono"
            placeholder="Tu Telefono"     
        >
    </div>

    <div class="campo">
        <label for="correo">Correo</label>
        <input 
            type="email"
            id="correo"
            name="correo"
            placeholder="Tu Correo Electronico"     
        >
    </div>


    <div class="campo">
        <label for="password">Contraseña</label>
        <input 
            type="password"
            id="password"
            name="password"
            placeholder="Tu Contraseña"     
        >
    </div>

    <input type="submit" class="boton" value="Crear Cuenta">

 </form>

<div class="acciones">
    <a href="/">Si ya tienes cuenta, Inicia Sesion</a>
    <a href="/recuperar">Olvide mi Contraseña</a>
</div>