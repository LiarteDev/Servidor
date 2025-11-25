<?php
require_once("layout/header.php");
?>

<h1>RECIBOS</h1>

<br>

<table class="table table-striped table-hover" id="tabla">
    <thead>
        <tr class="text-center">
            <th>ID recibo</th>
            <th>ID factura</th>
            <th>Fecha</th>
            <th>Importe</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($recibos->filas) {
            foreach ($recibos->filas as $fila) {
        ?>
                <tr>
                    <td style="text-align: right; width: 5%">
                        <?php echo $fila->recibo_id; ?>
                    </td>
                    <td><?php echo $fila->factura_id; ?></td>
                    <td><?php echo $fila->date("d/m/Y", strtotime($fila->fecha)); ?></td>
                    <td><?php echo $fila->importe; ?></td>
                </tr>
            <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="5">No hay recibos.</td>
            </tr>
        <?php
        }
        ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5">
                <a href="?c=recibos&m=imprimir">
                    <button type="button" class="btn btn-success">Imprimir</button>
                </a>
            </td>
        </tr>
    </tfoot>
</table>

<?php require_once("layout/footer.php"); ?>