<?php require("layout/header.php"); ?>

<h1>FACTURAS</h1>

<br />

<h2><?php echo ($opcion == 'EDITAR' ? 'MODIFICAR' : 'NUEVA'); ?></h2>

<form action="<?php echo 'index.php?c=facturas&m=' .
    ($opcion == 'EDITAR' ? 'modificar&id=' . $factura->id : 'insertar'); ?>" 
    method="POST">

    <label for="cliente_id" class="form-label">Cliente ID</label>
    <input type="text" class="form-control" name="cliente_id" id="cliente_id"
        value="<?php echo ($opcion == 'EDITAR' ? $factura->cliente_id : ''); ?>" required />
    <br />

    <label for="numero" class="form-label">Número de factura</label>
    <input type="text" class="form-control" name="numero" id="numero"
        value="<?php echo ($opcion == 'EDITAR' ? $factura->numero : ''); ?>" required />
    <br />

    <label for="fecha" class="form-label">Fecha</label>
    <input type="text" class="form-control" name="fecha" id="fecha"
        value="<?php echo ($opcion == 'EDITAR' ? $factura->fecha : ''); ?>" required />
    <br />

    <button type="submit" class="btn btn-primary">Aceptar</button>

    <a href="<?php echo URLSITE . '?c=facturas'; ?>">
        <button type="button" class="btn btn-outline-secondary float-end">Cancelar</button>
    </a>
</form>

<?php require("layout/footer.php"); ?>
