<?php
session_start();
if (!isset($_SESSION['count'])) {
  $_SESSION['count'] = 0;
} else {
  $_SESSION['count']++;
}

include 'head.php';

echo'

<div class="login-block">
    <h1>Login</h1>
    <form action="index.php" method="POST">
        <input class="deshabilitar" type="text" value="" placeholder="Username" id="username" name="username" />
        <input type="password" value="" placeholder="Password" id="password" name="password" />
        <input class="boton" type="submit" value="Validar" name="validar" />
        
    </form>
    
</div>';

$usuarios = array("ana", "juan", "admin");
$claves = array("ana", "juan", "admin");

if (isset($_POST['validar'])) {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        
        $usuario = $_POST['username'];
        $clave = $_POST['password'];
        
        for($i = 0; $i < count($usuarios);$i++){
            if(($usuario == $usuarios[$i]) && ($clave == $claves[$i])){
                
                echo 'USUARIO CORRECTO';
                
                if($usuario== $usuarios[0] || $usuario== $usuarios[1]){
                    echo 'USUARIO A';
                    $_SESSION['usuarioTipo']="usuarioA"; 
                    Header('Location: venta_entradas.php');
                }else if($usuario== $usuarios[2]){
                    echo 'USUARIO B';
                    $_SESSION['usuarioTipo']="usuarioB";
                    Header('Location: modificacion_reserva.php');
                }  else {
                     $_SESSION['usuarioTipo']="usuarioC";
                }
            }
        }
        
    }else{
        echo 'no entro ';
    }
}
include 'pie.php';

