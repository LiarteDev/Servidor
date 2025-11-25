<?php require_once("layout/header.php") ?>

<h1>CLIENTES</h1>

<br>

<h2><?php echo ($opcion == "EDITAR" ? "MODIFICAR" : "NUEVO"); ?></h2>

<form action="<?php echo '?c=clientes&m=' . ($opcion == 'EDITAR' ? 'modificar&id=' . $cliente->id : 'insertar'); ?>" method="post">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo ($opcion == 'EDITAR' ? $cliente->nombre : ''); ?>" required />

    <br>
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" name="email" id="email" value="<?php echo ($opcion == 'EDITAR' ? $cliente->email : ''); ?>" required />

    <br>
    <label for="telefono" class="form-label">Telefono</label>
    <input type="tel" class="form-control" name="telefono" id="telefono" value="<?php echo ($opcion == 'EDITAR' ? $cliente->telefono : ''); ?>" required />

    <br>
    <label for="provincia_id" class="form-label">Id provincia</label>
    <select name="provincia_id" id="provincia_id" class="form-control">
        <?php foreach ($provincias->filas as $provincia) {
        ?>
            <option value="<?php echo $provincia->id; ?>">
                <?php
                if ($opcion == 'EDITAR') {
                    echo ($cliente->provincia_id == $provincia->id ? 'selected' : '');
                }
                ?>
                <?php echo $provincia->provincia; ?></option>
        <?php } ?>
    </select>

    <br>
    <label for="formadepago" class="form-label">Forma de pago</label>
    <select name="formadepago" id="formadepago" class="form-control">
        <option value="1">Contado</option>
        <option value="2">Recibo 30 días</option>
        <option value="3">Recibo 30 y 60 días</option>
    </select>

    <br>
    <label for="rgpd" class="form-label">RGPD</label>
    <input type="checkbox" name="rgpd" id="rgpd"
        <?php
        if (($opcion == 'EDITAR') && ($cliente->rgpd == 1)) {
            echo 'checked';
        } ?> class="form-checked-input" />

    <br>
    <label for="activo" class="form-label">Activo</label>
    <input type="checkbox" name="activo" id="activo"
        <?php
        if (($opcion == 'EDITAR') && ($cliente->activo == 1)) {
            echo 'checked';
        } ?> class="form-checked-input" />


    <br>
    <button type="submit" class="btn btn-primary">Aceptar</button>

    <a href="<?php echo URLSITE . '?c=clientes'; ?>">
        <button type="button" class="btn btn-outline-secondary float-end">Cancelar</button>
    </a>
</form>

<?php require_once("layout/footer.php") ?>