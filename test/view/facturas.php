<?php require_once("layout/header.php"); ?>

<h1>FACTURAS</h1>

<br>

<table class="table table-striped table-hover" id="tabla">
    <thead>
        <tr class="text-center">
            <th>Id</th>
            <th>Cliente</th>
            <th>Número</th>
            <th>Fecha</th>
            <th>Base</th>
            <th>Importe IVA</th>
            <th>Importe</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($facturas->filas) {
            foreach ($facturas->filas as $fila) {
        ?>
                <tr>
                    <td style="text-align: center; width: 5%">
                        <?php echo $fila->id; ?>
                    </td>
                    <td style="text-align: center;"><?php echo $fila->cliente; ?></td>
                    <td style="text-align: center;"><?php echo $fila->numero; ?></td>
                    <td style="text-align: center;"><?php echo date("d/m/Y", strtotime($fila->fecha)); ?></td>
                    <td style="text-align: center;"><?php echo $fila->base; ?></td>
                    <td style="text-align: center;"><?php echo $fila->importe_iva; ?></td>
                    <td style="text-align: center;"><?php echo $fila->importe; ?></td>

                    <td style="text-align: right; width: 50%;">
                        <a href="?c=facturas&m=editar&id=<?php echo $fila->id; ?>">
                            <button type="button" class="btn btn-success">Editar</button>
                        </a>
                        <a href="?c=facturas&m=borrar&id=<?php echo $fila->id; ?>">
                            <button type="button" class="btn btn-danger borrar" onclick="return confirm('¿Estás seguro de borrar el registro <?php echo $fila->id; ?>?')">Borrar</button>
                        </a>
                        <a href="?c=facturaslineas&factura_id=<?php echo $fila->id; ?>">
                            <button type="button" class="btn btn-warning">Líneas</button>
                        </a>
                        <a href="?c=facturas&m=imprimir&factura_id=<?php echo $fila->id; ?>">
                            <button type="button" class="btn btn-warning">Imprimir</button>
                        </a>
                        <a href="?c=recibos&m=recibos&factura_id=<?php echo $fila->id; ?>">
                            <button type="button" class="btn btn-success">Recibos</button>
                        </a>
                    </td>
                </tr>
        <?php
            }
        }
        ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5">
                <a href="?c=facturas&m=nuevo">
                    <button type="button" class="btn btn-primary">Nuevo</button>
                </a>
                <a href="?c=facturas&m=renumerarvista">
                    <button type="button" class="btn btn-success">Renumerar</button>
                </a>
            </td>
        </tr>
    </tfoot>
</table>

<?php require_once("layout/footer.php"); ?>