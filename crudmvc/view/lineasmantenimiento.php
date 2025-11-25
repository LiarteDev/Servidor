<?php require("layout/header.php"); ?>

<h1>LÍNEAS</h1>

<br/>

<h2><?php echo ($opcion == 'EDITAR' ? 'MODIFICAR' : 'NUEVA'); ?></h2>

<form action="<?php echo 'index.php?c=lineas&m=' .
        ($opcion == 'EDITAR' ? 'Modificar&id=' . $linea->id : 'Insertar'); ?>"
        method="POST">

    <label class="form-label">Factura ID</label>
    <input type="text" class="form-control" name="factura_id"
        value="<?php echo ($opcion == 'EDITAR' ? $linea->factura_id : ''); ?>" required/>
    <br/>

    <label class="form-label">Referencia</label>
    <input type="text" class="form-control" name="referencia"
        value="<?php echo ($opcion == 'EDITAR' ? $linea->referencia : ''); ?>" required/>
    <br/>

    <label class="form-label">Descripción</label>
    <input type="text" class="form-control" name="descripcion"
        value="<?php echo ($opcion == 'EDITAR' ? $linea->descripcion : ''); ?>"/>
    <br/>

    <label class="form-label">Cantidad</label>
    <input type="text" class="form-control" name="cantidad"
        value="<?php echo ($opcion == 'EDITAR' ? $linea->cantidad : ''); ?>" required/>
    <br/>

    <label class="form-label">Precio</label>
    <input type="text" class="form-control" name="precio"
        value="<?php echo ($opcion == 'EDITAR' ? $linea->precio : ''); ?>" required/>
    <br/>

    <label class="form-label">IVA (%)</label>
    <input type="text" class="form-control" name="iva"
        value="<?php echo ($opcion == 'EDITAR' ? $linea->iva : ''); ?>" required/>
    <br/>

    <button type="submit" class="btn btn-primary">Aceptar</button>

    <a href="<?php echo URLSITE . '?c=lineas'; ?>">
        <button type="button" class="btn btn-outline-secondary float-end">Cancelar</button>
    </a>

</form>

<?php require("layout/footer.php"); ?>
