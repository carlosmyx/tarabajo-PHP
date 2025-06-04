
<?php 
require_once("conexion.php");

// Modificar
if(isset($_POST['btn_modificar'])){
    $codigo = $_POST['cod_depto'];
    $nombre = $_POST['nombre_depto'];
    $region = $_POST['cod_region'];

    $sql = "UPDATE departamentos SET nombre_depto='$nombre', cod_region='$region' WHERE cod_depto='$codigo'";
    try {
        $ejecutar = mysqli_query($conexion, $sql);
        header('Location:departamentos.php');
        exit;
    } catch (Exception $th) {
        echo "<br>Datos no actualizados<br>". $th;    
    }
}

// Eliminar
if(isset($_POST['btn_eliminar'])){
    $codigo = $_POST['hidden_codigo'];
    $sql = "DELETE FROM departamentos WHERE cod_depto='$codigo'";
    try {
        $ejecutar = mysqli_query($conexion, $sql);
        header('Location: departamentos.php');
        exit;
    } catch (Exception $th) {
        echo "<br>Datos no eliminados<br>". $th;        
    } 
}

// Insertar
if(isset($_POST['btn_insertar'])){
    $codigo = $_POST['cod_depto'];
    $nombre = $_POST['nombre_depto'];
    $region = $_POST['cod_region'];

    $sql = "INSERT INTO departamentos (cod_depto, nombre_depto, cod_region) VALUES ('$codigo', '$nombre', '$region')";
    try {
        $ejecutar = mysqli_query($conexion, $sql);
        header('Location: departamentos.php');
        exit;
    } catch (Exception $th) {
        echo "<br>Datos no fueron guardados<br>". $th;        
    } 
}
// Insertar
if(isset($_POST['btn_insertar'])){
    $codigo = $_POST['cod_depto'];
    $nombre = $_POST['nombre_depto'];
    $region = $_POST['cod_region'];

    $sql = "INSERT INTO departamentos (cod_depto, nombre_depto, cod_region) VALUES ('$codigo', '$nombre', '$region')";
    try {
        $ejecutar = mysqli_query($conexion, $sql);
        header('Location: departamentos.php');
        exit;
    } catch (Exception $th) {
        echo "<br>Datos no fueron guardados<br>". $th;        
    } 
}
?>