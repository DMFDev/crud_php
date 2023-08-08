<?php

if ($_POST) {

    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
    $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : "";
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : "";

    $stm = $conect->prepare("INSERT INTO contactos(id,nombre,apellidos,telefono)
    VALUES(null,:nombre,:apellidos,:telefono)");

    $stm->bindParam(":nombre", $nombre);
    $stm->bindParam(":apellidos", $apellidos);
    $stm->bindParam(":telefono", $telefono);

    $stm->execute();

    header("location:index.php");
}
?>


<!-- Modal -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar contacto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="" placeholder="ingrese nombre">
                    <label for="">Apellidos</label>
                    <input type="text" class="form-control" name="apellidos" value="" placeholder="Ingrese apellidos">
                    <label for="">Teléfono</label>
                    <input type="text" class="form-control" name="telefono" value="" placeholder="Ingrese Teléfono">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>