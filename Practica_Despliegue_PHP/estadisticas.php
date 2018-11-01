<?php
session_start();
include 'head.php';
 echo'SOLO tendra acceso a este formulario el ADMINISTRADOR, el cual podrá consultar los datos/crear estadisticas  de las reservas';                                            
 print' 
         <BR><BR>
                                     
        <div   class="postcontent">
        <form action="" method="post">
            <table align="center" class="content-layout">
              										  </td></tr>
              <tr>
                <td>Seleccione el tipo de estaditica a generar :</td>
                <td>
                 <div>
                    <select name="estadisticas">
                     <option value="">Por dia</option>
                      <option value="">Por tipo de Usuario</option>
                      <option value="">Otros</option>
                    </select>
                </div>
               </td>
              </tr>
              <tr >
              <td colspan="2"><div align="center"><strong>
                <input name="generar" type="submit" id="generar" value="Generar"/>
                </strong>
                </div>
              </td>
            </tr>
              
        </table>
    </form>
        </div>';
 include 'pie.php';

