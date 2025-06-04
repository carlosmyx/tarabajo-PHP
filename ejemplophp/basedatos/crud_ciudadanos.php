<?php 
    require_once("conexion.php");

    // Modificar ciudadano
    if(isset($_POST['btn_modificar'])){
        $codigo = $_POST['txt_codigo'];
        $dpi = $_POST['txt_dpi'];
        $nombre = $_POST['txt_nombre'];
        $apellido = $_POST['txt_apellido'];
        $direccion = $_POST['txt_direccion'];
        $tel_casa = $_POST['txt_tel_casa'];
        $tel_movil = $_POST['txt_tel_movil'];
        $email = $_POST['txt_email'];
        $fechanac = $_POST['txt_fechanac'];

        $sql = 'UPDATE ciudadanos SET 
            dpi="'.$dpi.'", 
            nombre="'.$nombre.'", 
            apellido="'.$apellido.'", 
            direccion="'.$direccion.'", 
            tel_casa="'.$tel_casa.'", 
            tel_movil="'.$tel_movil.'", 
            email="'.$email.'", 
            fechanac="'.$fechanac.'" 
            WHERE cod_ciudadano='.$codigo.';';
        echo $sql;
        try {
            $ejecutar = mysqli_query($conexion, $sql);
            echo "Datos modificados";
            header('Location: ciudadanos.php');
            exit;
        } catch (Exception $th) {
            echo "<br>Datos no actualizados<br>". $th;    
        }
    }

    // Eliminar ciudadano
    if(isset($_POST['btn_eliminar'])){
        $codigo = $_POST['hidden_codigo'];
        $sql = "DELETE FROM ciudadanos WHERE dpi=".$codigo;
        try {
            $ejecutar = mysqli_query($conexion, $sql);
            echo "<br>Datos eliminados";
            header('Location: ciudadanos.php');
            exit;
        } catch (Exception $th) {
            echo "<br>Datos no eliminados<br>". $th;        
        } 
    }

    // Insertar ciudadano
    if(isset($_POST['btn_insertar'])){
        $dpi = $_POST['txt_dpi'];
        $nombre = $_POST['txt_nombre'];
        $apellido = $_POST['txt_apellido'];
        $direccion = $_POST['txt_direccion'];
        $tel_casa = $_POST['txt_tel_casa'];
        $tel_movil = $_POST['txt_tel_movil'];
        $email = $_POST['txt_email'];
        $fechanac = $_POST['txt_fechanac'];

        echo "Datos de ciudadano:";
        echo "<br>DPI: ". $dpi;
        echo "<br>Nombre: ". $nombre;
        echo "<br>Apellido: ". $apellido;
        echo "<br>Dirección: ". $direccion;
        echo "<br>Teléfono Casa: ". $tel_casa;
        echo "<br>Teléfono Móvil: ". $tel_movil;
        echo "<br>Email: ". $email;
        echo "<br>Fecha Nacimiento: ". $fechanac;

        $sql="INSERT INTO ciudadanos(
            dpi, nombre, apellido, direccion, tel_casa, tel_movil, email, fechanac
        ) VALUES (
            '$dpi', '$nombre', '$apellido', '$direccion', '$tel_casa', '$tel_movil', '$email', '$fechanac'
        );";
        try {
            $ejecutar = mysqli_query($conexion, $sql);
            echo "<br>Datos almacenados";
            header('Location: ciudadanos.php');
            exit;
        } catch (Exception $th) {
            echo "<br>Datos no fueron guardados<br>". $th;        
        } 
    }


?>