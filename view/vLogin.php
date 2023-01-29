<link rel="stylesheet" href="./webroot/style/login.css">
<form action="./index.php" method="post">
    <fieldset>
        <legend>Iniciar Sesión</legend>
        <label>Usuario</label>
        <input type="text" name="usuario">
        <label>Password</label>
        <input type="password" name="password">
        <input type="submit" class="buttom" name="iniciar" value="Iniciar">
    </fieldset>
    <fieldset>
        <legend>Registrarse</legend>
        <p>Si aun no cuenta puedes registrarte aqui</p>
        <input type="submit" class="buttom" name="registrarse" value="registrarse">
    </fieldset>
    <input type="submit" class="buttom" name="volver" value="Cancelar">
</form>
