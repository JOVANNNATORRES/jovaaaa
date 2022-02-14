<?php

 error_reporting (E_ALL ^ E_DEPRECATED);
 header("content-Type: text/html; charset=UTF-8");

 $con = new SQLite3("basse.db") or die("Problemas para conectar");
 $cs = $con -> query("SELECT * FROM basejot1");

 $txtCorreo = isset($_POST ['txtCorreo']) ? $_POST['txtCorreo'] : '';
 $txtPws = isset($_POST ['txtPws']) ? $_POST['txtPws'] : '';


 if (isset ($txtCorreo) && !empty($txtCorreo) &&
    isset ($txtPws) && !empty( $txtPws)
    ) {
    
        $con = new SQLite3("basse.db") or die("Problemas para conectar");
        $cs = $con -> query("SELECT * FROM basejot1 WHERE correo= '$txtCorreo'");
        $id = '';
        $nombres = '';
        $aPaterno = '';
        $aMaterno = '';
        $correo = '';
        $contrasena = '';

        while ($resul = $cs -> fetchArray()) {
                    $id = $resul['id'];
                    $nombres = $resul['nombres'];
                    $aPaterno = $resul ['aPaterno'];
                    $aMaterno = $resul ['aMaterno'];
                    $correo = $resul ['correo'];
                    $contrasena = $resul ['contrasena'];
         }
        if($txtCorreo == $correo && $txtPws == $contrasena){
            echo '
            <script> 
            function validacion() {
                if (event.keyCode > 32 && event.keyCode < 48 || event.keyCode > 57 && event.keyCode < 65 || event.keyCode > 91 && event.keyCode < 64 ||
                event.keyCode > 90 && event.keyCode < 97 || event.keyCode > 122 && event.keyCode < 160 || 
                event.keyCode > 166 && event.keyCode < 190) event.returnValue = false;
            }
            alert ("BIENVENIDOS '.$nombres.'")
            window.location = "buscador.html"
        

            </script>';
        }else{
            echo '
            <script>
            function validacion() {
                if (event.keyCode > 32 && event.keyCode < 48 || event.keyCode > 57 && event.keyCode < 65 ||  event.keyCode > 64 && event.keyCode < 91 ||
                event.keyCode > 90 && event.keyCode < 97 || event.keyCode > 122 && event.keyCode < 160 || 
                event.keyCode > 166 && event.keyCode < 190) event.returnValue = false;
            }
            alert ("Datos incorrectos verifica '.$nombres.'")
            window.location = "login.html"
            </script>';

        }

        }else {
        echo ' 
        <script>
         window.location = "login.html"
         </script>
         ';
         } 
 ?>