<?php 
    include ("../../db/connect.php");

    $stm = $conect->prepare("SELECT * FROM contactos");
    $stm->execute();
    $contactos = $stm->fetchAll(PDO::FETCH_ASSOC);


    if (isset($_GET['id'])){
        $txtId = isset($_GET['id']) ? $_GET['id'] : "";
        $stm = $conect->prepare("DELETE FROM contactos WHERE id=:txtId");
        $stm->bindParam(":txtId",$txtId);
        $stm->execute();

        header("location:index.php");
    }

?>

<?php include("../../templates/header.php");?>

<button type="button" class="btn btn-primary align-item-right" data-toggle="modal" data-target="#create">
  Nuevo
</button>

<div class="table-responsive">
    <table class="table">
        <thead class="table table-dark">
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Acciones</th>
        </thead>
        <tbody>
            <?php foreach ($contactos as $contacto){ ?>
                <tr class="">
                    <td scope="row"><?php echo $contacto['id']; ?></td>
                    <td><?php echo $contacto['nombre']; ?></td>
                    <td><?php echo $contacto['apellidos']; ?></td>
                    <td><?php echo $contacto['telefono']; ?></td>
                    <td>
                        <a class="btn btn-warning" href="edit.php?id=<?php echo $contacto['id']; ?>">Editar</a>
                        <a class="btn btn-danger" href="index.php?id=<?php echo $contacto['id']; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include("./create.php"); ?>

<?php include("../../templates/footer.php"); ?>