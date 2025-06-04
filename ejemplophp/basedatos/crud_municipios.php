<?php 
     //vamos a utilizar la conexión existente
        require_once("conexion.php");
       
    //se verifica que los datos vengan del formulario con el 
    //boton con nombre btn_modificar
    if(isset($_POST['btn_modificar'])){
        //recibir datos del formulario
        $codigo = $_POST['txt_codigo'];
        $nombre = $_POST['txt_nombre'];
        $depto = $_POST['txt_desc'];
        
$sql = 'UPDATE municipios SET nombre_municipio="'.$nombre.'", cod_depto="'.$depto.'" WHERE cod_muni='.$codigo.';';
        echo $sql;
        try {
            $ejecutar = mysqli_query($conexion, $sql);
            echo "Datos modificados";
            //envia a la vista regiones
            header('Location:municipios.php');
            exit;
        } catch (Exception $th) {
            echo "<br>Datos no actualizados<br>". $th;    
        }
    }
     //proceso de eliminar
    if(isset($_POST['btn_eliminar'])){
        $codigo = $_POST['hidden_codigo'];
        $sql = "delete from municipios where cod_muni=".$codigo;
        try {
            $ejecutar = mysqli_query($conexion, $sql);
            echo "<br>Datos eliminados";
            header('Location: municipios.php');
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
        $depto = $_POST['txt_desc'];
        echo "Datos de municipio:";
        echo "<br>Codigo: ". $codigo;
        echo "<br>Nombre: ". $nombre;
        echo "<br>departamento: ". $depto;
    
        $sql="insert into municipios(cod_muni, nombre_municipio, cod_depto) 
           VALUES ($codigo, '$nombre', '$depto');";
        //ejecutar el sql en la conexión existente
        try {
            $ejecutar = mysqli_query($conexion, $sql);
            //echo "valor de Ejecutar: ". $ejecutar;
            echo "<br>Datos almacenados";
            header('Location: municipios.php');
            exit;
        } catch (Exception $th) {
            echo "<br>Datos no fueron guardados<br>". $th;        
        } 

    }
?>