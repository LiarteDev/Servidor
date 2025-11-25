<?php
if (!LoginControlador::Logueado()) {
    header("Location: view/login.php");
    die();
}

require_once("layout/header.php");

?>

<h1>USUARIOS</h1>

<br>

<table class="table table-striped table-hover" id="tabla">
    <thead>
        <tr class="text-center">
            <th>Id</th>
            <th>Usuario</th>
            <th>Contraseña</th>
            <th>Nombre</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($usuarios->filas) {
            foreach ($usuarios->filas as $fila) {
        ?>
                <tr>
                    <td style="text-align: right; width: 5%">
                        <?php echo $fila->id; ?>
                    </td>
                    <td><?php echo $fila->usuario; ?></td>
                    <td><?php echo $fila->contrasena; ?></td>
                    <td><?php echo $fila->nombre; ?></td>

                    <td style="text-align: right; width: 50%;">
                        <a href="?c=usuarios&m=editar&id=<?php echo $fila->id; ?>">
                            <button type="button" class="btn btn-success">Editar</button>
                        </a>
                        <a href="?c=usuarios&m=borrar&id=<?php echo $fila->id; ?>">
                            <button type="button" class="btn btn-danger borrar" onclick="return confirm('¿Estás seguro de borrar el registro <?php echo $fila->id; ?>?')">Borrar</button>
                        </a>
                    </td>
                </tr>
            <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="5">No hay usuarios.</td>
            </tr>
        <?php
        }
        ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5">
                <a href="?c=usuarios&m=nuevo">
                    <button type="button" class="btn btn-primary">Nuevo</button>
                </a>
                <a href="?c=usuarios&m=exportar">
                    <button type="button" class="btn btn-success">Exportar</button>
                </a>
                <a href="?c=usuarios&m=imprimir" target="_blank">
                    <button type="button" class="btn btn-success">Imprimir cutre</button>
                </a>
                <a href="?c=usuarios&m=imprimir2" target="_blank">
                    <button type="button" class="btn btn-success">Imprimir fetén</button>
                </a>
            </td>
        </tr>
    </tfoot>
</table>

<?php require_once("layout/footer.php"); ?>