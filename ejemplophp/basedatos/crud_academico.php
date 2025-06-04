<?php 
     //vamos a utilizar la conexión existente
        require_once("conexion.php");
       
    //se verifica que los datos vengan del formulario con el 
    //boton con nombre btn_modificar
    if(isset($_POST['btn_modificar'])){
        //recibir datos del formulario
        $codigo = $_POST['txt_codigo'];
        $nombre = $_POST['txt_nombre'];
        $desc = $_POST['txt_desc'];
        $sql = 'UPDATE nivelesacademicos set nombre="'.$nombre.'", 
                    descripcion="'.$desc.'" WHERE cod_nivel_acad='.$codigo.';';
        echo $sql;
        try {
            $ejecutar = mysqli_query($conexion, $sql);
            echo "Datos modificados";
            //envia a la vista regiones
            header('Location:niveles_academicos.php');
            exit;
        } catch (Exception $th) {
            echo "<br>Datos no actualizados<br>". $th;    
        }
    }
     //proceso de eliminar
    if(isset($_POST['btn_eliminar'])){
        $codigo = $_POST['hidden_codigo'];
        $sql = "delete from nivelesacademicos where cod_nivel_acad=".$codigo;
        try {
            $ejecutar = mysqli_query($conexion, $sql);
            echo "<br>Datos eliminados";
            header('Location:niveles_academicos.php');
            exit;
        } catch (Exception $th) {
            echo "<br>Datos no eliminados guardados<br>". $th;        
        } 
    }

    //proceso de insertar
    if(isset($_POST['btn_insertar'])){
        //variable para cada dato que viene del formulario 
        $codigo = $_POST['txt_codigo'];
        $nombre = $_POST['txt_nombre'];
        $desc = $_POST['txt_desc'];
        echo "Datos de nivel academico:";
        echo "<br>Codigo: ". $codigo;
        echo "<br>Nombre: ". $nombre;
        echo "<br>Descripción: ". $desc;
       
        $sql="insert into nivelesacademicos(cod_nivel_acad,nombre,descripcion) 
            values(".$codigo.",'".$nombre."','".$desc."');";
        //ejecutar el sql en la conexión existente
        try {
            $ejecutar = mysqli_query($conexion, $sql);
            //echo "valor de Ejecutar: ". $ejecutar;
            echo "<br>Datos almacenados";
            header('Location: niveles_academicos.php');
            exit;
        } catch (Exception $th) {
            echo "<br>Datos no fueron guardados<br>". $th;        
        } 

    }
?>