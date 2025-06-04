<!DOCTYPE html>

<html lang="en">

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
    $sql="select * from regiones";
    //ejecutar la consulta en la base de datos utilizando
    //la conexión realizada
    $ejecutar =mysqli_query($conexion, $sql);
    //recorrer todos los datos y mostrarlos
    ?>

   <div class="container">
   
        <!-- Botón para abrir modal -->
         <div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Regiones</h1>
    <button type="button" class="btn-agregar-departamento animate__animated animate__pulse animate__infinite" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <span style="font-size:1.3em;vertical-align:middle;display:inline-block;margin-right:0.5em;">
        <!-- Icono SVG suma -->
        <svg width="1em" height="1em" viewBox="0 0 20 20" fill="white" xmlns="http://www.w3.org/2000/svg" style="vertical-align:middle;">
            <path d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"/>
        </svg>
    </span>
    Agregar region
</button>
</div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Región</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="crud_regiones.php" method="post">
                            <label for="txt_codigo" class="form-label">Código de region</label>
                            <input type="number" name="txt_codigo" id="txt_codigo" class="form-control">
                            <label class="form-label" for="txt_nombre">Nombre</label>
                            <input type="text" name="txt_nombre" id="txt_nombre" class="form-control">
                            <label for="txt_desc" class="form-label">Descripción</label>
                            <input type="text" name="txt_desc" id="txt_desc" class="form-control">
                            <button type="submit" class="form-control btn btn-primary" name="btn_insertar">
                                Agregar Región</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                    </div>
                </div>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Región</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
    while($datos = mysqli_fetch_assoc($ejecutar)){
       ?>
                <tr>
                    <td><?php echo $datos['cod_region'];?></td>
                    <td><?php echo $datos['nombre'];?></td>
                    <td><?php echo $datos['descripcion'];?></td>
                    <td class="d-flex flex-row">
                        <form action="crud_regiones.php" method="post" class="me-1">
                            <input type="hidden" name="hidden_codigo" id="hidden_codigo"
                                value="<?php echo $datos['cod_region'];?>">
                            <button type="submit" name="btn_eliminar" id="btn_eliminar"
                                class="btn btn-outline-danger p-1">
                                <i class="bi bi-trash3"></i>
                            </button>
                            
                        </form>
                        <form action="actualizar_regiones.php" method="post">
                            <input type="hidden" name="hidden_codigoa" id="hidden_codigoa"
                                value="<?php echo $datos['cod_region'];?>">
                            <button type="submit" class="btn btn-outline-success p-1"
                                name="btn_editar" id="btn_editar">
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