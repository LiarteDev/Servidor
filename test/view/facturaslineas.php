<?php require("layout/header.php"); ?>

<h1>FACTURAS LINEAS</h1>

<table class="table">
    <tr>
        <td>CLIENTE: <?php echo $factura->cliente; ?></td>
        <td>BASE: <?php echo $factura->base; ?></td>
    </tr>
    <tr>
        <td>FACTURA: <?php echo $factura->numero; ?></td>
        <td>IMPORTE IVA: <?php echo $factura->importe_iva; ?></td>
    </tr>
    <tr>
        <td>FECHA: <?php echo $factura->fecha; ?></td>
        <td>TOTAL: <?php echo $factura->importe; ?></td>
    </tr>
</table>
<table class="table table-striped table-hover" id="tabla">
    <thead>
        <tr class="text-center">
            <td>ID</td>
            <td>Factura_id</td>
            <td>Ref.</td>
            <td>Descripción</td>
            <td>Cantidad</td>
            <td>Precio</td>
            <td>IVA</td>
            <td>Base</td>
            <td>Importe IVA</td>
            <td>Importe</td>
            <td></td>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($facturaslineas->filas) {
            foreach ($facturaslineas->filas as $fila) { ?>
                <tr>
                    <td style="text-align: right; width:5%; text-align: center;"><?php echo $fila->id; ?></td>
                    <td style="text-align: center;"><?php echo $fila->factura_id; ?></td>
                    <td style="text-align: center;"><?php echo $fila->referencia; ?></td>
                    <td style="text-align: center;"><?php echo $fila->descripcion; ?></td>
                    <td style="text-align: center;"><?php echo $fila->cantidad; ?></td>
                    <td style="text-align: center;"><?php echo $fila->precio; ?></td>
                    <td style="text-align: center;"><?php echo $fila->iva; ?></td>
                    <td style="text-align: center;"><?php echo $fila->base; ?></td>
                    <td style="text-align: center;"><?php echo $fila->importe_iva; ?></td>
                    <td style="text-align: center;"><?php echo $fila->importe; ?></td>

                    <td style="text-align: right; width:50%">
                        <a href="?c=facturaslineas&m=editar&id=<?php echo $fila->id; ?>">
                            <button type="button" class="btn btn-success">Editar</button>
                        </a>
                        <a href="?c=facturaslineas&m=borrar&id=<?php echo $fila->id; ?>&factura_id=<?php echo $fila->factura_id; ?>">
                            <button type="button" class="btn btn-danger borrar" onclick="return confirm('¿Estás seguro de borrar el registro <?php echo $fila->id; ?>?')">Borrar</button>
                        </a>
                    </td>
                </tr>

        <?php }
        }
        ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5">
                <a href="?c=facturaslineas&m=nuevo&factura_id=<?php echo $factura_id; ?>">
                    <button type="button" class="btn btn-primary">Nuevo</button>
                </a>
            </td>
        </tr>
    </tfoot>
</table>
<?php require("layout/footer.php"); ?>