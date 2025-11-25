<?php require_once("layout/header.php"); ?>

<h1>CLIENTES</h1>

<br>

<table class="table table-striped table-hover" id="tabla">
    <thead>
        <tr class="text-center">
            <th>Id</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Telefono</th>
            <th>Provincia</th>
            <th>RGPD</th>
            <th>Activo</th>
            <th>Forma de pago</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($clientes->filas) {
            foreach ($clientes->filas as $fila) {
        ?>
                <tr>
                    <td style="text-align: right; width: 5%">
                        <?php echo $fila->id; ?>
                    </td>
                    <td><?php echo $fila->nombre; ?></td>
                    <td><?php echo $fila->email; ?></td>
                    <td><?php echo $fila->telefono; ?></td>
                    <td><?php echo $fila->provincia; ?></td>
                    <td style="text-align: center;"><?php echo ($fila->rgpd ? 'Sí' : 'No'); ?></td>
                    <td style="text-align: center;"><?php echo ($fila->activo ? 'Sí' : 'No'); ?></td>
                    <td style="text-align: center;">
                        <?php
                        if ($fila->formadepago == "1") {
                            echo ("Contado");
                        } else if ($fila->formadepago == "2") {
                            echo ("Recibo 30 días");
                        } else if ($fila->formadepago == "3") {
                            echo ("Recibo 30 y 60 días");
                        }
                        ?>
                    </td>

                    <td style="text-align: right; width: 50%;">
                        <a href="?c=clientes&m=editar&id=<?php echo $fila->id; ?>">
                            <button type="button" class="btn btn-success">Editar</button>
                        </a>
                        <a href="?c=clientes&m=borrar&id=<?php echo $fila->id; ?>">
                            <button type="button" class="btn btn-danger borrar" onclick="return confirm('¿Estás seguro de borrar el registro <?php echo $fila->id; ?>?')">Borrar</button>
                        </a>
                    </td>
                </tr>
            <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="5">No hay clientes.</td>
            </tr>
        <?php
        }
        ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5">
                <a href="?c=clientes&m=nuevo">
                    <button type="button" class="btn btn-primary">Nuevo</button>
                </a>
                <a href="?c=clientes&m=exportar">
                    <button type="button" class="btn btn-success">Exportar</button>
                </a>
                <a href="?c=clientes&m=imprimir" target="_blank">
                    <button type="button" class="btn btn-success">Imprimir cutre</button>
                </a>
                <a href="?c=clientes&m=imprimir2" target="_blank">
                    <button type="button" class="btn btn-success">Imprimir fetén</button>
                </a>
            </td>
        </tr>
    </tfoot>
</table>

<?php require_once("layout/footer.php"); ?>