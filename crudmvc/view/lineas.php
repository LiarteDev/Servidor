<?php require("layout/header.php"); ?>

<h1>LÍNEAS</h1>

<br/>

<table class="table table-striped table-hover" id="tabla">
<thead>
<tr class="text-center">
    <th>Id</th>
    <th>Factura ID</th>
    <th>Referencia</th>
    <th>Descripción</th>
    <th>Cantidad</th>
    <th>Precio</th>
    <th>IVA</th>
    <th>Importe</th>
    <th></th>
</tr>
</thead>

<tbody>
<?php
if ($lineas->filas):
    foreach ($lineas->filas as $fila):
?>
<tr>
    <td><?php echo $fila->id; ?></td>
    <td><?php echo $fila->factura_id; ?></td>
    <td><?php echo $fila->referencia; ?></td>
    <td><?php echo $fila->descripcion; ?></td>
    <td><?php echo $fila->cantidad; ?></td>
    <td><?php echo $fila->precio; ?></td>
    <td><?php echo $fila->iva; ?></td>
    <td><?php echo $fila->importe; ?></td>

    <td>
        <a href="index.php?c=lineas&m=Editar&id=<?php echo $fila->id; ?>">
            <button class="btn btn-success">Editar</button>
        </a>

        <a href="index.php?c=lineas&m=Borrar&id=<?php echo $fila->id; ?>">
            <button onclick="return confirm('¿Borrar línea <?php echo $fila->id; ?>?');"
            class="btn btn-danger">Borrar</button>
        </a>
    </td>
</tr>
<?php
    endforeach;
endif;
?>
</tbody>

<tfoot>
<tr>
    <td colspan="8">
        <a href="index.php?c=lineas&m=Nuevo">
            <button class="btn btn-primary">Nueva Línea</button>
        </a>
    </td>
</tr>
</tfoot>

</table>

<?php require("layout/footer.php"); ?>
