
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="paginas.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="../css/animaciones.css">
</head>


<body>
<!-- Agrega esto justo después de <body> -->
<div class="regresar-container">
  <a href="index.html" class="btn-regresar">
    <span style="font-size:1.2em;vertical-align:middle;">&#8592;</span> Regresar al inicio
  </a>
</div>
    <?php 
    
    require_once("conexion.php");
    $sql="SELECT * FROM ciudadanos;";
    $ejecutar = mysqli_query($conexion, $sql);
    ?>


    <div class="container">
   
        <!-- Botón para abrir modal -->
         <div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Ciudadanos</h1>
    <button type="button" class="btn-agregar-departamento animate__animated animate__pulse animate__infinite" data-bs-toggle="modal" data-bs-target="#modalCiudadano">
        <span style="font-size:1.3em;vertical-align:middle;display:inline-block;margin-right:0.5em;">
            <!-- Icono SVG suma -->
            <svg width="1em" height="1em" viewBox="0 0 20 20" fill="white" xmlns="http://www.w3.org/2000/svg" style="vertical-align:middle;">
                <path d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"/>
            </svg>
        </span>
        Agregar ciudadano
    </button>
</div>

        <!-- Modal -->
        <div class="modal fade" id="modalCiudadano" tabindex="-1" aria-labelledby="modalCiudadanoLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalCiudadanoLabel">Nuevo Ciudadano</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <form action="crud_ciudadanos.php" method="post">
                            <label for="txt_dpi" class="form-label">DPI</label>
                            <input type="text" name="txt_dpi" id="txt_dpi" class="form-control" required>
                            <label for="txt_nombre" class="form-label">Nombre</label>
                            <input type="text" name="txt_nombre" id="txt_nombre" class="form-control" required>
                            <label for="txt_apellido" class="form-label">Apellido</label>
                            <input type="text" name="txt_apellido" id="txt_apellido" class="form-control" required>
                            <label for="txt_direccion" class="form-label">Dirección</label>
                            <input type="text" name="txt_direccion" id="txt_direccion" class="form-control" required>
                            <label for="txt_tel_casa" class="form-label">Teléfono Casa</label>
                            <input type="text" name="txt_tel_casa" id="txt_tel_casa" class="form-control">
                            <label for="txt_tel_movil" class="form-label">Teléfono Móvil</label>
                            <input type="text" name="txt_tel_movil" id="txt_tel_movil" class="form-control">
                            <label for="txt_email" class="form-label">Email</label>
                            <input type="email" name="txt_email" id="txt_email" class="form-control">
                            <label for="txt_fechanac" class="form-label">Fecha de Nacimiento</label>
                            <input type="date" name="txt_fechanac" id="txt_fechanac" class="form-control">
                            <button type="submit" class="form-control btn btn-primary mt-3" name="btn_insertar">
                                Agregar Ciudadano
                            </button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>DPI</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Dirección</th>
                    <th>Tel. Casa</th>
                    <th>Tel. Móvil</th>
                    <th>Email</th>
                    <th>Fecha Nac.</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($datos = mysqli_fetch_assoc($ejecutar)){
                ?>
                <tr>
                    
                    <td><?php echo $datos['dpi'];?></td>
                    <td><?php echo $datos['nombre'];?></td>
                    <td><?php echo $datos['apellido'];?></td>
                    <td><?php echo $datos['direccion'];?></td>
                    <td><?php echo $datos['tel_casa'];?></td>
                    <td><?php echo $datos['tel_movil'];?></td>
                    <td><?php echo $datos['email'];?></td>
                    <td><?php echo $datos['fechanac'];?></td>
                    <td class="d-flex flex-row">
                        <form action="crud_ciudadanos.php" method="post" class="me-1">
                            <input type="hidden" name="hidden_codigo" value="<?php echo $datos['dpi'];?>">
                            <button type="submit" name="btn_eliminar" class="btn btn-outline-danger p-1">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </form>
                        <form action="actualizar_ciudadanos.php" method="post">
    <input type="hidden" name="hidden_codigoa" value="<?php echo $datos['dpi'];?>">
    <button type="submit" class="btn btn-outline-success p-1" name="btn_editar">
        <i class="bi bi-pencil-square"></i>
    </button>
</form>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
    </script>
</body>

</html>