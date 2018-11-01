<?php
include 'head.php';

session_start();
if(!empty($_SESSION['usuarioTipo'])){
    if($_SESSION['usuarioTipo']=='usuarioA'){
        echo 'SE CUMPLE <br>';
    }else{
        echo 'NOOO CUMPLE <br>';    
    }
}


echo'A este formulario podrá acceder cualquier usuario SIEMPRE que este logueado correctamente<br><br>';
print' 

        <h2 id="slogan-text" class="logo-text">Bienvenido a la página oficial de ventas en línea de la Torre Eiffel.</h2><br>
                                 
        <div   class="postcontent">
        <form action="" method="post">
            <table align="center" class="content-layout">
            <tr>
             <td>Nombre y Apellidos del titular de la Reserva :</strong></td>
              <td>
               <input type="text" name="titular_reserva" value="Saúl Alonso" size="40" />
                 
              
               </td>
               </tr>
               <tr>
              <td>Elija las opciones que desee :</strong></td>
              <td>
               
                 <input type="checkbox" name="opciones" value="true"  /> Con Guia (3€ por cada adulto y joven)
              
               </td>
               </tr>
              <tr>
                        <td>Seleccione el Tipo de Entrada :</td>
                        <td>
                          <div>
                                <select name="tipo">
                                  <option value="ascensor">Billete de ascensor a la 2ª planta</option>
                                  <option value="cima">Billete de ascensor a la cima</option>
                                 <option value="escaleras">Billete escaleras 2ª planta</option>
                                  <option value="mixto">Billete escaleras+Ascensor a la cima</option>
                                </select>
                           </div>
                          </td>
              </tr>
               <tr>
               <td>
               <div>
                    	Seleccione una fecha: </td>
                         <td><input type="date" name="fecha" > </td>
                  
              </div>
               </tr>
                <tr>
                        <td>Entradas Adultos :</td>
                        <td>
                          <input type="number" name="adultos"  value="0" min="0" max="20" size="5">
                        </td>
                          
              </tr>
               <tr>
                        <td>Entradas Jovenes 12-24 años :</td>
                        <td>
                          <input type="number" name="jovenes" value="0" min="0" max="20" size="5">
                        </td>
                          
              </tr>
              <tr>
              <td>Entradas de Niño(4-11 años)/Discapacitado :</td>
             
               <td>
                          <input type="number" name="niños" value="0" min="0" max="20" size="5">
                </td>
               </tr>
                <tr>
                    <td>Entradas de Niños Pequeños(Menos de 4 años)</td>
             
                    <td>
                          <input type="number" name="pequeño" value="0" min="0" max="20" size="5">
                    </td>
               </tr>
             
              <tr >
              <td colspan="2"><div align="center">
            <input name="enviar" type="submit" class="boton" value="Calcular"/>
          </div></td></tr>
        </table>
        <div id="imagen">
        <img src="images/torreeifel.png" width="250" height="400" alt="torreeiffel"/>

        </div>
    </form>
';
$totalPersonas = 0;
$precio = 0;

if (isset($_POST['enviar'])) {
    if (!empty($_POST['tipo']) &&
            !empty($_POST['titular_reserva']) &&
            !empty($_POST['adultos']) ||
            !empty($_POST['jovenes'])
    ) {
        $tipo = $_POST['tipo'];
        $numAdultos = $_POST['adultos'];
        $numJovenes = $_POST['jovenes'];
        $numNinos = $_POST['niños'];
        $numPeques = $_POST['pequeño'];      
        $totalPersonas = $numAdultos + $numJovenes + $numNinos + $numPeques;

        if (!empty($_POST['opciones'])) {

            $guia = $_POST['opciones'];

            if ($guia == true) {
                $precio+=$numAdultos * 3;
                $precio+=$numJovenes * 3;
            }
        }

        switch ($tipo) {
            case "cima":
                if ($numAdultos > 0) {
                    $precio+=$numAdultos * 25;
                }

                if ($numJovenes > 0) {
                    $precio+=$numJovenes * floatval(12.5);
                }
                if ($numNinos > 0) {
                    $precio+=$numNinos * floatval(6.3);
                }

                break;

            case "ascensor";

                if ($numAdultos > 0) {
                    $precio+=$numAdultos * 16;
                }

                if ($numJovenes > 0) {
                    $precio+=$numJovenes * 8;
                }
                if ($numNinos > 0) {
                    $precio+=$numNinos * 4;
                }

                break;
            case "escalera";

                if ($numAdultos > 0) {
                    $precio+=$numAdultos * 10;
                }

                if ($numJovenes > 0) {
                    $precio+=$numJovenes * 5;
                }
                if ($numNinos > 0) {
                    $precio+=$numNinos * floatval(2.5);
                }

                break;

            case "mixto";

                if ($numAdultos > 0) {
                    $precio+=$numAdultos * 19;
                }

                if ($numJovenes > 0) {
                    $precio+=$numJovenes * floatval(9.5);
                }
                if ($numNinos > 0) {
                    $precio+=$numNinos * floatval(4.8);
                }

                break;
        }
    }
}


echo '  
   <br>
    <table >
    <tr>
    <td >Total</td>
    </tr>
    <tr>
    <td>
        Visitantes
   </td>
   <td>';

if ($totalPersonas == 0) {
    echo '<input type="text" name="visitantes" value="" size="7" />';
} else {
    echo '<input type="text" name="visitantes" value="' . $totalPersonas . '" size="7" />';
}


echo '            
   </td>
    </tr>
    <tr>
    <td>Precio Total </td>
    <td>';

if ($precio == 0) {
    echo '<input type="text" name="precio" value="" size="7" />';  
}else{
    echo '<input type="text" name="precio" value="'.$precio.'" size="7" />';  

}

echo '
    
    </td>
    
    </tr>
    
     </table>
        </div>';

include 'pie.php';

