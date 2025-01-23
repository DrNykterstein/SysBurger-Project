 <h1 class="nombre-pagina">Crear cuenta</h1>
 <p class="descripcion-pagina">Llena el siguiente Formulario</p>

<?php 
    include_once __DIR__."/../templates/alertas.php";

?>


 <form action="/crearCuenta" class="formulario" method="POST">
    <div class="campo">
        <label for="nombre">Nombre</label>
        <input 
            type="text"
            id="nombre"
            name="nombre"
            placeholder="Tu nombre"
            value="<?php echo s($usuario->nombre);?>"     
        >
    </div>

    <div class="campo">
        <label for="apellido">Apellido</label>
        <input 
            type="text"
            id="apellido"
            name="apellido"
            placeholder="Tu Apellido"
            value="<?php echo s($usuario->apellido);?>"       
        >
    </div>

    <div class="campo">
        <label for="telefono">Telefono</label>
        <input 
            type="tel"
            id="telefono"
            name="telefono"
            placeholder="Tu Telefono"
            value="<?php echo s($usuario->telefono);?>"       
        >
    </div>

    <div class="campo">
        <label for="correo">Correo</label>
        <input 
            type="email"
            id="email"
            name="email"
            placeholder="Tu Correo Electronico"
            value="<?php echo s($usuario->email);?>"       
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