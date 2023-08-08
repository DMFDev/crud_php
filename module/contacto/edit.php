<?php 

include("../../db/connect.php");

if (isset($_GET['id'])){
    $txtId = isset($_GET['id']) ? $_GET['id'] : "";
    $stm = $conect->prepare("SELECT * FROM contactos WHERE id=:txtId");
    $stm->bindParam(":txtId", $txtId);
    $stm->execute();
    $contacto = $stm->fetch(PDO::FETCH_LAZY);

    $nombre = $contacto['nombre'];
    $apellidos = $contacto['apellidos'];
    $telefono = $contacto['telefono'];

}

if ($_POST) {

    $txtId = isset($_POST['txtId']) ? $_POST['txtId'] : "";
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
    $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : "";
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : "";

    $stm = $conect->prepare("UPDATE contactos contactos SET nombre=:nombre,apellidos=:apellidos,telefono=:telefono WHERE id=:txtId");

    $stm->bindParam(":txtId", $txtId);
    $stm->bindParam(":nombre", $nombre);
    $stm->bindParam(":apellidos", $apellidos);
    $stm->bindParam(":telefono", $telefono);
    $stm->execute();

    header("location:index.php");
}


?>


<?php include('../../templates/header.php') ?>

<div style="width: 50%; margin: auto;" class="container-fluid">
    <form action="" method="POST">
        <div class="modal-body">
            <input type="hidden" class="form-control" name="txtId" value="<?php echo $txtId; ?>" placeholder="Ingrese nombre">
            <label for="">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="<?php echo $nombre; ?>" placeholder="Ingrese nombre">
            <label for="">Apellidos</label>
            <input type="text" class="form-control" name="apellidos" value="<?php echo $apellidos; ?>" placeholder="Ingrese apellidos">
            <label for="">Teléfono</label>
            <input type="text" class="form-control" name="telefono" value="<?php echo $telefono; ?>" placeholder="Ingrese Teléfono">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">cancelar</button>
            <button type="submit" class="btn btn-success">Actualizar</button>
        </div>
    </form>
</div>

<?php include('../../templates/footer.php') ?>