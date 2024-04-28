<?php
session_start();
include('conexion.php');
if (isset($_SESSION['usuarioingresando'])) {
    header('location: productos_tabla.php');
}
?>

<html>
<!--inicio del proyecto -->

<head>
    <title>Baby co Colombia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="FormCajaLogin">

        <div class="FormLogin">
            <center><h1 class="title"> BabyCo</h1></center>
            <div class="botondeintercambiar">
                <div id="btnvai"></div>
                <button type="button" class="botoncambiarcaja" onclick="loginvai()" id="vaibtnlogin">Login</button>
                <button type="button" class="botoncambiarcaja" onclick="registrarvai()" id="vaibtnregistrar">Registrar</button>
            </div>

            <!-- formulario login -->
            <div>
                <form method="POST" id="frmlogin" class="grupo-entradas" action="usuario_login.php">
                    <h2>Iniciar sesión</h2>
    
            
    
                    <div class="TextoCajas">• Ingresar correo</div>
                    <input type="email" name="txtcorreo" class="CajaTexto" autocomplete="off" required>
    
                    <div class="TextoCajas">• Ingresar password</div>
                    <input type="password" name="txtpassword" class="CajaTexto" autocomplete="off" required>
    
                    <div>
                        <input type="submit" value="Iniciar sesión" class="BtnLogin" name="btningresar">
                    </div>
    
                </form>
            </div>

            <div>
                <form method="post" id="frmregistrar" class="grupo-entradas" action="usuario_registrar.php">
                    <h2>Crear nueva cuenta</h2>
    
                    <div class="TextoCajas">• Ingresar nombre</div>
                    <input type="text" name="txtnombre1" class="CajaTexto" autocomplete="off" required>
    
                    <div class="TextoCajas">• Ingresar correo</div>
                    <input type="email" name="txtcorreo1" class="CajaTexto" autocomplete="off" required>
    
                    <div class="TextoCajas">• Ingresar password</div>
                    <input type="password" name="txtpassword1" class="CajaTexto" autocomplete="off" required>
    
                    <div>
                        <input type="submit" value="Crea nueva cuenta" class="BtnRegistrar" name="btnregistrar">
                    </div>
    
                </form>

            </div>
            <!-- formulario registrar -->
        </div>
    </div>

</body>
<script src="boton_formulario.js"></script>

</html>