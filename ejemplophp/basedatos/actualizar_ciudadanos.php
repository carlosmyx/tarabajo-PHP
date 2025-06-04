
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Ciudadano</title>
    <link rel="stylesheet" href="paginas.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
  
<?php 
    $codigo = $_POST['hidden_codigoa'];
    require_once("conexion.php");
    $sql="SELECT * FROM ciudadanos WHERE dpi=".$codigo;
    $ejecutar = mysqli_query($conexion, $sql);
    $datos = mysqli_fetch_assoc($ejecutar);

    if (!$datos) {
        echo "<div class='container mt-4'><div class='alert alert-danger'>No se encontró el ciudadano con el DPI proporcionado.</div></div>";
        exit;
    }
?>
    <div class="container">
        <h1>Modificar Ciudadano</h1>
        <form action="crud_ciudadanos.php" method="post">
            <!-- Campo oculto para el código único del ciudadano -->
            <input type="hidden" name="txt_codigo" value="<?php echo $datos['dpi']; ?>">
            
            <label for="txt_dpi" class="form-label">DPI</label>
<input type="number" name="txt_dpi" id="txt_dpi" 
    value="<?php echo $datos['dpi'];?>" class="form-control" required readonly>
            <label for="txt_nombre" class="form-label">Nombre</label>
            <input type="text" name="txt_nombre" id="txt_nombre" 
                value="<?php echo $datos['nombre'];?>" class="form-control" required>
            <label for="txt_apellido" class="form-label">Apellido</label>
            <input type="text" name="txt_apellido" id="txt_apellido" 
                value="<?php echo $datos['apellido'];?>" class="form-control" required>
            <label for="txt_direccion" class="form-label">Dirección</label>
            <input type="text" name="txt_direccion" id="txt_direccion" 
                value="<?php echo $datos['direccion'];?>" class="form-control" required>
            <label for="txt_tel_casa" class="form-label">Teléfono Casa</label>
            <input type="text" name="txt_tel_casa" id="txt_tel_casa" 
                value="<?php echo $datos['tel_casa'];?>" class="form-control">
            <label for="txt_tel_movil" class="form-label">Teléfono Móvil</label>
            <input type="text" name="txt_tel_movil" id="txt_tel_movil" 
                value="<?php echo $datos['tel_movil'];?>" class="form-control">
            <label for="txt_email" class="form-label">Email</label>
            <input type="email" name="txt_email" id="txt_email" 
                value="<?php echo $datos['email'];?>" class="form-control">
            <label for="txt_fechanac" class="form-label">Fecha de Nacimiento</label>
            <input type="date" name="txt_fechanac" id="txt_fechanac" 
                value="<?php echo $datos['fechanac'];?>" class="form-control">
            <button type="submit" class="form-control btn btn-primary mt-3"
                name="btn_modificar" id="btn_modificar">
                Modificar Ciudadano
            </button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>