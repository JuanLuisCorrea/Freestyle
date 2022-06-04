<?php
include '../Sql/db.php';
$sql = "SELECT * from cita WHERE Client='<?php $cedula ?>'";
$result = $conn->query($sql);

?>

<table borders=2>
    <tr BGCOLOR=#D3D3D3>
        <td>id</td>
        <td>Cedula</td>
        <td>Servicios</td>
        <td>Fecha</td>
        <td>Hora</td>
        <td>Hora de salida</td>
        <td>Duracion</td>
        <td colspan=2>Acción</td>

    </tr>
    <?php
    $fila = 1;
    while ($row = $result->fetch_assoc()) {
        if ($fila % 2 == 0) {
    ?>
            <tr BGCOLOR=#D3D3D3>

            <?php } else { ?>

            <tr>
            <?php } ?>
            <td><?php $row["ID"] ?></td>
            <td><?php $row["Client"] ?></td>
            <td><?php $row["Services"] ?></td>
            <td><?php $row["Date"] ?></td>
            <td><?php $row["Hour"] ?></td>
            <td><?php $row["Finish_Hour"] ?></td>
            <td><?php $row["Duration"] ?> minutos</td>
            <td><a href="\Delete.php?id=<?php $row["ID"] ?>">Borrar </td>
            <td> <a href="\Update.php?id=<?php $row[" ID"] ?>">Editar </td>
            </tr>
        <?php
        $fila = $fila + 1;
    }
        ?>
</table>